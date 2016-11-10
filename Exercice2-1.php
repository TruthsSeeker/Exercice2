<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../../Exercice1/theme.css">
  </head>

  <body>
  <?php

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
        #Séries de conditions pour éviter les erreurs au cas ou un champ non requis n'a pas été remplis
        if (!empty($_POST["gender"])){
            $gender = $_POST["gender"];
        }
        else{
            $gender = 'N/A';
        }

        if (!empty($_POST["comments"])){
            $comments = $_POST["comments"];
        }
        else {
            $comments = 'N/A';
        }

        #Requête d'insertion SQL
        $insert = "INSERT INTO users (nom,sexe,comments)
        VALUES ('$_POST[firstname]','$gender', '$comments')";
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
