<?php 

include('../backend/config.php');

$uid = $_SESSION['uid'];

// Get user details
$sql = "SELECT * FROM user WHERE id='$uid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$name = $row['name'];

?>

<!-- v1.0 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Play Ludo Online</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Play Ludo Online" />
    <meta property="og:description"
        content="Ludo is a strategy board game for two to four players, in which the players race their four tokens from start to finish according to the rolls of a single die." />
    <meta property="og:type" content="Website" />
    <meta property="og:url" content="https://playludoonline.netlify.app/" />
    <meta property="og:image" content="https://playludoonline.netlify.app/images/ludositepreview.jpg" />
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json">
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>
    <!-- <header>
        <h1>Play Ludo Online</h1>
    </header> -->
    <?php include ("navbar.php");?>
    <div id="home-container">
        <div id="home">
            <div id="game-logo">
                <div>
                    <img src="images/gameLogo.svg" alt="Play Ludo Online">
                </div>
                <div>
                    Play Ludo Online
                </div>
            </div>
            <div id="noOfplayerBox">
                <!-- <div id="twoPlayer" class="noOfPlayer selected">2P</div>
                <div id="threePlayer" class="noOfPlayer">3P</div> -->
                <!-- <div id="fourPlayer" class="noOfPlayer">Start</div> -->
            </div>
            Player name
             <input type="text" id="pName" placeholder="Enter your name" value="<?php echo $name;?>" hidden/> </br></br></br>
            <button id="startGame">Start</button>
        </div>
        <!-- <div id="owner">Made By <a href="https://github.com/vishalmishra090">Vishal Mishra</a></div> -->
    </div>

    <main>

        <div class="game-container">

            <!-- Create a wraper class to maintain aspect ratio -->
            <!-- https://playcode.io/659836/ -->
            <!-- https://codepen.io/vishalmishra090/pen/ExKmbRG -->
            <!-- https://stackoverflow.com/questions/1495407/maintain-the-aspect-ratio-of-a-div-with-css -->
            <div class="wrap-box">



                <div class="game-box">
                    <div class="pb15">
                        <span class="playerName red" id="redPlayerName">red</span>
                        <span class="playerName green flr" id="greenPlayerName">green</span>
                    </div>
                    <div class="dice-container dice-container-top row">
                        <div class="col1 col">
                            <div class="diceBox redDiceBox" id="redDice"></div>
                        </div>
                        <div class="col2 col">
                            <div class="settingsContiner">
                                <button id="sound" class="setting"></button>
                                <!-- <button id="restart" class="setting"></button> -->
                            </div>
                        </div>
                        <div class="col3 col">
                            <div class="diceBox greenDiceBox" id="greenDice"></div>
                        </div>
                    </div>
                    <div class="ludo-board row">


                        <div class="row row1">
                            <div id="wrap-in-area">
                                <div class="red-zone in-area col" id="rPlayer">
                                    <div class="row row1">
                                        <div class="col col1">
                                            <div class="r-circle pawn-box" id="in-r-1"></div>
                                        </div>
                                        <div class="col col2">
                                            <div class="r-circle pawn-box" id="in-r-2"></div>
                                        </div>
                                    </div>
                                    <div class="row row2">
                                        <div class="col col1">
                                            <div class="r-circle pawn-box" id="in-r-3"></div>
                                        </div>
                                        <div class="col col2">
                                            <div class="r-circle pawn-box" id="in-r-4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btw-g-r out-area col">
                                <div class="row">
                                    <div class="col">
                                        <div id="out11"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out12"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out13"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out10"></div>
                                    </div>
                                    <div class="col">
                                        <div id="g-out-1"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out14"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out9"></div>
                                    </div>
                                    <div class="col">
                                        <div id="g-out-2"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out15"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out8"></div>
                                    </div>
                                    <div class="col">
                                        <div id="g-out-3"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out16"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out7"></div>
                                    </div>
                                    <div class="col">
                                        <div id="g-out-4"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out17"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out6"></div>
                                    </div>
                                    <div class="col">
                                        <div id="g-out-5"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out18"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="wrap-in-area">
                                <div class="green-zone in-area col" id="gPlayer">
                                    <div class="row row1">
                                        <div class="col col1">
                                            <div class="g-circle pawn-box" id="in-g-1"></div>
                                        </div>
                                        <div class="col col2">
                                            <div class="g-circle pawn-box" id="in-g-2"></div>
                                        </div>
                                    </div>
                                    <div class="row row2">
                                        <div class="col col1">
                                            <div class="g-circle pawn-box" id="in-g-3"></div>
                                        </div>
                                        <div class="col col2">
                                            <div class="g-circle pawn-box" id="in-g-4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row row2">

                            <div class="btw-r-b out-area col col1">
                                <div class="row">
                                    <div class="col">
                                        <div id="out52"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out1"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out2"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out3"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out4"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out5"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out51"></div>
                                    </div>
                                    <div class="col">
                                        <div id="r-out-1"></div>
                                    </div>
                                    <div class="col">
                                        <div id="r-out-2"></div>
                                    </div>
                                    <div class="col">
                                        <div id="r-out-3"></div>
                                    </div>
                                    <div class="col">
                                        <div id="r-out-4"></div>
                                    </div>
                                    <div class="col">
                                        <div id="r-out-5"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out50"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out49"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out48"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out47"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out46"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out45"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="win-area col col2">
                                <div class="win-box" id="win-box1">
                                    <div class="win-pawn-box" id="g-win-pawn-box"></div>
                                </div>
                                <div class="win-box" id="win-box2">
                                    <div class="win-pawn-box" id="y-win-pawn-box"></div>
                                </div>
                                <div class="win-box" id="win-box3">
                                    <div class="win-pawn-box" id="b-win-pawn-box"></div>
                                </div>
                                <div class="win-box" id="win-box4">
                                    <div class="win-pawn-box" id="r-win-pawn-box"></div>
                                </div>
                            </div>

                            <div class="btw-y-g out-area col col3">
                                <div class="row">
                                    <div class="col">
                                        <div id="out19"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out20"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out21"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out22"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out23"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out24"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="y-out-5"></div>
                                    </div>
                                    <div class="col">
                                        <div id="y-out-4"></div>
                                    </div>
                                    <div class="col">
                                        <div id="y-out-3"></div>
                                    </div>
                                    <div class="col">
                                        <div id="y-out-2"></div>
                                    </div>
                                    <div class="col">
                                        <div id="y-out-1"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out25"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out31"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out30"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out29"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out28"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out27"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out26"></div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row row3">
                            <div id="wrap-in-area">
                                <div class="blue-zone in-area col" id="bPlayer">
                                    <div class="row row1">
                                        <div class="col col1">
                                            <div class="b-circle pawn-box" id="in-b-1"></div>
                                        </div>
                                        <div class="col col2">
                                            <div class="b-circle pawn-box" id="in-b-2"></div>
                                        </div>
                                    </div>
                                    <div class="row row2">
                                        <div class="col col1">
                                            <div class="b-circle pawn-box" id="in-b-3"></div>
                                        </div>
                                        <div class="col col2">
                                            <div class="b-circle pawn-box" id="in-b-4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btw-b-y out-area col">

                                <div class="row">
                                    <div class="col">
                                        <div id="out44"></div>
                                    </div>
                                    <div class="col">
                                        <div id="b-out-5"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out32"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out43"></div>
                                    </div>
                                    <div class="col">
                                        <div id="b-out-4"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out33"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out42"></div>
                                    </div>
                                    <div class="col">
                                        <div id="b-out-3"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out34"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out41"></div>
                                    </div>
                                    <div class="col">
                                        <div id="b-out-2"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out35"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out40"></div>
                                    </div>
                                    <div class="col">
                                        <div id="b-out-1"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out36"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div id="out39"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out38"></div>
                                    </div>
                                    <div class="col">
                                        <div id="out37"></div>
                                    </div>
                                </div>


                            </div>
                            <div id="wrap-in-area">
                                <div class="yellow-zone in-area col" id="yPlayer">
                                    <div class="row row1">
                                        <div class="col col1">
                                            <div class="y-circle pawn-box" id="in-y-1"></div>
                                        </div>
                                        <div class="col col2">
                                            <div class="y-circle pawn-box" id="in-y-2"></div>
                                        </div>
                                    </div>
                                    <div class="row row2">
                                        <div class="col col1">
                                            <div class="y-circle pawn-box" id="in-y-3"></div>
                                        </div>
                                        <div class="col col2">
                                            <div class="y-circle pawn-box" id="in-y-4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="dice-container dice-container-bottom row">
                        <div class="col1 col">
                            <div class="diceBox blueDiceBox" id="blueDice"></div>
                        </div>
                        <div class="col2 col">
                            <div class="settingsContiner">
                                <button id="fullscreen" class="setting"></button>
                                <button id="exitfullscreen" class="setting"></button>
                            </div>
                        </div>
                        <div class="col3 col">
                            <div class="diceBox yellowDiceBox" id="yellowDice"></div>
                        </div>
                    </div>
                    <div class="pt15">
                        <span class="playerName blue" id="bluePlayerName">blue</span>
                        <span class="playerName yellow flr" id="yellowPlayerName">yellow</span>
                    </div>
                </div>

            </div>

        </div>
    </main>
    <style>
        .pt15{
            padding-top: 15px;
        }
        .flr{
            float: right;
        }
        .playerName{
            color: white;
        }
        .pb15{
            padding-bottom: 15px;
        }
        .yellow{
            text-align: right;
        }
        .green{
            text-align: right;
        }
    </style>
    <div id="alertBox">
        <p id="alertHeading">Restart The Game</p>
        <button id="cancel" class="alertBtn">Cancel</button>
        <button id="ok" class="alertBtn">Ok</button>
    </div>
    <div id="preload">
        <img src="images/dice_roll.png" />
        <img src="images/dice.png" />
        <img src="images/pawns.png" />
        <img src="images/star2.png" />
        <img src="images/start_dice_roll2.png" />
        <img src="images/sound-on.svg" />
        <img src="images/sound-off.svg" />
        <img src="images/restart.svg" />
        <img src="images/fullscreen.svg" />
        <img src="images/win1.png" />
        <img src="images/win2.png" />
        <img src="images/win3.png" />
        <img src="images/wood-Board.jpg" />
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script/ludo-game.js"></script>
    <script>
        // Get current route
        const path = window.location.pathname;
          
          // Function to load scripts dynamically
          function loadScript(scriptPath) {
              const script = document.createElement("script");
              script.src = scriptPath;
              script.defer = true;
              document.body.appendChild(script);
          }
  
          // Route Handling
          if (path === "/") {
              loadScript("home.js"); // Load home page script
          } else if (path.includes("/ludo")) {
              loadScript("ludo.js"); // Load ludo game script
          } else {
              document.getElementById("content").innerHTML = "<h2>404 - Page Not Found</h2>";
          }
  </script>
</body>

</html>