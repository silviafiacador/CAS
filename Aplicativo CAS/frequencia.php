<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title>CAS - Central de Aluno Senac</title>
	<!-- para aparecer o ícone na aba do título -->
	<link rel="shortcut icon" href="imagens/cas.png">
	<!-- bootstrap -->
	<link href="estilo/bootstrap.min.css" rel="stylesheet">		
	<!-- nosso css -->
	<link rel="stylesheet"  href="estilo/estiloCas.css">
	
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
				<th>C.H.</th>
				<th>Faltas</th>
				<th>Limite</th>
			</tr>
			<br> 

		<?php
		session_start();

		//vamos utilizar a variavel email
		$email=$_SESSION['email'];

		include_once("conexao.php");
    	echo $email;
		$sql = "SELECT notas_freq.uc,notas_freq.faltas, uc.carga_horaria, uc.carga_horaria * 0.25 AS limite FROM notas_freq INNER JOIN uc ON notas_freq.uc = uc.uc WHERE email = '$email'";

		$resultado= mysqli_query($conn, $sql) or die ('Erro ao retornar dados');

		while ($linha = mysqli_fetch_array($resultado)) { 
			?>
			<!-- mostrando os resultados na tabela -->
			<tr>
				<td><?php echo $linha['uc']; ?></td>
				<td><?php echo $linha['carga_horaria']; ?></td>
			
				<!-- vamos pintar de amarelo o fundo das células onde estão as faltas do aluno que são maiores que o limite -->
				<?php 
				if ($linha['faltas']>$linha['limite']){
				?>	
				<td style='background-color:yellow;'> <?php echo $linha['faltas']; ?></td> <?php }
				else { ?>
					<td><?php echo $linha['faltas']; ?></td> <?php } ?>
				<td><?php echo $linha['limite']; ?></td>
			</tr>	

<?php 
}
   
 	mysqli_close($conn);
?>
	</table>
	</main>
</body>
</html>