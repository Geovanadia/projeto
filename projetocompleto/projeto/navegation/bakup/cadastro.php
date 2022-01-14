<?php

session_start();

?>



<!DOCTYPE html>

<html lang="pt-br">
  <head>
    <meta charset="UTF-8"/>
    <title>Cadastrar Veículos</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
  </head>
<body>
<h1>Cadastrar Veículos</h1>

<?php
if(isset($_SESSION['msg'])){
   echo $_SESSION['msg'];
   unset($_SESSION['msg']);
}

?>
 
    <form method="POST" action="con_cad_v.php">
      <div class="marca">
   
        <input type="text" name="nome" placeholder="Insira o nome do veículo">
        <br></br>
        <br></br>
      </div>
      <div class="modelo">
        <label>Modelo:</label>
        <input type="text" name="modelo" placeholder="Insira o nome do modelo do veículo">
        <br></br>
        <br></br>
      </div>
      <div class="tipo">
        <label>Tipo:</label>
        <input type="text" name="tipo" placeholder="SUV ou SEDAN"> 
        <br></br>
        <br></br>
      </div>
    <div class="btn">
      <input class="btn-grey" name="CadRegistro" type="submit" value="Cadastrar"/>
    </div>
    </form>



</body>
</html>