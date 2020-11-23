<?php
//header("refresh:4;url=lobby.php");

// server should keep session data for AT LEAST 2 days
ini_set('session.gc_maxlifetime', 172800);

// each client should remember their session id for EXACTLY 2 days
session_set_cookie_params(172800);

session_start();

//https://savedemocracy.000webhostapp.com/index.html


$name = "";
if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
}
?>
<html>
    <head>
        <title>Lobby</title>
        
        <link rel="stylesheet" href="Styles/style2.css">    
        
        
    </head>
    
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    
        <script type="text/javascript">
        $(document).ready(function() {
          $("#refresh").load("lobbylist.php");
             var refreshId = setInterval(function() {
         $("#refresh").load('lobbylist.php?' + 1*new Date());
             }, 1500);
        });
        
    </script>
    
    <body>
    <div class="center-frame">
         <!--<div class="background"></div>-->
    </div>
    
    <script>
        
        
        
        
    </script>
    
    <h1>Lobby<h1>
    <h2> <?php
        if(!($name ==="")){
        echo"Dein Name : $name ";
        }
    
        if(isset($_SESSION['position']) AND $_SESSION['position']==0){
        echo"Reset erfolgreich";
        }
        ?> 
    </h2> 
    <br><br>


     <div id="refresh" style="text-align:center;"></div>
    
       <!--
        <btn>
        <button id="demo" onclick="myFunction()">Want to see your IP?</button>
    
        <script>

            function myFunction() {
                window.alert("<?php $ip = $_SERVER['REMOTE_ADDR']; echo "$ip";?> ");
            }


        </script> 
        </btn>
        -->
        
        

</body>
</html>

