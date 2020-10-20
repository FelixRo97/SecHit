<?php
header("Location: lobby.php");
session_start();
echo '<body style="background-color:black">';
echo '<font color="white">'; 

//Spielername
$name = "";
$name = $_POST['name'];

 if ($name === "reset"){
        
        //leere Verteilung 
            
            for($runset=5;$runset<=10;$runset = $runset +1){
            for($runPlayer=1;$runPlayer<= $runset;$runPlayer= $runPlayer+1){
             
             $myfile = fopen("./Setting/$runset Players/Player $runPlayer/Name.txt", "w") or die("Unable to open file!");
             $txt= "";
             fwrite($myfile, $txt);
             fclose($myfile);
             
            }
            }
            //leere Lobby
             for($loc=1;$loc<= 10;$loc= $loc+1){
                $myfile = fopen("./Session/Player $loc.txt", "w") or die("Unable to open file!");
                 $txt= "";
                fwrite($myfile, $txt);
                fclose($myfile);
            }    
            //leere Spielerzahl
             $myfile = fopen("amount.txt", "w") or die("Unable to open file!");
                fwrite($myfile, "");
                fclose($myfile);
                
            $myfile = fopen("isobserved.txt", "w") or die("Unable to open file!");
                fwrite($myfile, "");
                fclose($myfile);    
        
        echo "Reset erfolgreich <br /><br>";
        $_SESSION['position']=0;
       

    }else if(!($name==="") AND (!isset($_SESSION['position'])) AND (!isset($_SESSION['username']))) {
    
    //Spielername in seine Session eintragen
    $_SESSION['username'] = $name;
    
    //Spieler in SessionListe eintragen
    for($pos=1;$pos<= 10;$pos= $pos + 1){
        if(file_get_contents("./Session/Player $pos.txt", true)=== ""){
        $myfile = fopen("./Session/Player $pos.txt", "w") or die("Unable to open file!");
                fwrite($myfile, $name);
                fclose($myfile);
                $_SESSION['position']= $pos;
                $pos=10;
                
        }        
                
    }            
  
}
echo "<a href=\"logout.php\">New Game</a>";


?>
