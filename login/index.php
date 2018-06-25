<?php
// conexao
require_once 'db_connect.php';

// Session
session_start();

// Botao enviar
if(isset($_POST['btn-entrar'])){
  $erros = array();
  $login = mysqli_escape_string($conn, $_POST['login']);
  $senha = mysqli_escape_string($conn, $_POST['senha']);

  if (empty($login) or empty($senha)) {
      $erros[] = "<li> o Campo/login senha precisa ser preenchido. </li>";
}else{
  $sql = "SELECT login FROM usuarios WHERE login = '$login' ";
  $resultado = mysqli_query($conn, $sql);

  if(mysqli_num_rows($resultado) > 0){
    $senha = md5($senha);
    $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 1 ) {
      $dados = mysqli_fetch_array($resultado);
      mysqli_close($conn);
      $_SESSION['logado'] = true;
      $_SESSION['id_usuario'] = $dados['id'];
      header('Location: home.php');
    }else {
      $erros [] = " <li> Usuario e senha nao conferem </li>";
    }
  }
    else {
      $erros[]= "<li> Usuario inexistente </li>";
    }
  }
}


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1> login </h1>
    <?php
    if(!empty($erros)){
      foreach($erros as $erro){
        echo $erro;
      }
    }
     ?>

     <hr>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      Login:<input type="text" name="login"><br>
      Senha:<input type="password" name="senha">
      <button type="submit" name="btn-entrar"> Entrar</button>
    </form>


  </body>
</html>
