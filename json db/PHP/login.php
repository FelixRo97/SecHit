<?php
// server should keep session data for AT LEAST 2 days
ini_set('session.gc_maxlifetime', 172800);

// each client should remember their session id for EXACTLY 2 days
session_set_cookie_params(172800);

header("Location: lobby.php");
session_start();
echo '<body style="background-color:black">';
echo '<font color="white">'; 

//Spielername
$name = "";
$name = trim($_POST['name']);


 if ($name === "reset"){
        
        //clear distribution 
      
            for($runset=5;$runset<=10;$runset = $runset +1){
                
                  
                $newJsonString = file_get_contents("DB/backUp$runset.json");
                file_put_contents("DB/".$runset."_Players.json", $newJsonString);
                  
                  
                /* read json file
                $strJsonFileContents = file_get_contents("DB/".$runset."_Players.json");
                // Convert to array 
                $playerlist = json_decode($strJsonFileContents, true);  
                
                for($runPlayer=1;$runPlayer<= $runset;$runPlayer= $runPlayer+1){
                 
                        // change value of player
                        $playerlist[$runPlayer-1]["Player_$runPlayer"] = "";
                }
                
                $newJsonString = json_encode($playerlist);
                file_put_contents("DB/".$runset."_Players.json", $newJsonString);*/
            }
            
            //clear Lobby
            
           //empyty json file
            $player = '{"Player_1":"","Player_2":"","Player_3":"","Player_4":"","Player_5":"","Player_6":"","Player_7":"","Player_8":"","Player_9":"","Player_10":""}';
            
            file_put_contents("DB/lobbylist.json", $player);
            
            
            //clear lobbyinfo
            $lobbyinfo = '[{"Player_1":true,"Player_2":true,"Player_3":true,"Player_4":true,"Player_5":true,"Player_6":true,"Player_7":true,"Player_8":true,"Player_9":true,"Player_10":true}, {"amount": 0},{"isobserved":""}]';
            
                file_put_contents("DB/checklobby.json", $lobbyinfo);
            
            
        echo "Reset erfolgreich <br /><br>";
        // observer posi
        $_SESSION['position']=0;
        
        
       
        // player login
    }else if(!($name==="") and (!isset($_SESSION['position'])) and (!isset($_SESSION['username']))) {
    
        //Spielername in seine Session eintragen
        $_SESSION['username'] = $name;
    
    

        //Spieler in SessionListe eintragen
        
                        // read json file
            $strJsonFileContents = file_get_contents("DB/lobbylist.json");
            // Convert to array 
            $playerlist = json_decode($strJsonFileContents, true);  
            
              $strJson2 = file_get_contents("DB/checklobby.json");
            // Convert to array 
            $lobbyinfo = json_decode($strJson2, true);  
    
    
        for($pos=1;$pos<= 10;$pos= $pos + 1){
            
            // if position is empty
            // additional ture value for bug fixing but didn't work...
            if( $playerlist["Player_$pos"] === "" and ( $lobbyinfo[0]["Player_$pos"] !== false)){
                    
                    // change value of player
                    $playerlist["Player_$pos"] = $name;
                    $newJsonString = json_encode($playerlist);
                    file_put_contents("DB/lobbylist.json", $newJsonString);
                    
                    $lobbyinfo[0]["Player_$pos"] = false;
                    $newJsonString = json_encode($lobbyinfo);
                    file_put_contents("DB/checklobby.json", $newJsonString);
                    
                    
                    $_SESSION['position'] = $pos;
                    $pos=10;
                    
                    
            }        
                    
        }            
  
    }
    
echo "<a href=\"logout.php\">New Game</a>";


?>
