<?php

session_start();
ob_start();
include_once './conexao.php';
$row_msg_cont = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

?>



<!DOCTYPE html>

<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <title>AutoLoc - Visualizar Veículos</title>
  <link rel="stylesheet" type="text/css" href="../css/outro.css">
</head>

<body>
  <div class="position">

    <a href="./consulta.php"><button class="b1 b1-grey" id="dois">Consultar veículo</button></a>

  </div>
  <h1>Visualizar Veículos</h1>

  <div class="position-2">

    <?php

    $query_usuario = "SELECT id, nome, modelo, tipo, disp FROM carros WHERE id = $row_msg_cont LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->execute();

    if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
      $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
      //var_dump($row_usuario);
      extract($row_usuario);
      //echo "ID: " . $row_usuario['id'] . "<br>";            
      echo "Número de pedido: $id <br>";
      echo "Nome: $nome <br>";
      echo "Modelo: $modelo <br>";
      echo "Tipo: $tipo <br>";
      echo "Disponível?: $disp <br>";
    } else {
      $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
      header("Location: index.php");
    }

    ?>
  </div>

</body>

</html>