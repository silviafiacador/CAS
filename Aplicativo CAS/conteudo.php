<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title>CAS - Central de Aluno Senac</title>
	<!-- para aparecer o ícone na aba do título -->
	<link rel="shortcut icon" href="imagens/cas.png">		
	<!-- nosso css -->
	<link rel="stylesheet"  href="estilo/estiloCas.css">
	<!-- bootstrap -->
	<link href="estilo/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<header>
		<h4>Central Aluno Senac</h4><br>
		<img src="imagens/cas2x.png" alt="Logotipo do aplicativo CAS"><br><br>
			<!-- ícone da seta para voltar -->
		<a href="menu.html"><span class="glyphicon glyphicon-circle-arrow-left" style="text-align: center;"></span></a>
	</header>
	<main>
		<table border="1">
			<tr>
				<th>UC</th>
				<th>Data</th>
				<th>Conteúdo</th>
			</tr>
			<br> 

		<?php
		session_start();

		//vamos utilizar a variavel email
		$turma=$_SESSION['turma'];

		include_once("conexao.php");
    	
		$sql = "SELECT DATE_FORMAT(data,'%d/%m/%Y') AS data_formatada,uc,conteudo,turma FROM conteudo WHERE turma = '$turma' ORDER BY data_formatada DESC";

		$resultado= mysqli_query($conn, $sql) or die ('Erro ao retornar dados');

		while ($linha = mysqli_fetch_array($resultado)) { 
			?>
			<tr>
				<td><?php echo $linha['uc']; ?></td>
				<td><?php echo $linha['data_formatada']; ?></td>
				<td><?php echo $linha['conteudo']; ?></td>
			</tr>	

<?php 
}
   
 	mysqli_close($conn);
?>
	</table>
	</main>
</body>
</html>