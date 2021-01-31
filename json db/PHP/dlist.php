<?php

// server should keep session data for AT LEAST 2 days
ini_set('session.gc_maxlifetime', 172800);

// each client should remember their session id for EXACTLY 2 days
session_set_cookie_params(172800);

session_start(); 
$name="";

 // read json file
$strJson2 = file_get_contents("DB/checklobby.json");
// Convert to array 
$lobbyinfo = json_decode($strJson2, true); 
        
//Spieleranzahl
$playercount = $lobbyinfo[1]["amount"];

  
//In $name den Wert der Session speichern
if(isset($_SESSION['username'])){
$name = $_SESSION['username'];
}



if($playercount>4 and $playercount<11 and isset($_SESSION['role'])){
    
    
    // read json file
    $strJsonFileContents = file_get_contents("DB/".$playercount."_Players.json");
    // Convert to array 
    $playerlist = json_decode($strJsonFileContents, true);  
        
    

    $role = $_SESSION['role'];
    $player = $_SESSION['player'];  
    
    $hit= $playerlist[0]["Player_1"];
    $fascho1= $playerlist[1]["Player_2"];
    $fascho2= $playerlist[2]["Player_3"];
    $fascho3= $playerlist[3]["Player_4"];
 
 
    //Rolle ausgeben
    
    if(strpos($role,'Antidemokrat') !== false){
        echo "$name deine Rolle ist: Antidemokrat <br><br>";
            }else{
        echo "$name deine Rolle ist: $role <br><br>";
    }
    
    
    
    if($playercount==5 OR $playercount==6){
    
        if($role === "Leader"){
        echo "Dein 31er Kollege ist: $fascho1 <br>";
        }
        
        if($role === "Antidemokrat_1"){
        echo "Dein 31er Kollege ist: $hit <br>";
        }
    }
    
    
    
    if($playercount==7 OR $playercount==8){
    
        if($role === "Antidemokrat_1"){
        echo "Dein 31er Kollege ist: $fascho2  <br><br>
        Leader ist : $hit <br>";
        }
        
        if($role === "Antidemokrat_2"){
        echo "Dein 31er Kollege ist: $fascho1 <br><br> 
        Leader ist : $hit <br>";
        }
    }    
    
    

    if($playercount==9 OR $playercount==10){
    
        if($role === "Antidemokrat_1"){
        echo "Deine 31er Kollegen sind: $fascho2 und $fascho3  <br><br>
        Leader ist : $hit <br>";
        }
        
        if($role === "Antidemokrat_2"){
        echo "Deine 31er Kollegen sind: $fascho1 und $fascho3  <br><br>
        Leader ist : $hit <br>";
        }
        
        if($role === "Antidemokrat_3"){
        echo "Deine 31er Kollegen sind: $fascho1 und $fascho2  <br><br>
        Leader ist : $hit <br>";
        }
    
    
    }
}


if(isset($_SESSION['observing']) and $_SESSION['observing'] !==false){

                $lobbyinfo[2]["isobserved"] = "";
                 $newJsonString = json_encode($lobbyinfo);
                file_put_contents("DB/checklobby.json", $newJsonString);
   
                $_SESSION['observing']=false;
}

echo"<br>";

    //search for possible spaces in playername (error avoidence)
for ($i=0; $i<$playercount;$i++){
$j=($i+1);
$playerlist[$i]["Player_$j"] = trim($playerlist[$i]["Player_$j"]);
    }
$newJsonString = json_encode($playerlist);
file_put_contents("DB/".$playercount."_Players.json", $newJsonString);    
?>

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