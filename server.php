<?php
//DEFININDO ARRAY DE PARAMETROS PARA CHAMADA DA CLASSE SOAP-SERVER
$options = array(
	'uri' => 'http://127.0.0.1/proSW/server.php'
);
//INSTANCIANDO OBJETO SOAP-SERVER
$server = new SoapServer(null, $options);

class prosw

	{

	// RETRIEVE

	public

	function retrieve()
		{
        //CARREGANDO O ARQUIVO DE CONEXÃO COM O BD
		require ('db_con.php');
        //PREPARANDO A SQL QUE SERÁ EXECUTADA
		$query = $dbh->prepare('SELECT * FROM projetos');
        //EXECUTANDO A QUERY
		$query->execute();
        //RECEBENDO O RESULTADO 
		$dados = $query->fetchAll(PDO::FETCH_OBJ);
        //RETORNANDO O RESULTADO
		return $dados;
		}

	// CREATE

	public function create($nome, $cnpj, $titulo,  $descricao)
		{
        //CARREGANDO O ARQUIVO DE CONEXÃO COM O BD
		require ('db_con.php');
         //PREPARANDO A SQL QUE SERÁ EXECUTADA
		$query = $dbh->prepare(' INSERT INTO projetos (nome, cnpj, titulo, descricao ) VALUES(?,?,?,?) ');
		try
			{ //EXECUTANDO A QUERY
			$query->execute(Array(
				$nome,
				$cnpj,
				$titulo,				
				$descricao
			));
			$result = "Dados Inseridos com sucesso!";
			}

		catch(PDOException $e)
			{
			$result = $e->getMessage();
			}
        //RETORNANDO RESULTADO
		return $result;
		}

	// RETRIEVE UPDATE

	public

	function retrieveUpdate($nome)
		{
        //CARREGANDO O ARQUIVO DE CONEXÃO COM O BD
		require ('db_con.php');
         //PREPARANDO A SQL QUE SERÁ EXECUTADA
		$query = $dbh->prepare('SELECT * FROM projetos WHERE nome = ?');
        //EXECUTANDO A QUERY
		$query->execute(Array(
			$nome
		));
        //RECEBENDO O RESULTADO 
		$dados = $query->fetchAll(PDO::FETCH_OBJ);
        //RETORNANDO O RESULTADO 
		return $dados;
		}

	// UPDATE

	public

	function update($nome,$cnpj, $titulo, $descricao, $oldNome)
		{
        //CARREGANDO O ARQUIVO DE CONEXÃO COM O BD
		require 'db_con.php';
         //PREPARANDO A SQL QUE SERÁ EXECUTADA
		$query = $dbh->prepare(' UPDATE projetos SET nome = "' . $nome . '", cnpj = ' . $cnpj . ', titulo = "' . $titulo . '", descricao = "' . $descricao . '" WHERE nome = "' . $oldNome . '" ');
		try
			{
             //EXECUTANDO A QUERY
			$query->execute();
            // ARMAZENANDO STRING DE CONFIRMAÇÃO
			$result = $nome . "&nbsp;" . $cnpj . "&nbsp;" . $titulo . "&nbsp;"  . $descricao;
			}

		catch(PDOException $e)
			{
			$result = $e->getMessage();
			}
         //RETORNANDO O RESULTADO 
		return $result;
		}

	// DELETE

	public

	function delete($nome)
		{
        //CARREGANDO O ARQUIVO DE CONEXÃO COM O BD
		require 'db_con.php';
        //PREPARANDO A SQL QUE SERÁ EXECUTADA
		$query = $dbh->prepare('DELETE FROM projetos WHERE nome = ? ');
        //EXECUTANDO A QUERY
		$query->execute(Array($nome));
        //RETORNANDO O RESULTADO
		return "Dados apagados com sucesso!";
		}

	// RETRIEVE LOGIN

	public

	function retrieveLogin()
		{
        //CARREGANDO O ARQUIVO DE CONEXÃO COM O BD
		require ('db_con.php');
        //PREPARANDO A SQL QUE SERÁ EXECUTADA
		$query = $dbh->prepare('SELECT * FROM login');
        //EXECUTANDO A QUERY
		$query->execute();
        //RECEBENDO O RESULTADO
		$dados = $query->fetchAll(PDO::FETCH_OBJ);
        //RETORNANDO O RESULTADO
		return $dados;
		}
	}
//ESPECIFICANDO AO SERVER NOSSA CLASSE 'CRUD'
$server->setObject(new prosw());
//PEDINDO PARA GERENCIAR ESSE NOVO OBJETO
$server->handle();
?>