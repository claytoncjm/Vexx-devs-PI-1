<html>
<head>
    <link rel="stylesheet" type="text/css" href="template_cadastrar.css">
    
    </head>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<body>		<ul>
		<li><a href="../user/index.php">Usuario</a></li>
		<li><a href="../categ/index.php">Categoria</a></li>
		<li><a href="../produto/index.php">Produto</a></li>
		<li><a href="../?logout=1">Sair</a></li>
</ul>
		<a class="button" href="?cadastrar=1">Cadastrar uma Categoria</a>
		<br>
		<?php
		if(isset($msg))
			echo "	<br><center><b><font color='green'>
					$msg</font></b></center><br>";
		if(isset($erro))
			echo "	<br><center><b><font color='red'>
					$erro</font></b></center><br>";
		?>
		<br>
        <table id="tabela">
			<thead>
            	<caption> Categorias Cadastradas </caption>
				<tr>
		            <th></th>
    		        <th>Id</th>
        		    <th>Nome</th>
           	 		<th>Descrição</th> 
            	  	<th>Excluir</th>
            	</tr>
            </thead>
            	<tbody>
            	<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>

				</tr>
            </tbody>
			<?php
			foreach($Categorias as $idCategoria => $dadosCategoria){
				
				echo "	<tr>
							<td>$idCategoria</td>
							<td>{$dadosCategoria['nomeCategoria']}</td>
							<td>{$dadosCategoria['descCategoria']}</td>
							<td><a href='?editar=$idCategoria'>e</a></td>
							<td><a href='?excluir=$idCategoria'>x</a></td>
						</tr>";
				
			}
			?>
		</table>
	</body>
</html>
		