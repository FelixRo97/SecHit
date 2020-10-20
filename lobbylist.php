<?php
session_start();

$name = "";
if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
}

$player1 = "Player 1 ". ' : ' . file_get_contents("./Session/Player 1.txt", true);
$player2 = "Player 2 ".' : '. file_get_contents("./Session/Player 2.txt", true);
$player3 = "Player 3 ".' : '. file_get_contents("./Session/Player 3.txt", true);
$player4 = "Player 4 ".' : '. file_get_contents("./Session/Player 4.txt", true);
$player5 = "Player 5 ".' : '. file_get_contents("./Session/Player 5.txt", true);
$player6 = "Player 6 ".' : '. file_get_contents("./Session/Player 6.txt", true);
$player7 = "Player 7 ".' : '. file_get_contents("./Session/Player 7.txt", true);
$player8 = "Player 8 ".' : '. file_get_contents("./Session/Player 8.txt", true);
$player9 = "Player 9 ".' : '. file_get_contents("./Session/Player 9.txt", true);
$player10 = "Player 10 ".' : '. file_get_contents("./Session/Player 10.txt", true); ?>



    
<div id="player1"><?php echo" $player1 <br>"?>
<!--
<svg><img src="./Img/stickman.svg" alt="Stickman"> </svg> </div>-->

<div id="player2"><?php echo" $player2 <br>"?> </div>
<div id="player3"><?php echo" $player3 <br>"?> </div>
<div id="player4"><?php echo" $player4 <br>"?> </div>
<div id="player5"><?php echo" $player5 <br>"?> </div>
<div id="player6"><?php echo" $player6 <br>"?> </div>
<div id="player7"><?php echo" $player7 <br>"?> </div>
<div id="player8"><?php echo" $player8 <br>"?> </div>
<div id="player9"><?php echo" $player9 <br>"?> </div>
<div id="player10"><?php echo" $player10 <br>"?> </div>
<br>


    <?php if(!($name==="")): ?>

    
        <?php if(isset($_SESSION['position']) AND $_SESSION['position']==1):?>
        
            <figure>
          
                <a href="countplayers.php"><img src="./Img/play.png" style="width:110; height:110px" title="start" alt="start"></a><br>
       
                    <!-- <a href="logout.php"><object data="./Img/power.svg"  type="image/svg+xml" width="600" height="193">
            
                </object></a> -->
        
            </figure>
            
            <?php elseif ((file_get_contents("amount.txt", true)>4) AND (file_get_contents("amount.txt", true)<11)):?>
            
            <figure>
            
            <a href="distribution.php"><img src="./Img/play.png" style="width:110; height:110px" title="start" alt="start"></a><br>
       
                    <!-- <a href="logout.php"><object data="./Img/power.svg"  type="image/svg+xml" width="600" height="193">
            
                </object></a> -->
        
            </figure>
    
             <?php else:?>
        
            <?php echo"Waiting for host to start game <br><br>";?>
    
         <?php endif; ?>   
    <?php endif; ?>