<?php


$host = "localhost";
$user = "root";
$password = "";
$dbname = "liberar_acesso";

// Cria uma conexão com o banco de dados
$conn = mysqli_connect($host, $user, $password, $dbname);

// Verifica se a conexão foi bem sucedida
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Recebe as informações do formulário
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$cep = $_POST['cep'];

// Remove caracteres não numéricos do número de telefone
$phone = str_replace(array('(', ')', '-', ' '), '', $phone);

// Insere as informações na tabela do banco de dados
$sql = "INSERT INTO acessar_netvale (name, phone, email, cep, created ) VALUES ('$name', '$phone', '$email', '$cep', NOW())";

if (mysqli_query($conn, $sql)) {
    echo "Informações inseridas com sucesso!";

}    

// Substitua as credenciais de API abaixo pelas suas próprias / Envio sms para no numero
$chave_api = 'Acesso';
$senha_api = 'Q2I3ws2ixRPaj8VyCGhkG5nDzXCy-lY6EKgu';

// Obtenha o número de telefone do formulário
$phone = $_POST['phone'];

// Crie uma mensagem SMS
$mensagem = 'Olá, mundo! Este é um exemplo de mensagem SMS enviada pelo Zenvia.';

// Envie a mensagem SMS usando a API do Zenvia
$url = "https://api.zenvia.com/v2/channels/sms/messages";
$dados = array(
    "sendSmsRequest" => array(
        "from" => "NetVale",
        "to" => $phone,
        "msg" => $mensagem
    )
);
$json = json_encode($dados);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Basic ' . base64_encode($chave_api . ':' . $senha_api)
));

$resultado = curl_exec($curl);
curl_close($curl);

// Exiba uma mensagem de confirmação
echo "Mensagem SMS enviada para o número para $phone.";

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
    <p>
        <a href="logout.php">Sair</a>
    </p>
</body>
</html>