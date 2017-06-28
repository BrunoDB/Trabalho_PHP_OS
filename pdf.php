<?php
session_start();
ob_start();
if (!$_SESSION['logado'])
    header('Location: login.php');

include 'pdf/mpdf.php';
require_once './conexao.php';

$select = "select o.id, nome, usuario, o.data_abertura, o.data_termino, o.descricao_problema, o.descricao_solucao, o.status
            from ordem o 
	inner join usuario u on o.idusuario = u.id 
	inner join cliente c on o.idcliente = c.id";
$query = $bd->query($select);
$lista = $query->fetchAll();

$saida = "<html>
            <body><h1>Lista De Todas as Ordens </h1>";
foreach ($lista as $item) {
    $saida.="
                
 Id: " . $item['id'] . "<br>
                Nome: " . $item['nome'] . "<br>
                Data Abertura: " . $item['data_abertura'] . "<br>
                Data Termino: " . $item['data_termino'] . "<br>
                Descricao Problema: " . $item['descricao_problema'] . "<br>
                Descricao Solução: " . $item['descricao_solucao'] . "<br>
                Status: " . $item['status'] . "<br>"
            . "------------------------------<br>";
}
$saida.="
            </body>
        </html>
        ";

$arquivo = "PDF001.pdf";

$mpdf = new mPDF();
$mpdf->WriteHTML($saida);

/*
 * F - salva o arquivo
 * I - abre no navegador
 * D - chama o prompt
 */

$mpdf->Output($arquivo, 'I');

echo "PDF Gerado com Sucesso";
?>
