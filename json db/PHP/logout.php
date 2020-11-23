<?php
header("Location: https://savethedemocracy.000webhostapp.com/index.html");
session_start();
echo '<body style="background-color:black">';
echo '<font color="white">'; 

if(isset($_SESSION['username'])){
    
    $pos = $_SESSION['position'];
    
    $name = $_SESSION['username'];
    
        // read json file
    $strJsonFileContents = file_get_contents("DB/lobbylist.json");
    // Convert to array 
    $playerlist = json_decode($strJsonFileContents, true);  
    
     // change value of player
    $playerlist["Player_$pos"] = "";
    $newJsonString = json_encode($playerlist);
    file_put_contents("DB/lobbylist.json", $newJsonString);
                    
                    
      // read json file
       $strJson2 = file_get_contents("DB/checklobby.json");
        // Convert to array 
        $lobbyinfo = json_decode($strJson2, true);  
        
        $lobbyinfo[0]["Player_$pos"] = true;             
        
        $newJsonString = json_encode($lobbyinfo);
        file_put_contents("DB/checklobby.json", $newJsonString);
                    
                    
}
session_destroy();


echo"Logout erfolgreich <br><br>
<a href=\"https://savethedemocracy.000webhostapp.com/index.html\">New Game</a><br />";
?>