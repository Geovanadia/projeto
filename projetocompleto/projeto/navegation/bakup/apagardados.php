<?php

session_start();
ob_start();
include_once 'conexao.php';

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
var_dump($id);

if(empty ($id)){
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Carro não encontrado!</p>";
    header("Location: consulta.php");
    exit();
}

$query_usuario = "SELECT id FROM carros WHERE id = $id LIMIT 1";
$result_usuario = $conn->prepare($query_usuario);
$result_usuario->execute();

if(($result_usuario) AND ($result_usuario->rowCount() != 0 )){
   $querry_delusuario =  "DELETE FROM carros WHERE idi = $id";
    $apagar_usuario = $conn->prepare($querry_delusuario);
if($apagar_usuario->execute()){
    $_SESSION['msg'] = "<p style='color: green;'>Erro: Carro excluído com sucesso!</p>";
    header("Location: consulta.php");

}else{
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Carro não apagado com sucesso!</p>";
    header("Location: consulta.php");

}

}else{
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Carro não encontrado!</p>";
    header("Location: consulta.php");
}




