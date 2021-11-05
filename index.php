<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = "bot";
$conn = mysqli_connect($servidor,$usuario,$senha,$banco);


if(!$conn){
	//echo "deu ruim";
}else{
	//echo "deu bom";
}
?>

<?php
//Menu

$menu1 = "Olá bem vindo, sou o seu atentende virtual \n vamos começar seu atendimento. \n 
 *1* Hanburguer\n
 *2* Hamburguer 2\n
 *3* Hanburguer2 \n
 *4* Pizza\n
 *5* hotdog\n";
$menu2 = "agora escolha sua bebida: \n
*1* Coca=cola\n
*2* Pepsi\n
*3* Fanta\n
*4* Guarabá antarctica\n
*5* Dolly\n";
$menu3 = "ok, Seu pedido foi anotado, escreva abaixo, por favor, seu endereço completo.";
$menu4 = "algum ponto de referência? ";
$menu5 = "agora escolha sua forma de pagamento: \n
*1* Crédito\n
*2* Débito\n
*3* trâsferencia\n
*4* Pix\n";
$menu6 = "Obrigado pela preferência";

//Final do Menu 

//Data da mensagem 
$data=date('d-m-y');
//Final Data da mansagem
?>


<?php

//Lendo mensagen e número 

$msg = $_GET['msg'];
$telefone_cliente = $_GET['telefone'];

//Finel Lendo mensagen e numero

//Consulta no banco de dados
//// Aqui está consultando no banco na tabela usuario é existe um usuario com o Núnero do cliente

$sql = "SELECT * FROM usuario WHERE telefone ='$telefone_cliente'";
	$query = mysqli_query($conn,$sql); //aqui esta a conecxão com banco

	//resposta do banco
	$total = mysqli_num_rows($query);
//consilta no banco

// laço de repetição para alteração do status
	while($rows_usuario = mysqli_fetch_array($query)){
	$status = $rows_usuario['status'];
}

//Condição para respostas
///Aqui cada If vai fazer um teste lógoco para avaliar o  valor do status, e com isso dar a resposta

if ($total >0){

	//echo "numero encontrado";

	if($status == 2){
		echo $menu2;
		$resposta=$menu2;
	}
	if($status == 3){
		echo $menu3;
		$resposta=$menu3;
	}
	if($status == 4){
		echo $menu4;
		$resposta=$menu4;
	}
	if($status == 5){
		echo $menu5;
		$resposta=$menu5;
	}
	if($status == 6){
		echo $menu6;
		$resposta=$menu6;
	}

}else{

	//Caso não tenha usuário cadastrado com o número será feito um cadastro para o número com o Status 1 como início de atendimento 

	$sql = "INSERT INTO usuario (telefone,status) VALUES ('$telefone_cliente', '1')";
	$query = mysqli_query($conn,$sql);

	if (!$query){
	}else{
		echo $menu1;
		$resposta=$menu1;

	}
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

	$sql = "UPDATE usuario SET status = '$status2' WHERE telefone = '$telefone_cliente'";
	$query = mysqli_query($conn,$sql);


} 
?>
<?php

$sql = "INSERT INTO historico (telefone, cliente1, bot, data) VALUES ('$telefone_cliente', '$msg','$resposta', '$data')";
	$query = mysqli_query($conn,$sql);

?>


