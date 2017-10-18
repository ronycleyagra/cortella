<?php
// Incluir aquivo de conex�o
include("conn.php");
 
// Recebe o valor enviado
$valor = $_GET['cpf'];
 
// Procura titulos no banco relacionados ao valor
$sql = mssql_query("select pa.NomeRazaoSocial as nome from Participante p, Parceiro pa where p.codevento in ('2032664' ,'2032593') and pa.CodParceiro = p.codpessoapf and dbo.FN_Formata_CPF(pa.CgcCpf) = '".$valor."';");
//$sql = mssql_query("SELECT * FROM inscritoscortella2017 WHERE cpf = '".$valor."';");

$result = mssql_fetch_array($sql);

if(count($result) == 1){
    echo "<font size='6' color=red>NÃO INSCRITO</font>";
}else{
    echo "<font size='6' color=blue>INSCRITO: ". strtoupper(utf8_encode($result["nome"]))."</font>";
}
 
// Exibe todos os valores encontrados
//while ($noticias = mysql_fetch_object($sql)) {
//	echo "<a href=\"javascript:func()\" onclick=\"exibirConteudo('".$noticias->id."')\">" . $noticias->titulo . "</a><br />";
//}
 
// Acentua��o
//header("Content-Type: text/html; charset=ISO-8859-1",true);
?>