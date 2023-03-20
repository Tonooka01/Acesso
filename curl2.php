<?php
// Importa a biblioteca Guzzle
require 'vendor/autoload.php';

// Substitua as credenciais de API abaixo pelas suas próprias
$chave_api = 'Acesso';
$senha_api = 'Q2I3ws2ixRPaj8VyCGhkG5nDzXCy-lY6EKgu';

// Define o número do celular de destino
$to = '5512988487645'; // número com o código do país (55 para o Brasil) e o DDD sem o zero

// Define a mensagem SMS
$message = 'Olá, mundo! Este é um exemplo de mensagem SMS enviada pelo Zenvia.';

// Cria um cliente Guzzle
$client = new \GuzzleHttp\Client();

// Define as opções da requisição HTTP POST
$options = [
    'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Basic ' . base64_encode($apiKey . ':' . $apiSecret)
    ],
    'json' => [
        'sendSmsRequest' => [
            'to' => $to,
            'msg' => $message,
            'callbackOption' => 'NONE',
            'aggregateId' => uniqid()
        ]
    ]
];

// Envia a requisição HTTP POST para a URL da API da Zenvia
$response = $client->post('https://api.zenvia.com/v2/channels/sms/messages', $options);

// Exibe o código de status da resposta HTTP
echo $response->getStatusCode();