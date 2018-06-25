<?php
// conexao
require_once 'db_connect.php';

// Session
session_start();

// Verificacao
if (!isset($_SESSION['logado'])) {
  header('location: index.php');
}

// dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($conn, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($conn);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pagina Restrita</title>
  </head>
  <body>
    <h1>Ola <?php echo $dados['nome']; ?> </h1>
    <a href="logout.php">Sair</a>

  </body>
</html>
