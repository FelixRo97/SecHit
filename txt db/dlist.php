<?php
session_start(); 
$name="";

//In $name den Wert der Session speichern
if(isset($_SESSION['username'])){
$name = $_SESSION['username'];
}

//Spieleranzahl
$playercount = file_get_contents("amount.txt", true);


if($playercount>4 AND $playercount<11 AND isset($_SESSION['role'])){

    $role = $_SESSION['role'];
    $player = $_SESSION['player'];    

    $hit= file_get_contents("./Setting/$playercount Players/Player 1/Name.txt", true);
    $fascho1= file_get_contents("./Setting/$playercount Players/Player 2/Name.txt", true);
    $fascho2= file_get_contents("./Setting/$playercount Players/Player 3/Name.txt", true);
    $fascho3= file_get_contents("./Setting/$playercount Players/Player 4/Name.txt", true);

 
 
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
    
    if($role === "Antidemokrat 1"){
    echo "Dein 31er Kollege ist: $hit <br>";
    }
    }
    if($playercount==7 OR $playercount==8){
    
    if($role === "Antidemokrat 1"){
    echo "Dein 31er Kollege ist: $fascho2  <br>
    Leader ist : $hit <br>";
    }
    
    if($role === "Antidemokrat 2"){
    echo "Dein 31er Kollege ist: $fascho1 <br> 
    Leader ist : $hit <br>";
    }
    }    

    if($playercount==9 OR $playercount==10){
    
    if($role === "Antidemokrat 1"){
    echo "Deine 31er Kollegen sind: $fascho2 und $fascho3  <br>
    Leader ist : $hit <br>";
    }
    
    if($role === "Antidemokrat 2"){
    echo "Deine 31er Kollegen sind: $fascho1 und $fascho3  <br>
    Leader ist : $hit <br>";
    }
    
    if($role === "Antidemokrat 3"){
    echo "Deine 31er Kollegen sind: $fascho1 und $fascho2  <br>
    Leader ist : $hit <br>";
    }
    
    
    }
    }

if(isset($_SESSION['observing']) AND $_SESSION['observing'] !==false){
    $_SESSION['observing']=false;
    $myfile = fopen("isobserved.txt", "w") or die("Unable to open file!");
                fwrite($myfile, "");
                fclose($myfile);
            
}

echo"<br>";?>

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