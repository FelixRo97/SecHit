<?php
header("Location: index.html");
session_start();
echo '<body style="background-color:black">';
echo '<font color="white">'; 

if(isset($_SESSION['username'])){
$player = $_SESSION['position'];

$name = $_SESSION['username'];

if(isset($_SESSION['username'])){

$myfile = fopen("./Session/Player $player.txt", "w") or die("Unable to open file!");
                fwrite($myfile, "");
                fclose($myfile);
                
                
}
}
session_destroy();


echo"Logout erfolgreich <br><br>
<a href=\"index.html\">New Game</a><br />";
?>