<?php

  include('db.php');

  $stmt = $pdo->query("SELECT * FROM users");

  while($row = $stmt->fetch()){
    echo 'First Name: ' . $row['firstname'] . '<br>';
    echo 'Last Name: ' . $row['lastname'] . '<br>';
    echo 'Street: ' . $row['street'] . '<br>';
    echo 'City: ' . $row['city'] . '<br>';
    echo 'Country: ' . $row['country'] . '<br><hr>';
  }

?>

<!DOCTYPE html>
<html>
<head>
  <!-- MOBILE RESPONSIVE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- TITLE -->
  <title>Dolas BEM Apps Project</title> 
</head>
<body>
    <div style="text-align: center; margin-top: 3rem;">
      <a href="index.php" >Home.</a>
    </div>
</body>
</html>