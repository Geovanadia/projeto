<?php

session_start();
include_once './conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

?>



<!DOCTYPE html>

<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <title>AutoLoc - Editar dados do veículo</title>
  <link rel="stylesheet" type="text/css" href="../css/outro.css">
</head>

<body>
  <div class="position">

    <a href="./consulta.php"><button class="b1 b1-grey" id="dois">Consultar veículo</button></a>

  </div>
  <h1>Editar dados do veículo</h1>

  <?php
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  //SQL para selecionar os registros

  $result_msg_cont = "SELECT * FROM carros WHERE id=$id";

  $resultado_msg_cont = $conn->prepare($result_msg_cont);
  $resultado_msg_cont->execute();
  $row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC);


  ?>


  <div class="position-3">
  <form method="POST" action="con_edit_v.php">
    <input type="hidden" name="id" value="<?php if (isset($row_msg_cont['id'])) {
                                            echo $row_msg_cont['id'];
                                          } ?>  ">

    <div class="marca">
      <input type="text" name="nome" placeholder="Insira o nome do veículo" value="<?php if (isset($row_msg_cont['nome'])) {
                                                                                      echo $row_msg_cont['nome'];
                                                                                    } ?>  ">
      <br></br>
      <br></br>
    </div>
    <div class="modelo">
      <label></label>
      <input type="text" name="modelo" placeholder="Insira o nome do modelo do veículo" value="<?php if (isset($row_msg_cont['modelo'])) {
                                                                                                  echo $row_msg_cont['modelo'];
                                                                                                } ?> ">
      <br></br>
      <br></br>
    </div>
    <div class="tipo">
      <label></label>
      <input type="text" name="tipo" placeholder="SUV ou SEDAN" value="<?php if (isset($row_msg_cont['tipo'])) {
                                                                          echo $row_msg_cont['tipo'];
                                                                        } ?>">
      <br></br>
      <br></br>
    </div>
    <div class="btn">
      <input class="btn-grey" name="CadEditRegistro" type="submit" value="Editar" />
    </div>
  </form>

  </div>

</body>

</html>