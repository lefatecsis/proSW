<link type="text/css" rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.css"> 
<link type="text/css" rel="stylesheet" href="style.css">


<?php
//APENAS SETANDO O ÍCONE DE VOLTAR
define('backIcon', '<i class="fa fa-arrow-left" aria-hidden="true"></i>');
//RECEBENDO OS DADOS VIA POST, QUE SERÃO ATUALIZADOS NO BD
$oldNome = $_POST['oldNome'];
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
//DEFININDO ARRAY DE PARAMETROS PARA A INSTANCIA DO CLIENT-SOAP
$options = array(
	'uri' => 'http://127.0.0.1/proSW/server.php',
	'location' => 'http://127.0.0.1/proSW/server.php'
);
//INSTANCIANDO OBJETO CLIENT-SOAP, JUNTAMENTE COM OS PARAMETROS PRÉ-ESTABELECIDOS
$client = new SoapClient(null, $options);
//FAZENDO A REQUISIÇÃO AO SERVER, E RECEBENDO A MENSAGEM DE CONFIRMAÇÃO
$result = ($client->update($nome, $cnpj, $titulo, $descricao, $oldNome));
//IMPRIMINDO A MENSAGEM DE CONFIRMAÇÃO E EXIBINDO O BOTÃO DE VOLTAR
echo '
<div class="centralize">
<h1>' . $result . '</h1>
<a href="retrieve.php">' . backIcon . '</a>
</div>';
?>