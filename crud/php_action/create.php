<?php
//Session
session_start();
// conexao
require_once 'connect.php';

// Clear proteger contra injection e XSS
function clear($input){
  global $conn;
  // sql
    $var = mysqli_escape_string($conn, $input);
    // XSS
    $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['btn-cadastrar'])){
  $nome =clear($_POST['nome']);
  $sobrenome =clear($_POST['sobrenome']);
  $email =clear($_POST['email']);
  $idade =clear($_POST['idade']);

  $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";
if (mysqli_query($conn,$sql)) {
  $_SESSION['mensagem'] = "Cadastrado com sucesso!";
  header('location:../index.php');
}else {
  $_SESSION['mensagem'] = "Erro ao cadastrar";
  header('location:../index.php');
}
}

 ?>
