<?php

session_start();

?>



<!DOCTYPE html>

<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <title>AutoLoc - Cadastrar Veículos</title>
  <link rel="stylesheet" type="text/css" href="../css/outro.css">
</head>

<body>
<div class="position">

<a href="./index.php"><button class="b1 b1-grey" id="um">Início</button></a>

</div>
  <h1>Cadastrar Veículos</h1>

  <?php
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }

  ?>
      <div class="position-2">
      <form method="POST" action="con_cad_v.php">
        <div class="marca">

          <input type="text" name="nome" placeholder="Insira o nome do veículo">
          <br></br>
          <br></br>
        </div>
        <div class="modelo">
          <label></label>
          <input type="text" name="modelo" placeholder="Insira o nome do modelo do veículo">
          <br></br>
          <br></br>
        </div>
        <div class="tipo">
          <label></label>
          <input type="text" name="tipo" placeholder="SUV ou SEDAN">
          <br></br>
          <br></br>
          <input type="hidden" name="disp" value="sim">
        </div>
        <div class="btn">
          <input class="btn-grey" name="CadRegistro" type="submit" value="Cadastrar" />
        </div>
      </form>

      </div>


</body>

</html>