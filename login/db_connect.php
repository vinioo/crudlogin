<?php
  // Conexao com o banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "sistemalogin";

  $conn = mysqli_connect($servername, $username , $password , $db_name);

  if(mysqli_connect_error()):
    echo "Falha na conexao :". mysqli_connect_error();
  endif;

 ?>
