<?php
session_start();?>

    <head>
        <title>Player Membership</title>
        <link rel="stylesheet" href="Styles/style2.css">
    </head>   
<h2>

<?php
$target = $_POST['target'];
$playercount = file_get_contents("amount.txt", true);
$targetrole = "";

if($playercount>4 AND $playercount < 11){
for($search=1; $search<=10;$search = $search +1){
  if(file_get_contents("./Setting/$playercount Players/Player $search/Name.txt", true)=== $target){
      $targetrole = file_get_contents("./Setting/$playercount Players/Player $search/Role.txt", true);
      $search = 10;
  } 
}
 if( (strpos($targetrole,'Antidemokrat') !== false) OR (strpos($targetrole,'Leader')!== false)){
     
     echo"$target ist Antidemokrat";
     $myfile = fopen("isobserved.txt", "w") or die("Unable to open file!");
                fwrite($myfile, $target);
                fclose($myfile);
                $_SESSION['observing']=true;
     
 }else{
      echo"$target ist Liberal";
      $myfile = fopen("isobserved.txt", "w") or die("Unable to open file!");
                fwrite($myfile, $target);
                fclose($myfile);
                $_SESSION['observing']=true;
      
 }
}
 
?>

<br><br>
    <figure>
          
        <a href="distribution.php"><img src="./Img/back.webp" style="width:100; height:110px" title="back" alt="back"></a><br>
       
        <!-- <a href="logout.php"><object data="./Img/power.svg"  type="image/svg+xml" width="600" height="193">
            
        </object></a> -->
        
    </figure>

</h2>
        