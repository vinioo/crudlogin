<?php
//Session
session_start();
// conexao
require_once 'connect.php';

if(isset($_POST['btn-deletar'])){

  $id =mysqli_escape_string($conn, $_POST['id']);

  $sql = "DELETE FROM clientes WHERE id = '$id'";
if (mysqli_query($conn,$sql)) {
  $_SESSION['mensagem'] = "Deletado com sucesso!";
  header('location:../index.php');
}else {
  $_SESSION['mensagem'] = "Falha ao deletar";
  header('location:../index.php');
}
}

 ?>
