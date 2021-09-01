<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = "bot";
$conn = mysqli_connect($servidor,$usuario,$senha,$banco);
?>

<?php
$msg = $_GET['msg'];
$telefone_cliente = $_GET['telefone'];

$sql = "SELECT * FROM usuario WHERE telefone ='$telefone_cliente'";
$query = mysqli_query($conn,$sql);
$total = mysqli_num_rows($query);

if($total >0 ){
	//echo 'número encontrado';
	//quando o cliente já tem cadastro
}else{
	$sql = "INSERT INTO usuario (telefone,status) VALUES ('$telefone_cliente', '1')";
	$query = mysqli_query($conn,$sql);

	if (!$query){

	}else{
		echo $menu1;

	}
	//quando o cliente não tem cadastro
}


?>

<?php
$sql = "SELECT * FROM usuario WHERE telefone ='$telefone_cliente'";
$query = mysqli_query($conn,$sql);
$total = mysqli_num_rows($query);

while($rows_usuario = mysqli_fetch_array($query)){
	$status = $rows_usuario['status'];
}
if($status < 7){
	$status2 = $status + 1;

	$sql = "UPDATE usuario SET status ( '$status2') WHERE telefone = '$telefone_cliente";
	$query = mysqli_query($conn,$sql);


} 



?>
