<link type="text/css" rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.css"> 
<link type="text/css" rel="stylesheet" href="style.css">

<?php
define('backIcon', '<i class="fa fa-arrow-left" aria-hidden="true"></i>');
$nome = $_GET['nome'];
$options = array(
	'uri' => 'http://127.0.0.1/proSW/server.php',
	'location' => 'http://127.0.0.1/proSW/server.php'
);
$client = new SoapClient(null, $options);
$cliente = ($client->retrieveUpdate($nome));

if (!empty($cliente))
	{
	foreach($cliente as $obj)
		{
		$nome = $obj->nome;
    $cnpj = $obj->cnpj;
		$titulo = $obj->titulo;		
		$descricao = $obj->descricao;
		}
	}
  else
	{
	echo "Nada por aqui";
	}

$oldNome = $nome = $obj->nome;
echo '
<div class="centralize">
<form action="sendUpdate.php" method="POST">

  <input type="text" name="oldNome" value="' . $oldNome . '" hidden>
  
  Nome:<br />
  <input type="text" name="nome" value="' . $nome . '">
  <br />
  CNPJ:<br />
  <input type="text" name="cnpj" value="' . $cnpj . '">
  <br />
  Titulo do Projeto:<br />
  <input type="text" name="titulo" value="' . $titulo . '">
  <br />  
  Descrição:<br />
  <input type="text" name="descricao" value="' . $descricao . '">
  <br />
  <br /><br />
  <input type="submit" value="Atualizar">
</form>
<div>

';
echo '
<div class="centralize">
<a href="retrieve.php">' . backIcon . '</a>
</div>';
?>