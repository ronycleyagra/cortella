<?php
session_start();
?>
<meta charset="UTF-8">
<?php
include './modulos/auth/User.class.php';
include "./modulos/auth/Auth.class.php";
$auth = new Auth($_POST["login"],$_POST["senha"],"10.16.4.9","389","@pb.sebrae.corp");
if($auth->antentica()){
    $usuario = $auth->getUser();
    $_SESSION["usuario"] = $usuario;
    echo "<script>window.open('./painel.php', '_self');</script>";
}else{
    echo "<script>";
    echo "alert('Usuário/senha inválidos. Tente novamente');";
    echo "window.open('./index.php', '_self')";
    echo "</script>";
}
