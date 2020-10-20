<?php
//header("refresh:6;url=distribution.php");
session_start(); 

$name="";

//In $name den Wert der Session speichern
if(isset($_SESSION['username'])){
$name = $_SESSION['username'];
}
//Spieleranzahl

$playercount = file_get_contents("amount.txt", true);

if($playercount>4 AND $playercount<11 AND !isset($_SESSION['role']) AND !($name==="")){
    //test ob Rolle belegt ist 
    $isSet= false;
    
    //Spielernummer
    $player=0;
 
    //Vergabe der Spielernummer und Eintragen in den jeweiligen Namen 
     while($isSet != true){
        //Ziehe zufällig
        $player = rand(1,$playercount);
       // echo"$player"; //für test
       
            // test ob Spielernummer bereits vergeben
            if(file_get_contents("./Setting/$playercount Players/Player $player/Name.txt", true)===""){

                $myfile = fopen("./Setting/$playercount Players/Player $player/Name.txt", "w") or die("Unable to open file!");
                fwrite($myfile, $name);
                fclose($myfile);
                $isSet = true;
                //echo"yes";
             }else {
                 //echo"nope";
             }

    }
    
    
     //Speichern der Spielernummer
    $_SESSION['player']=$player;
    
    //Speicher der Rolle
    $role = file_get_contents("./Setting/$playercount Players/Player $player/Role.txt", true);
    $_SESSION['role']= $role;
   
}else if($playercount<5 OR $playercount>10){
    echo"Wrong amount of players <br>";
} ?>
 
 <html>
    <head>
        <title>Verteilung</title>
        <link rel="stylesheet" href="Styles/style2.css">

 
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
          $("#refresh").load("dlist.php");
             var refreshId = setInterval(function() {
         $("#refresh").load('dlist.php?' + 1*new Date());
             }, 1500);
        });
        </script>
     </head>
     <h1>

    <body>
    
        <test>
         <div id="refresh" style="text-align:center;"></div>
        </test>
    
<script>

<?php
    $target= file_get_contents("isobserved.txt", true);
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


    <div class="Role-pic">
          <img src="Img/Lib.jpg" alt="..." > 
    </div>   
    
</h1>        
<h2>

<form action="luschern.php" method="post"><br>
<label for="target">Wähle einen Spieler, dessen Partei du sehen möchtest:</label><br>
<select name="target">
    
    <?php if (file_get_contents("amount.txt", true) == 5): ?>

    
    <option value=<?php echo file_get_contents("Session/Player 1.txt", true); ?>><?php echo file_get_contents("Session/Player 1.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 2.txt", true); ?>><?php echo file_get_contents("Session/Player 2.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 3.txt", true); ?>><?php echo file_get_contents("Session/Player 3.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 4.txt", true); ?>><?php echo file_get_contents("Session/Player 4.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 5.txt", true); ?>><?php echo file_get_contents("Session/Player 5.txt", true); ?></option>
    
    
 
<?php elseif (file_get_contents("amount.txt", true) == 6): ?>


    <option value=<?php echo file_get_contents("Session/Player 1.txt", true); ?>><?php echo file_get_contents("Session/Player 1.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 2.txt", true); ?>><?php echo file_get_contents("Session/Player 2.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 3.txt", true); ?>><?php echo file_get_contents("Session/Player 3.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 4.txt", true); ?>><?php echo file_get_contents("Session/Player 4.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 5.txt", true); ?>><?php echo file_get_contents("Session/Player 5.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 6.txt", true); ?>><?php echo file_get_contents("Session/Player 6.txt", true); ?></option>
    
    
 
 <?php elseif (file_get_contents("amount.txt", true) == 7): ?>


    <option value=<?php echo file_get_contents("Session/Player 1.txt", true); ?>><?php echo file_get_contents("Session/Player 1.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 2.txt", true); ?>><?php echo file_get_contents("Session/Player 2.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 3.txt", true); ?>><?php echo file_get_contents("Session/Player 3.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 4.txt", true); ?>><?php echo file_get_contents("Session/Player 4.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 5.txt", true); ?>><?php echo file_get_contents("Session/Player 5.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 6.txt", true); ?>><?php echo file_get_contents("Session/Player 6.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 7.txt", true); ?>><?php echo file_get_contents("Session/Player 7.txt", true); ?></option>
    
    
<?php elseif (file_get_contents("amount.txt", true) == 8): ?>


    <option value=<?php echo file_get_contents("Session/Player 1.txt", true); ?>><?php echo file_get_contents("Session/Player 1.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 2.txt", true); ?>><?php echo file_get_contents("Session/Player 2.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 3.txt", true); ?>><?php echo file_get_contents("Session/Player 3.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 4.txt", true); ?>><?php echo file_get_contents("Session/Player 4.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 5.txt", true); ?>><?php echo file_get_contents("Session/Player 5.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 6.txt", true); ?>><?php echo file_get_contents("Session/Player 6.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 7.txt", true); ?>><?php echo file_get_contents("Session/Player 7.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 8.txt", true); ?>><?php echo file_get_contents("Session/Player 8.txt", true); ?></option>
    
   

<?php elseif (file_get_contents("amount.txt", true) == 9): ?>


    <option value=<?php echo file_get_contents("Session/Player 1.txt", true); ?>><?php echo file_get_contents("Session/Player 1.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 2.txt", true); ?>><?php echo file_get_contents("Session/Player 2.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 3.txt", true); ?>><?php echo file_get_contents("Session/Player 3.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 4.txt", true); ?>><?php echo file_get_contents("Session/Player 4.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 5.txt", true); ?>><?php echo file_get_contents("Session/Player 5.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 6.txt", true); ?>><?php echo file_get_contents("Session/Player 6.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 7.txt", true); ?>><?php echo file_get_contents("Session/Player 7.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 8.txt", true); ?>><?php echo file_get_contents("Session/Player 8.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 9.txt", true); ?>><?php echo file_get_contents("Session/Player 9.txt", true); ?></option>
    
  
    
    <?php elseif (file_get_contents("amount.txt", true) == 10): ?>


    <option value=<?php echo file_get_contents("Session/Player 1.txt", true); ?>><?php echo file_get_contents("Session/Player 1.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 2.txt", true); ?>><?php echo file_get_contents("Session/Player 2.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 3.txt", true); ?>><?php echo file_get_contents("Session/Player 3.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 4.txt", true); ?>><?php echo file_get_contents("Session/Player 4.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 5.txt", true); ?>><?php echo file_get_contents("Session/Player 5.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 6.txt", true); ?>><?php echo file_get_contents("Session/Player 6.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 7.txt", true); ?>><?php echo file_get_contents("Session/Player 7.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 8.txt", true); ?>><?php echo file_get_contents("Session/Player 8.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 9.txt", true); ?>><?php echo file_get_contents("Session/Player 9.txt", true); ?></option>
    
    <option value=<?php echo file_get_contents("Session/Player 10.txt", true); ?>><?php echo file_get_contents("Session/Player 10.txt", true); ?></option>

<?php endif; ?>


</select>


<input type="Submit" value= "Submit" /><br><br>

</form>
    </sript>

    <figure>
          
        <a href="logout.php"><img src="./Img/exit.png" style="width:110; height:110px" title="logout" alt="lo"></a>
       
        <!-- <a href="logout.php"><object data="./Img/power.svg"  type="image/svg+xml" width="600" height="193">
            
        </object></a> -->
        
    </figure>
    </h2>
    </body>
</html>