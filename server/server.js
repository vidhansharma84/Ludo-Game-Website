const http = require('http');
const socketIo = require('socket.io');
const dotenv = require('dotenv');
const app = require('./app'); // Import Express App

dotenv.config();

const server = http.createServer(app);
const io = socketIo(server, {
    cors: {
        origin: '*',
        methods: ['GET', 'POST']
    }
});
let rooms = {};
let availableRooms = { 
    4: []
};
const COLORS = ["rPlayer", "gPlayer", "yPlayer", "bPlayer"];
const ANIMATION_COLORS_CODE = {
    rPlayer: "#redDice",
    gPlayer: "#greenDice",
    yPlayer: "#yellowDice",
    bPlayer: "#blueDice"
  };

io.on("connection", (socket) => {
    console.log(`User connected: ${socket.id}`);

    // 🎯 FIND OR CREATE A GAME ROOM
    socket.on("findGame", ({ noOfPlayer}) => {
        let roomId;

        // Check if there's an available room
        if (availableRooms[noOfPlayer].length > 0) {
            roomId = availableRooms[noOfPlayer].shift(); // Get first available room
        } else {
            // No available room, create a new one
            roomId = `room-${Date.now()}-${noOfPlayer}`;
            rooms[roomId] = { 
                players: [], 
                maxPlayers: noOfPlayer, 
                currentTurn: null, 
                diceValue: 0, 
                tokenPositions: {}, 
                started: false
            };
        }

        // Notify player to join the room
        socket.emit("getRoomId", roomId);
    });

    // 🎯 JOIN A GAME ROOM
    socket.on("joinGame", ({ roomId, p_name , p_id }) => {
        console.log(`${p_name} joined room ${roomId} (${4}P type)`);
        
        if (!rooms[roomId]) {
            rooms[roomId] = { 
                players: [], 
                maxPlayers: 4, 
                currentTurn: null, 
                diceValue: 0, 
                tokenPositions: {}, 
                started: false 
            };
        }
        let room = rooms[roomId];
        
        if (room.players.length < 4) {
            let assignedColor = COLORS[room.players.length];
            room.players.push({ id: p_id, name: p_name, color:assignedColor });
            socket.join(roomId);
            io.to(roomId).emit("updatePlayers", room.players);
        }
        console.log(`Room ${roomId} now has ${room.players.length} players.`);
        
        // Start game when full
        console.log(room.players.length)
        console.log(4)
        if (room.players.length === 4) {
            room.started = true;
            room.currentTurn = room.players[0].id; // Set first player’s turn
            io.to(roomId).emit("gameStarted", { message: "Game started!", players: room.players });
            
            // Remove full room from available list
            availableRooms[4] = availableRooms[4].filter(id => id !== roomId);
        } else {
            if (!availableRooms[4].includes(roomId)) {
                availableRooms[4].push(roomId);
            }
            io.to(roomId).emit("waitingForOthers", { message: "waitingForOthers", players: room.players });
        }
    });

    //  ROLL DICE
    socket.on("rollDice", ({ roomId, p_id }) => {
        let room = rooms[roomId];
        if (!room || room.currentTurn !== p_id) {
            console.log("invalid move")
            socket.emit("invalidMove", { message: "Not your turn!" });
            return;
        }
        // Tell all clients that the dice is rolling (this triggers the animation)
        const player = room.players.find(player => player.id === p_id);
        io.to(roomId).emit("rollingDice", { playerId:p_id, color_animation_code:ANIMATION_COLORS_CODE[player.color] });
        // Wait for animation to play, then send the final dice result
        setTimeout(() => {
            let diceValue = Math.floor(Math.random() * 6);
            room.diceValue = diceValue; // Save dice roll

            io.to(roomId).emit("diceResult", { p_id, diceValue });

            // Move to next turn
            if(diceValue !=5){
                let currentIndex = room.players.findIndex(p => p.id === p_id);
                let nextIndex = (currentIndex + 1) % room.players.length;
                room.currentTurn = room.players[nextIndex].id;
    
                io.to(roomId).emit("nextTurn", { nextPlayerId: room.currentTurn });
            }
        }, 500); // Delay of 2 seconds for animation
    });

    // 🎯 MOVE TOKEN
    socket.on("moveToken", ({ roomId, playerId, newPosition }) => {
        let room = rooms[roomId];

        if (!room || room.currentTurn !== playerId) {
            socket.emit("invalidMove", { message: "Not your turn!" });
            return;
        }

        room.tokenPositions[playerId] = newPosition;

        io.to(roomId).emit("updateToken", { playerId, newPosition });
    });

    // 🔄 REQUEST GAME STATE (for reconnects)
    socket.on("requestGameState", ({ roomId }) => {
        if (rooms[roomId]) {
            socket.emit("gameState", rooms[roomId]); // Send full state
        }
    });

    // ❌ HANDLE DISCONNECTION
    socket.on("disconnect", () => {
        console.log("Player disconnected:", socket.id);

        for (let roomId in rooms) {
            let room = rooms[roomId];

            let playerIndex = room.players.findIndex(p => p.id === socket.id);
            if (playerIndex !== -1) {
                room.players.splice(playerIndex, 1);

                if (room.players.length === 0) {
                    delete rooms[roomId];
                } else {
                    if (room.currentTurn === socket.id) {
                        room.currentTurn = room.players[0].id;
                        io.to(roomId).emit("nextTurn", { nextPlayerId: room.currentTurn });
                    }
                    io.to(roomId).emit("updatePlayers", room.players);
                }
                break;
            }
        }
    });
});

const PORT = process.env.PORT || 5000;
server.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});
