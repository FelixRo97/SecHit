<?php
header("Location: distribution.php");

//Spieleranzahl ermitteln
$playercount = 0;

// read json file
    $strJsonFileContents = file_get_contents("DB/lobbylist.json");
    // Convert to array 
    $playerlist = json_decode($strJsonFileContents, true); 

     // read json file
       $strJson2 = file_get_contents("DB/checklobby.json");
        // Convert to array 
        $lobbyinfo = json_decode($strJson2, true);   

    
    
for($count=1; $count <= 10; $count= $count +1){
    
    $playercount = $playercount +1;
    
    // finished counting
    if($playerlist["Player_$playercount"] === ""){
        
        $count=10;
        $playercount = $playercount -1;
    }
    
}
    
   $lobbyinfo[1]["amount"]=$playercount;
    $newJsonString = json_encode($lobbyinfo);
    file_put_contents("DB/checklobby.json", $newJsonString);
    echo"$playercount";

               
 ?>