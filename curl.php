<?php

// Importa a biblioteca Guzzle
require 'vendor/autoload.php';

// Substitua as credenciais de API abaixo pelas suas próprias
$chave_api = 'Acesso';
$senha_api = 'Q2I3ws2ixRPaj8VyCGhkG5nDzXCy-lY6EKgu';
//eyJhbGciOiJSUzI1NiJ9.eyJvcmdhbml6YXRpb25JZCI6Ijg4NDM2Y2NhLWUwMTItNDhjYy1iNzcxLWU3YmJjZDE2MDRjYSIsInN5c0FkbWluVmlld01vZGUiOmZhbHNlLCJwcm9maWxlIjoiMiIsImNyZWRlbnRpYWxJZCI6IjYwN2M3ZmJjLWQ4ZTktNGU5Yy1hODdiLWUxNzhiZTYzZmEzYyIsInVzZXJFbWFpbCI6ImFsZXguYXJhdWpvQG5ldHZhbGV0ZWxlY29tLmNvbSIsInVzZXJJZCI6IjBhZGUzMjYxLWZlNzAtNDEzMy1iNjkxLTUzZmRiMzZkNzNhNyIsInBsYW4iOiJFTlRFUlBSSVNFIn0.MoAtzBrC6W3E4GW9Ow9foN8Z4Z_Bzzf7T2gIkhPuOayXuVchtROSR19-Cp7lL3fmRY9BP5Y9ZfRghEnGW3zkdrybcgYhancMK7DYPsiYcimI0b3dj5jdCjPp5aYPghsWL5BwX4F1B3zYY9jt3U6oNvPlQcsJ66ScwXx5CxL-OalPmWCdgzWqCFQ7gjt0-ui9Zs3ugPspdPliIXgy347qQ7Vtd_bgLtOKImFhFV0nnGULAeOqzsYC-J2JBrTScrypHNhg7G-9oH7fZb-jqPiccfkCB8afm_Db36J5IAKgR_Xo6gUZ8rB3pZVq-Vd4q4_8gwGcuc3hufKeXfHU0JJTTg

// Obtenha o número de telefone do destinatário
$telefone = '+5512988487645';

// Crie uma mensagem SMS
$mensagem = 'Oi Tudo bem';

// Envie a mensagem SMS usando a API do Zenvia
$url = "https://api.zenvia.com/v2/channels/sms/messages";
$dados = array(
    "sendSmsRequest" => array(
        "from" => "Netvale",
        "to" => $telefone,
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
echo "Mensagem SMS enviada para o número $telefone.";