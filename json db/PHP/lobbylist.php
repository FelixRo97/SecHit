<?php

// server should keep session data for AT LEAST 2 days
ini_set('session.gc_maxlifetime', 172800);

// each client should remember their session id for EXACTLY 2 days
session_set_cookie_params(172800);

session_start();

$name = "";
if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
}


// read json file
$strJsonFileContents = file_get_contents("DB/lobbylist.json");
// Convert to array 
$playerlist = json_decode($strJsonFileContents, true);

 // read json file
       $strJson2 = file_get_contents("DB/checklobby.json");
        // Convert to array 
        $lobbyinfo = json_decode($strJson2, true);   



// prepare lobby output
$player1 = "Player 1 ". ' : ' . $playerlist['Player_1'];
$player2 = "Player 2 ". ' : '.  $playerlist['Player_2'];
$player3 = "Player 3 ". ' : '.  $playerlist['Player_3'];
$player4 = "Player 4 ". ' : '.  $playerlist['Player_4'];
$player5 = "Player 5 ". ' : '.  $playerlist['Player_5'];
$player6 = "Player 6 ". ' : '.  $playerlist['Player_6'];
$player7 = "Player 7 ". ' : '.  $playerlist['Player_7'];
$player8 = "Player 8 ". ' : '.  $playerlist['Player_8'];
$player9 = "Player 9 ". ' : '.  $playerlist['Player_9'];
$player10 = "Player 10 ". ' : '.  $playerlist['Player_10']; ?>



 <h2> 
<!--

 <p id="demo"></p>

<script>


                var xhr = new XMLHttpRequest();
                xhr.open("GET", "lobbylist.json", true);
                xhr.onreadystatechange = function () {
                    if(xhr.readyState == 4) {
                        var data  = JSON.parse(xhr.responseText);
                        
                        document.getElementById("demo").innerHTML = "Player 1 :" + data[0].name;
                    }
                    
                
                }
                xhr.send(null);
                


</script> -->

<?php echo" $player1 <br>"?>
<?php echo" $player2 <br>"?>
<?php echo" $player3 <br>"?> 
<?php echo" $player4 <br>"?>
<?php echo" $player5 <br>"?> 
<?php echo" $player6 <br>"?>
<?php echo" $player7 <br>"?> 
<?php echo" $player8 <br>"?>
<?php echo" $player9 <br>"?> 
<?php echo" $player10 "?> 
<br></h2>


 <div id=menu>
    <?php if(!($name==="")): ?>

    
        <?php if(isset($_SESSION['position']) and $_SESSION['position']==1):?>
           
            <right>
            <div id="figure">
                <div id="pos">
          
                <a href="countplayers.php"><img src="./Img/play.webp" style="width:130; height:130px" title="start" alt="start"></a>
       
                    <!-- <a href="logout.php"><object data="./Img/power.svg"  type="image/svg+xml" width="600" height="193">
            
                </object></a> -->
                </div>
            </div>
            </right>
            
            <?php elseif (($lobbyinfo[1]["amount"]>4) and ($lobbyinfo[1]["amount"]<11)):?>
            
            <right>
            <div id="figure">
                <div id="pos">
            
            <a href="distribution.php"><img src="./Img/play.webp" style="width:130px; height:130px" title="start" alt="start"></a>
       
                    <!-- <a href="logout.php"><object data="./Img/power.svg"  type="image/svg+xml" width="600" height="193">
            
                </object></a> -->
                </div>
            </div>
            </right>
    
             <?php else:?>
            <h2>
            <?php echo"Waiting for host to start game <br>";?>
            </h2>
            
         <?php endif; ?>   
    <?php endif; ?>
    
    
    <left>
    <div id="figure">
         <div id="pos">
        <a href="logout.php"><img src="./Img/exit.webp" style="width:130; height:130px" title="logout" alt="lo"></a><br>
       
        </div>
        
    </div>
    </left>
    
    </div>
