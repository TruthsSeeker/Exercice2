<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../../Exercice1/theme.css">
  </head>

  <body>
  <?php
header('Access-Control-Allow-Origin: *');
    try{
      $strConnection = 'mysql:host=localhost;dbname=foo';
      $pdo = new PDO($strConnection, 'root', '');
    }
    catch(PDOException  $e){
      $msg = 'Erreur PDO dans ' . $e->getMessage();
      echo $msg;
    }


    if (!isset($_POST["firstname"]))
    {
        echo '<h1> Pas de nouvelles données!</h1>';
    }
    else
    {
        #Séries de conditions pour éviter les erreurs au cas ou un champ non requis n'a pas été remplis, a refactorer (foreach?)
        $gender = !empty($_POST["gender"]) ? $_POST["gender"] : null;
        $comments = !empty($_POST["comments"]) ? $_POST["comments"] : null;

        #Requête d'insertion SQL
        $date =  date('Y-m-d H:i:s');
        $insert = "INSERT INTO users (nom,sexe,comments,Date)
        VALUES ('$_POST[firstname]','$gender', '$comments', '$date')";
        $pdo->exec($insert);
    }

      $Data= $pdo -> query('SELECT * FROM `users`') -> fetchAll();

  ?>

    <table style="">
      <tr>
        <th>ID </th>
        <th>Nom</th>
        <th>Sexe</th>
        <th>Commentaires</th>
      </tr>
    <?php foreach ($Data as $value):?>
      <tr>
        <td><?php echo $value['id'];?></td>
        <td><?php echo $value['nom'];?></td>
        <td><?php echo $value['sexe'];?></td>
        <td><?php echo $value['comments'];?></td>
        <br>
      </tr>
    <?php endforeach; ?>
    </table>
  <?php var_dump($_POST); ?> <br><br><br><br>

  </body>
</html>
