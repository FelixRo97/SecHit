<?php
header("Location: distribution.php");
//Spieleranzahl ermitteln
$playercount = 0;
for($count=1; $count <= 10; $count= $count +1){
    
    $playercount= $playercount +1;
    if(file_get_contents("./Session/Player $playercount.txt", true)===""){
        $count=10;
        $playercount = $playercount -1;
    }
    
}
    
    $myfile = fopen("amount.txt", "w") or die("Unable to open file!");
                fwrite($myfile, $playercount);
                fclose($myfile);
    echo"$playercount";
 ?>