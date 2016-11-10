<?php

  try{
    $strConnection = 'mysql:host=localhost;dbname=foo';
    $pdo = new PDO($strConnection, 'root', '');
  }
  catch(PDOException  $e){
    $msg = 'Erreur PDO dans ' . $e->getMessage();
    echo $msg;
  }

  $insert = "INSERT INTO users (nom)
      VALUES ('John')";
  $pdo->exec($insert);

  $var = $pdo -> query('SELECT nom FROM `users`')-> fetchAll();
  var_dump ($var);

?>

<html>
<body>
  <form action="" method="post">
    ceci est un formulaire<br>
    <input type="text" name="firstname"> <br>
    <input type="radio" name="gender" value="female"> Female<br>
    <input type="radio" name="gender" value="male"> Male<br>
    <input type="checkbox" name="EULA"> J'ai lu et j'accepte les conditions de vente<br>
    <textarea name="Vos pensees" rows="10" cols="10"></textarea><br>
    <input type="reset">
    <input type="submit">

  </form>

</body>
</html>
