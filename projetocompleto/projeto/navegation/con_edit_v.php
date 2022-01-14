<?php

session_start();

include_once 'conexao.php';

$CadEditRegistro = filter_input(INPUT_POST,'CadEditRegistro', FILTER_SANITIZE_STRING);

if($CadEditRegistro) {
//Receber dados do formulário

   $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
   $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING);
   $modelo = filter_input(INPUT_POST,'modelo', FILTER_SANITIZE_STRING);
   $tipo = filter_input(INPUT_POST,'tipo', FILTER_SANITIZE_STRING);

//inserir no BD

 $result_msg_cnt = "UPDATE carros SET nome=:nome, modelo=:modelo, tipo=:tipo WHERE id=$id";
 
 $update_msg_cont = $conn->prepare($result_msg_cnt);
 $update_msg_cont->bindParam(':nome', $nome);
 $update_msg_cont->bindParam(':modelo', $modelo);
 $update_msg_cont->bindParam(':tipo', $tipo);


 if($update_msg_cont->execute()){
   $_SESSION['msg'] = "<p style = 'color:green;'>Editado com secesso!</p>";
   header("Location: editardados.php");
   
}else{
  
   $_SESSION['msg'] = "<p style = 'color:red;'>Erro ao editar :(</p>";
   header("Location: editardados.php");

}

}else{

   $_SESSION['msg'] = "<p style = 'color:red;'>Erro ao Editar :(</p>";
   header("Location: editardados.php");

}