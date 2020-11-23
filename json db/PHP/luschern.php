<?php
session_start();?>

    <head>
        <title>Player Membership</title>
        <link rel="stylesheet" href="Styles/style2.css">
    </head>   
<h2>
<br>
<?php
$target = $_POST['target'];


 // read json file
       $strJson2 = file_get_contents("DB/checklobby.json");
        // Convert to array 
        $lobbyinfo = json_decode($strJson2, true); 
        
$playercount = $lobbyinfo[1]["amount"]; 
$targetrole = "";


// read json file
       $strJson = file_get_contents("DB/".$playercount."_Players.json");
        // Convert to array 
        $playerlist = json_decode($strJson, true); 
        

if($playercount>4 and $playercount < 11){
for($search=1; $search<=$playercount;$search = $search +1){
  if($playerlist[$search-1]["Player_$search"] === $target){
      $targetrole = $playerlist[$search-1]["Role"];
      $search = 10;
  } 
}
 if( (strpos($targetrole,'Antidemokrat') !== false) OR (strpos($targetrole,'Leader')!== false)){
     
     echo"$target ist Antidemokrat";
   
                $lobbyinfo[2]["isobserved"] = $target; 
                $newJsonString = json_encode($lobbyinfo);
                file_put_contents("DB/checklobby.json", $newJsonString);
               
                $_SESSION['observing']=true;
     
 }else{
      echo"$target ist Liberal";
      
                $lobbyinfo[2]["isobserved"] = $target; 
                $newJsonString = json_encode($lobbyinfo);
                file_put_contents("DB/checklobby.json", $newJsonString);
                
                $_SESSION['observing']=true;
      
 }
}
 
?>

<br><br>
    <div id="figure2">
        <div id="pos2">
          
        <a href="distribution.php"><img src="./Img/back.webp" style="width:100; height:110px" title="back" alt="back"></a><br>
       
        <!-- <a href="logout.php"><object data="./Img/power.svg"  type="image/svg+xml" width="600" height="193">
            
        </object></a> -->
        </div>
        
    </div>

</h2>
        