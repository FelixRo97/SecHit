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



 <h2> 
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

    
        <?php if(isset($_SESSION['position']) AND $_SESSION['position']==1):?>
           
            <right>
            <div id="figure">
                <div id="pos">
          
                <a href="countplayers.php"><img src="./Img/play.webp" style="width:130; height:130px" title="start" alt="start"></a>
       
                    <!-- <a href="logout.php"><object data="./Img/power.svg"  type="image/svg+xml" width="600" height="193">
            
                </object></a> -->
                </div>
            </div>
            </right>
            
            <?php elseif ((file_get_contents("amount.txt", true)>4) AND (file_get_contents("amount.txt", true)<11)):?>
            
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