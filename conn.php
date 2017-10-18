<?php
$host = "10.16.4.39"; 
$usuario = "dx3_homologacao";
$senha = "452136987";
$banco = "siacnet";
 
$conn = mssql_connect($host, $usuario, $senha);
$db = mssql_select_db($banco, $conn);
?>