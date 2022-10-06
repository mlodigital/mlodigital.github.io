<?php
$servername = "localhost";
$username = "masnyben";
$password = "123";
$dbname = "masne_powiedzonka";

try {
   $conn = new PDO("mysql:host=$servername;dbname=".$dbname, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
   
   $stmt = $conn->query('SELECT Powiedzonko FROM powiedzonka');
   $powiedzonka = array();
   while ($row = $stmt->fetch())
   {
     array_push($powiedzonka, $row['Powiedzonko']);
   }
   echo '<span style="display:none;" id="powiedzonko">"'.$powiedzonka[rand(0, count($powiedzonka)-1)].'"</span>';
   $conn = null;
} catch(PDOException $e) {
//  echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Masne Powiedzonko</title>
</head>

<body>
   <div class="main_container">
      <h1>Twoje masne powiedzonko na dziś to</h1>
      <h1><i id="masny_placeholder">"masno"</i></h1>
   </div>
</body>
<style>
   .main_container {
      position: fixed;
      top: 45%;
      left: 0;
      right: 0;
      transform: translate(0, -50%);
      text-align: center;

      background-color: #999;
   }

</style>
<script>
   var powiedzonko = document.getElementById("powiedzonko");
   var masny_placeholder = document.getElementById("masny_placeholder");
   
   document.body.onload = function(){
      masny_placeholder.innerHTML = powiedzonko.innerHTML;   
   };
</script>
</html>
