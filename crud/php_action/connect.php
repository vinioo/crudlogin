<?php
// Conexao com o banco de dados
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "crudnode";

$conn = mysqli_connect($servername, $user , $password , $dbname);
mysqli_set_charset($conn, "utf8");

if (mysqli_connect_error()) {
  echo "Erro na conexao :". mysqli_connect_error();
}
 ?>
