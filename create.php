<link type="text/css" rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.css">
<link type="text/css" rel="stylesheet" href="style.css">

<?php
//APENAS SETANDO O ÍCONE DE VOLTAR DO FONT AWESOME PARA UMA VARIAVEL GLOBAL
define( 'backIcon', '<i class="fa fa-arrow-left" aria-hidden="true"></i>'); 
?>

<br>

<div class="centralize">
    <form action="sendCreation.php" method="post">
        Nome da Empresa
        <br>
        <input type="text" name="nome">
        <br> CNPJ:
        <br>
        <input type="text" name="cnpj">
        <br> Titulo do Projeto:
        <br>
        <input type="text" name="titulo">
        <br> Descrição:
        <br>
        <input type="text" name="descricao">
        <br>
        <br>
        <input type="submit" value="Criar">
    </form>
    <div>
        <?php 
        //EXIBINDO BOTÃO DE VOLTAR
        echo '
<div class="centralize">
<a href="retrieve.php">'. backIcon . '</a>
</div>'; 
        ?>