<?php
// Incluir aquivo de conex�o
include("conn.php");
 
// Recebe o valor enviado
$valor = $_GET['nome'];
 
// Procura titulos no banco relacionados ao valor
//$sql = mssql_query("SELECT * FROM inscritoscortella2017 WHERE nome like '%".$valor."%';");
$sql = mssql_query("select pa.NomeRazaoSocial as nome, dbo.FN_Formata_CPF(pa.CgcCpf) as cpf from Participante p, Parceiro pa where p.codevento in ('2032664' ,'2032593') and pa.CodParceiro = p.codpessoapf and pa.NomeRazaoSocial like '%".$valor."%' order by pa.NomeRazaoSocial;");

$result = mssql_fetch_array($sql);

if(count($result) == 1){
    echo "<font size='4' color=red><br>NENHUM RESULTADO ENCONTRADO!</font>";
}else{
    $text = 
            "<table width='100%' border='1'><tr><td width='50%' style='font-size: 17px;'><b>NOME</b></td><td width='25%' style='font-size: 17px;'><b>CPF</b></td>"
            . "<td width='25%' style='font-size: 17px;'><b>STATUS</b></td></tr>"
            . "<tr><td style='font-size: 17px;'>".utf8_encode($result['nome'])."</td><td style='font-size: 17px;'>".$result['cpf']."</td>"
            . "<td style='font-size: 17px;'>INSCRITO</td></tr>";
            
    while ($row = mssql_fetch_array($sql)) {
        $text .= "<tr><td style='font-size: 17px;'>".utf8_encode($row['nome'])."</td><td style='font-size: 17px;'>".$row['cpf']."</td>"
                . "<td style='font-size: 17px;'>INSCRITO</td></tr>";
    }
    
    $text .= "</table>";
    echo $text;
}

// Exibe todos os valores encontrados
//while ($noticias = mysql_fetch_object($sql)) {
//	echo "<a href=\"javascript:func()\" onclick=\"exibirConteudo('".$noticias->id."')\">" . $noticias->titulo . "</a><br />";
//}
 
// Acentua��o
//header("Content-Type: text/html; charset=ISO-8859-1",true);
?>