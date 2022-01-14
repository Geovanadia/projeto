<?php

include_once './conexao.php'

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/outro.css">
    <title>AutoLoc - Consulta de veículos</title>
</head>
<body>
<div class="position">

<a href="./index.php"><button class="b1 b1-grey" >Início</button></a>

</div>
    <h1>Consulta de veículos</h1>
 <div class="position-4">
<?php
        //SQL para selecionar os registros
        $result_msg_cont = "SELECT * FROM carros ORDER BY id ASC";

        //Seleciona os registros
        $resultado_msg_cont = $conn->prepare($result_msg_cont);
        $resultado_msg_cont->execute();

        while ($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)) {
            echo "Número de pedido: " . $row_msg_cont['id'] . "<br>";
            echo "Nome: " . $row_msg_cont['nome'] . "<br>";
            echo "Modelo: " . $row_msg_cont['modelo'] . "<br>";
            echo "Tipo: " . $row_msg_cont['tipo'] . "<br>";
            echo "Disponível?: " . $row_msg_cont['disp'] . "<br>";

            echo "<a href='visualizar.php?id=".$row_msg_cont['id']."'>Visualizar</a><br>";
            echo "<a href='editardados.php?id=".$row_msg_cont['id']."'>Editar</a><br>";
            echo "<a href='apagardados.php?id=".$row_msg_cont['id']."'>Apagar</a><br><hr>";
        }


?>
</div>   
</body>
</html>