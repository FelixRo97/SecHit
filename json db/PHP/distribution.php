<?php
//header("refresh:6;url=distribution.php");

// server should keep session data for AT LEAST 2 days
ini_set('session.gc_maxlifetime', 172800);

// each client should remember their session id for EXACTLY 2 days
session_set_cookie_params(172800);

session_start(); ?>

 <html>
    <head>
        <title>Verteilung</title>
        <link rel="stylesheet" href="Styles/style2.css">

     </head>
    
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
          $("#refresh").load("dlist.php");
             var refreshId = setInterval(function() {
         $("#refresh").load('dlist.php?' + 1*new Date());
             }, 1500);
        });
        </script>
     
     <h1>

<?php
$name="";

//In $name den Wert der Session speichern
if(isset($_SESSION['username'])){
$name = $_SESSION['username'];
}

// read json file
     $strJsonFileContents = file_get_contents("DB/lobbylist.json");
     // Convert to array 
     $playernum = json_decode($strJsonFileContents, true);  
     
     // read json file
       $strJson2 = file_get_contents("DB/checklobby.json");
        // Convert to array 
        $lobbyinfo = json_decode($strJson2, true);   


//Spieleranzahl
$playercount = $lobbyinfo[1]["amount"];

if($playercount>4 and $playercount<11 and !isset($_SESSION['role']) and !($name==="")){
    //testvariable ob Rolle belegt ist 
    $isSet= false;
    
    //Spielernummer
    $player=0;
    
     // read json file
     $strJsonFileContents = file_get_contents("DB/".$playercount."_Players.json");
     // Convert to array 
     $playerlist = json_decode($strJsonFileContents, true); 
     
     
 
    //Vergabe der Spielernummer und Eintragen in den jeweiligen Namen 
     while($isSet != true){
         
        //Ziehe zufällig
        $player = rand(1,$playercount);
        
       // echo"$player"; //für test
       
            // test ob Spielernummer bereits vergeben
            if($playerlist[$player-1]["Player_$player"] === ""){
                 
                // change value of player
                $playerlist[$player-1]["Player_$player"] = $name;
                $newJsonString = json_encode($playerlist);
                file_put_contents("DB/".$playercount."_Players.json", $newJsonString);
                
                $isSet = true;
                //echo"yes";
                
             }else {
                 //echo"nope";
             }
              
    }
    
    
     //Speichern der Spielernummer
    $_SESSION['player']=$player;
    
    //Speicher der Rolle
    $role = $playerlist[$player-1]["Role"];
    $_SESSION['role']= $role;
   
}else if($playercount<5 OR $playercount>10){
    echo"Wrong amount of players <br>";
} 

    
    
?>
 
 
    <body>
    
        <test>
         <div id="refresh" style="text-align:center;"></div>
        </test>
    
<script>

    <?php
        $target= $lobbyinfo[2]["isobserved"];
        //$test=0;
        $name = $_SESSION['username'];
    ?>
     
        //window.alert("<?php echo $target; ?>");
        if(!("<?php echo $target; ?>" == "")){
    
             //window.alert("yuhuu");
             switch ("<?php echo $target; ?>") {
                 case "<?php echo $name; ?>": window.alert("<?php echo $name; ?> du wirst beobachtet"); break;
                 default: window.alert("<?php echo $target; ?> wird beobachtet");
        
                }
        } else{//window.alert("fehler");
        }   

</script>

    <!--
    <div class="Role-pic">
          <img src="Img/Lib.webp" alt="..." > 
    </div>
    -->
    
</h1>        
<h2>

 <?php if ($playercount < 11 and $playercount> 4): ?>


<form action="luschern.php" method="post"><br>
<label for="target">Wähle einen Spieler, dessen Partei du sehen möchtest:</label><br>

<select name="target" >
    
    <?php if ($playercount == 5): ?>

    
    <option value=<?php echo $playernum["Player_1"]; ?>><?php echo $playernum["Player_1"]; ?></option>
    
    <option value=<?php echo $playernum["Player_2"]; ?>><?php echo $playernum["Player_2"]; ?></option>
    
    <option value=<?php echo $playernum["Player_3"]; ?>><?php echo $playernum["Player_3"]; ?></option>
    
    <option value=<?php echo $playernum["Player_4"]; ?>><?php echo $playernum["Player_4"]; ?></option>
    
    <option value=<?php echo $playernum["Player_5"]; ?>><?php echo $playernum["Player_5"]; ?></option>
    
    
 
<?php elseif ($playercount == 6): ?>


    <option value=<?php echo $playernum["Player_1"]; ?>><?php echo $playernum["Player_1"]; ?></option>
    
    <option value=<?php echo $playernum["Player_2"]; ?>><?php echo $playernum["Player_2"]; ?></option>
    
    <option value=<?php echo $playernum["Player_3"]; ?>><?php echo $playernum["Player_3"]; ?></option>
    
    <option value=<?php echo $playernum["Player_4"]; ?>><?php echo $playernum["Player_4"]; ?></option>
    
    <option value=<?php echo $playernum["Player_5"]; ?>><?php echo $playernum["Player_5"]; ?></option>
    
    <option value=<?php echo $playernum["Player_6"]; ?>><?php echo $playernum["Player_6"]; ?></option>
    
    
 
 <?php elseif ($playercount == 7): ?>


    <option value=<?php echo $playernum["Player_1"]; ?>><?php echo $playernum["Player_1"]; ?></option>
    
    <option value=<?php echo $playernum["Player_2"]; ?>><?php echo $playernum["Player_2"]; ?></option>
    
    <option value=<?php echo $playernum["Player_3"]; ?>><?php echo $playernum["Player_3"]; ?></option>
    
    <option value=<?php echo $playernum["Player_4"]; ?>><?php echo $playernum["Player_4"]; ?></option>
    
    <option value=<?php echo $playernum["Player_5"]; ?>><?php echo $playernum["Player_5"]; ?></option>
    
    <option value=<?php echo $playernum["Player_6"]; ?>><?php echo $playernum["Player_6"]; ?></option>
    
    <option value=<?php echo $playernum["Player_7"]; ?>><?php echo $playernum["Player_7"]; ?></option>
    
    
<?php elseif ($playercount == 8): ?>


    <option value=<?php echo $playernum["Player_1"]; ?>><?php echo $playernum["Player_1"]; ?></option>
        
    <option value=<?php echo $playernum["Player_2"]; ?>><?php echo $playernum["Player_2"]; ?></option>
    
    <option value=<?php echo $playernum["Player_3"]; ?>><?php echo $playernum["Player_3"]; ?></option>
    
    <option value=<?php echo $playernum["Player_4"]; ?>><?php echo $playernum["Player_4"]; ?></option>
    
    <option value=<?php echo $playernum["Player_5"]; ?>><?php echo $playernum["Player_5"]; ?></option>
    
    <option value=<?php echo $playernum["Player_6"]; ?>><?php echo $playernum["Player_6"]; ?></option>
    
    <option value=<?php echo $playernum["Player_7"]; ?>><?php echo $playernum["Player_7"]; ?></option>
    
    <option value=<?php echo $playernum["Player_8"]; ?>><?php echo $playernum["Player_8"]; ?></option>
    
   

<?php elseif ($playercount == 9): ?>


     <option value=<?php echo $playernum["Player_1"]; ?>><?php echo $playernum["Player_1"]; ?></option>
    
     <option value=<?php echo $playernum["Player_2"]; ?>><?php echo $playernum["Player_2"]; ?></option>
    
     <option value=<?php echo $playernum["Player_3"]; ?>><?php echo $playernum["Player_3"]; ?></option>
    
     <option value=<?php echo $playernum["Player_4"]; ?>><?php echo $playernum["Player_4"]; ?></option>
    
     <option value=<?php echo $playernum["Player_5"]; ?>><?php echo $playernum["Player_5"]; ?></option>
    
     <option value=<?php echo $playernum["Player_6"]; ?>><?php echo $playernum["Player_6"]; ?></option>
    
     <option value=<?php echo $playernum["Player_7"]; ?>><?php echo $playernum["Player_7"]; ?></option>
    
     <option value=<?php echo $playernum["Player_8"]; ?>><?php echo $playernum["Player_8"]; ?></option>
    
     <option value=<?php echo $playernum["Player_9"]; ?>><?php echo $playernum["Player_9"]; ?></option>
    
  
    
    <?php elseif ($playercount == 10): ?>


    <option value=<?php echo $playernum["Player_1"]; ?>><?php echo $playernum["Player_1"]; ?></option>
    
    <option value=<?php echo $playernum["Player_2"]; ?>><?php echo $playernum["Player_2"]; ?></option>
    
    <option value=<?php echo $playernum["Player_3"]; ?>><?php echo $playernum["Player_3"]; ?></option>
    
    <option value=<?php echo $playernum["Player_4"]; ?>><?php echo $playernum["Player_4"]; ?></option>
    
    <option value=<?php echo $playernum["Player_5"]; ?>><?php echo $playernum["Player_5"]; ?></option>
    
    <option value=<?php echo $playernum["Player_6"]; ?>><?php echo $playernum["Player_6"]; ?></option>
    
    <option value=<?php echo $playernum["Player_7"]; ?>><?php echo $playernum["Player_7"]; ?></option>
    
    <option value=<?php echo $playernum["Player_8"]; ?>><?php echo $playernum["Player_8"]; ?></option>
    
    <option value=<?php echo $playernum["Player_9"]; ?>><?php echo $playernum["Player_9"]; ?></option>

    <option value=<?php echo $playernum["Player_10"]; ?>><?php echo $playernum["Player_10"]; ?></option>


<?php endif; ?>


</select>

<choice>
<input type="Submit" value= "Ermitteln" /></choice> <br>


<?php endif; ?>


</form>
    </sript>

    <div id="figure">
        <div id="pos">
          
        <a href="logout.php"><img src="./Img/exit.webp" style="width:130; height:130px" title="logout" alt="lo"></a>
       
        <!-- <a href="logout.php"><object data="./Img/power.svg"  type="image/svg+xml" width="600" height="193">
            
        </object></a> -->
        </div>
    </div>
    </h2>
    </body>
</html>