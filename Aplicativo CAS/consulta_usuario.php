<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>

</body>
</html>
<?php
	$email=$senha="";
	if (!empty($_POST["femail"])) {
		$email=$_POST["femail"]; }
	else 
		{echo ('<script> alert("Email não informado!"); window.location.href="index.html";</script>'); }

	if (!empty($_POST["fsenha"])) {
		$senha=$_POST["fsenha"]; }
	else 
		{echo ('<script> alert("Senha não informada!"); window.location.href="index.html";</script>'); }
//trabalhando com session
//*******************************************	
	session_start();

	// pegando os dados do input

	// para pegar o valor do input email
	$email = $_POST['femail'];

	// colocando a variavel email na session
	$_SESSION['email'] = $email;

//*******************************************
	include_once("conexao.php");
    
	$sql = "SELECT * FROM aluno WHERE email = '$email'  AND senha = '$senha'";

	$resultado= mysqli_query($conn, $sql) or die ('Erro ao retornar dados');

	$registro = mysqli_fetch_array($resultado);
	if (!$registro) {
	echo ('<script>alert("Usuário não encontrado!");
		window.location.href="index.html";</script>');
	die();
}
else {
	$_SESSION['turma'] = $registro['turma'];
	echo ('<script>window.location.href="menu.html";</script>'); }	
     
  mysqli_close($conn);
	
  ?> 		
