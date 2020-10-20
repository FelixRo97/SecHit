<?php
//header("refresh:4;url=lobby.php");
session_start();
$name = "";
if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
}
?>
<html>
    <head>
        <title>Lobby</title>
        
        <link rel="stylesheet" href="Styles/style2.css">    
        
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
          $("#refresh").load("lobbylist.php");
             var refreshId = setInterval(function() {
         $("#refresh").load('lobbylist.php?' + 1*new Date());
             }, 1500);
        });
        </script>
    </head>
    
    <body>
    <div class="center-frame">
         <!--<div class="background"></div>-->
    </div>
    
    <h1>Lobby<h1>
    <h2> <?php echo"Dein Name : $name <br><br>"?> 
    
    

    
    <test>
     <div id="refresh" style="text-align:center;"></div>
    </test>
    
 <?php
 
 
 
    if(isset($_SESSION['position']) AND $_SESSION['position']==0){
        echo"Reset erfolgreich <br><br>";
    }
    ?> 
    
    <figure>
          
        <a href="logout.php"><img src="./Img/exit.png" style="width:110; height:110px" title="logout" alt="lo"></a><br>
       
        <!-- <a href="logout.php"><object data="./Img/power.svg"  type="image/svg+xml" width="600" height="193">
            
        </object></a> -->
        
    </figure>


        <button id="demo" onclick="myFunction()">Want to see your IP?</button>
    
        <script>

            function myFunction() {
                window.alert("<?php $ip = $_SERVER['REMOTE_ADDR']; echo "$ip";?> ");
            }


        </script> 
    </h2>
</body>
</html>

