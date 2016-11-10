<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../../Exercice1/theme.css">
  </head>

  <body>
  coucou
  <?php

    try{
      $strConnection = 'mysql:host=localhost;dbname=foo';
      $pdo = new PDO($strConnection, 'root', '');
    }
    catch(PDOException  $e){
      $msg = 'Erreur PDO dans ' . $e->getMessage();
      echo $msg;
  }
  $insert = "INSERT INTO users (nom,sexe) VALUES ('$_POST[firstname]','$_POST[gender]')";
  $pdo->exec($insert);
  
  $Data= $pdo -> query('SELECT * FROM `users`') -> fetchAll();

  ?>

    <table style="">
      <tr>
        <th>ID </th>
        <th>Nom</th>
        <th>Sexe</th>
      </tr>
    <?php foreach ($Data as $value):?>
      <tr>
        <td><?php echo $value['id'];?></td>
        <td><?php echo $value['nom'];?></td>
        <td><?php echo $value['sexe'];?></td>
        <br>
      </tr>
    <?php endforeach; ?>
    </table>
  <?php var_dump($_POST); ?> <br><br><br><br>

  </body>
</html>
