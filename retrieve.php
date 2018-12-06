<link type="text/css" rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.css"> 
<link type="text/css" rel="stylesheet" href="style.css">

<div class="header">
<h1>Lista de Projetos</h1>
</div>


<?php
//ADCIONANDO ICONES DO FONT-AWSOME PARA VARIÁVEIS GLOBAIS
define('createIcon', '<i class="fa fa-plus-square"aria-hidden="true"></i>');
define('updateIcon', '<i class="fa fa-pencil" aria-hidden="true"></i>');
define('deleteIcon', '<i class="fa fa-trash" aria-hidden="true"></i>');


//INSTANCIANDO OBJETO SOAP-CLIENT E SETANDO PARAMETROS
$options = array(
	'uri' => 'http://127.0.0.1/proSW/server.php',
	'location' => 'http://127.0.0.1/proSW/server.php'
);
//INSTANCIANDO SOAP CLIENT
$client = new SoapClient(null, $options);
//REQUISITANDO DADOS PARA O SERVER ATRAVÉS DO PROTOCOLO SOAP
$dados = ($client->retrieve());
//VERIFICANDO SE O ARRAY VEIO VAZIO
if (!empty($dados))
	{
    //IMPRIMINDO TABELA
	echo "<table>
          <tr>
            <th>Cliente</th>
            <th>CNPJ</th>
            <th>Titulo do Projeto</th>            
            <th>Descrição</th>
            <th>Operações</th>
          </tr>";
    //CONVERTENDO O QUE VEIO DO SERVER, PARA OBJETO
	foreach($dados as $clientes)
		{
		echo "
          <tr>
            <td>" . $clientes->nome . "</td>
            <td>" . $clientes->cnpj . "</td>
            <td>" . $clientes->titulo . "</td>            
            <td>" . $clientes->descricao . "</td>
            
            <td> <a href='update.php?nome=" . $clientes->nome . "'>" . updateIcon . "</a> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='delete.php?nome=" . $clientes->nome . "'>" . deleteIcon . "</a>
            </td>
          </tr>";
		}

	echo "</table>";
	}
    //CASO NÃO RETORNE NENHUM DADO DO SERVER
  else
	{
	echo "<p class='centralize'>Não existem dados para mostrar</p>";
	}
//EXIBINDO BOTÃO DE ADCIONAR NOVOS REGISTROS
echo "<br />";
echo "<br />";
echo '<div class="centralize">
<a href="create.php">Adicionarr' . createIcon . '</a>
</div>';
?>
