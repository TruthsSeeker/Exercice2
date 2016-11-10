<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../../Exercice1/theme.css">
  </head>

  <body>
  coucou

  <?php if (!isset($_POST["firstname"])):?>
    Pas set!
  <?php  else:?>
    <table style="">
      <tr>
        <th>Type </th>
        <th>Value</th>
      </tr>
    <?php foreach ($_POST as $key => $value):?>
      <tr>
        <td><?php echo $key;?></td>
        <td><?php echo $value;?></td>
        <br>
      </tr>
    <?php endforeach; ?>
    </table>
  <?php var_dump($_POST); endif; ?> <br><br><br><br>

  </body>
</html>
