<?php
include('../db/banco.php');
include('../auth/controle.php');
header("Content-Type: text/html; charset=ISO-8859-1",true);

//Funcionalidade Gravar Cadastro
if(isset($_POST['btnGravar'])){
	unset($_GET['cadastrar']);
	if(	!empty($_POST['nomeCategoria']) &&
		!empty($_POST['descCategoria'])){
		
		$stmt = odbc_prepare($db, "	INSERT INTO Categoria
									(nomeCategoria,
									 descCategoria
									)
									VALUES
									(?,?)");
		if(odbc_execute($stmt, array(	$_POST['nomeCategoria'],
										$_POST['descCategoria']
									))){
			$msg = 'Usuário gravado com sucesso!';			
		}else{
			$erro = 'Erro ao gravar o usuário';
		}								
							
	}else{
		
		$erro = 'Os campos: Login, Nome e Senha 
					são obrigatórios';
		
	}
}
//FIM Funcionalidade Gravar Cadastro

//Funcionalidade Editar Cadastro
if(isset($_POST['btnAtualizar'])){
	unset($_GET['editar']);
	if(	!empty($_POST['nomeCategoria']) &&
		!empty($_POST['descCategoria'])
		){
		$stmt = odbc_prepare($db, "	UPDATE 
										Categoria
									SET 
										nomeCategoria = ?,
										descCategoria = ?,
									WHERE
										idCategoria = ?");
									
		if(odbc_execute($stmt, array(	$_POST['nomeCategoria'],
										$_POST['descCategoria'],))){
			$msg = 'Categoria atualizada com sucesso!';			
		}else{
			$erro = 'Erro ao atualizar a categoria';
		}								
							
	}else{
		
		$erro = 'Os campos: Login, Nome e Senha 
					são obrigatórios';
		
	}
}
//FIM Funcionalidade Editar Cadastro

//Funcionalidade Excluir
if(isset($_GET['excluir'])){
	if(is_numeric($_GET['excluir'])){
		
		if(odbc_exec($db, "	DELETE FROM 
								Categoria
							WHERE
								idCategoria = {$_GET['excluir']}")){
			$msg = 'Categoria removido com sucesso';						
		}else{
			$erro = 'Erro ao excluir o categoria';
		}
		
	}else{
		$erro = 'Código inválido';
	}
}
//FIM Funcionalidade Excluir

//Funcionalidade Listar
$q = odbc_exec($db, '	SELECT 	idCategoria, nomeCategoria,
								descCategoria
						FROM 
								Categoria');

while($r = odbc_fetch_array($q)){
	
	$Categorias[$r['idCategoria']] = $r;
	
}
//FIM Funcionalidade Listar

if(isset($_GET['cadastrar'])){//FORM Cadastrar

	include('template_cadastrar.php');
	
}elseif(isset($_GET['editar'])){//FORM Editar

	if(is_numeric($_GET['editar'])){
		$q = odbc_exec($db, "	SELECT 	idCategoria, nomeCategoria,
										descCategoria
								FROM Categoria 
								WHERE idCategoria = {$_GET['editar']}");
		$dadosCategoria = odbc_fetch_array($q);
	}else{
		$erro = 'Código inválido';
	}

	include('template_editar.php');
	
}else{//FORM Listar

	include('template_categoria.php');
	
}

?>