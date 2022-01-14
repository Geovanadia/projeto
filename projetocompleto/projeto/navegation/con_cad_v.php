<?php

session_start();

include_once 'conexao.php';

$CadRegistro = filter_input(INPUT_POST,'CadRegistro', FILTER_SANITIZE_STRING);

if($CadRegistro) {
//Receber dados do formulário

   $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING);
   $modelo = filter_input(INPUT_POST,'modelo', FILTER_SANITIZE_STRING);
   $tipo = filter_input(INPUT_POST,'tipo', FILTER_SANITIZE_STRING);
   $disp = filter_input(INPUT_POST,'disp', FILTER_SANITIZE_STRING);

//inserir no BD

 $result_msg_cnt = "INSERT INTO carros (nome, modelo, tipo, disp) VALUES (:nome, :modelo, :tipo, :disp)";
 
 $insert_msg_cont = $conn->prepare($result_msg_cnt);
 $insert_msg_cont->bindParam(':nome', $nome);
 $insert_msg_cont->bindParam(':modelo', $modelo);
 $insert_msg_cont->bindParam(':tipo', $tipo);
 $insert_msg_cont->bindParam(':disp', $disp);


 if($insert_msg_cont->execute()){
   $_SESSION['msg'] = "<p style = 'color:green;'>Cadastrado com secesso!</p>";
   header("Location: cadastro.php");
   
}else{
  
   $_SESSION['msg'] = "<p style = 'color:red;'>Erro ao cadastrar</p>";
   header("Location: cadastro.php");

}

}else{

   $_SESSION['msg'] = "<p style = 'color:red;'>Erro ao cadastrar</p>";
   header("Location: cadastro.php");

}