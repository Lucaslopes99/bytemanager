<?php

include "config.php";

$id_cliente = $_POST['id_cliente'] ?? '';



function gerarToken()
{

    $header = [
        'alg' => 'HS256',
        'typ' => 'JWT'
    ];

    // HEADER __________________________________________________

    // Converte o array em objeto
    $header = json_encode($header);

    // Codifica dados em base64
    $header = base64_encode($header);

    // PAYLOAD __________________________________________________

    // Chave pública

    $duracao = time() + (7 * 24 * 60 * 60);

    $payload = [
        'exp' => $duracao,
        'jti' => "5fcb39c8c887d64d2b4a0cc70eaf7e048227a403"
    ];

    // Converte o array em objeto
    $payload = json_encode($payload);

    // Codifica dados em base64
    $payload = base64_encode($payload);


    // Chave privada
    $chave = '';
    $keyAPI = 'C:\Users\Lucas\Documents\keyAPI.txt';

    if (file_exists($keyAPI)) {
        $chave = file($keyAPI);

        foreach ($chave as $linha) {
            $linha = base64_decode($linha);
        }
    } else {
        echo "Arquvido de Token privado da API não encontrado.";
    }

    $signature = hash_hmac('sha256', "$header.$payload", "$linha", true);

    // Codifica dados em base64
    $signature = base64_encode($signature);



    $token = "$header.$payload.$signature";

    return $token;
    
}

//Lista as caixas de E-mails do domínio


function dadosCliente($data, $conta, $email_domain) 
{

    
    $token = gerarToken();
    
    //Pega o domínio do cliente no banco e joga na query de forma automática
    global $edomain;
    $edomain = $email_domain;

    //Lista as caixas de E-mails do domínio
    $query = "@".$edomain;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.skymail.net.br/v1/mailbox?query={$query}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: bearer ' . $token
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    $data = [
        $response
    ];



    //Lista os produtos contratados e a quantidade que o cliente possui 
    $domain = $edomain;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.skymail.net.br/v1/domain/{$domain}/mail-products");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: bearer ' . $token
    ));

    $tipoConta = curl_exec($ch);
    curl_close($ch);


    $conta = [
        $tipoConta
    ];


    $clienteID = "626";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.skymail.net.br/v1/client/{$clienteID}/product");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: bearer ' . $token
    ));


    $response = curl_exec($ch);
    curl_close($ch);

    $produtosCliente = [
        $response
    ];

    $linhasTabela = '';
    $contas = '';


    $contagemPorProduto = array(); // Inicializa o array para contagem
    $total = 0;

    foreach ($data as $item) {
        $decodedItem = json_decode($item, true);
        if ($decodedItem && isset($decodedItem['data'])) {

            foreach ($decodedItem['data'] as $index => $info) {
                $linhasTabela .= "<tr>";
                $linhasTabela .= "<td> $index</td>"; //indice
                $linhasTabela .= "<td> " . $info['displayname'] . "</td>"; //nome
                $linhasTabela .= "<td>" . $info['mail'] . "</td>"; //email
                $linhasTabela .= "<td> " . $info['accounttype'] . "</td>"; //tamanho conta
                $linhasTabela .= "<td> " . $info['creationdate'] . "</td>"; //data criação
                $linhasTabela .= "<td> " . $info['clientId'] . "</td>"; //id cliente
                $linhasTabela .= "</tr>";

                // Contagem de contas de E-mail por produto contratado
                $produtoContratado = $info['accounttype'];

                $total++;
                if (isset($contagemPorProduto[$produtoContratado])) {
                    $contagemPorProduto[$produtoContratado]++;
                } else {
                    $contagemPorProduto[$produtoContratado] = 1;
                }
            }

            foreach ($conta as $item) {
                $decodedItem = json_decode($item, true);
                if ($decodedItem && isset($decodedItem['data'])) {

                    foreach ($decodedItem['data'] as $index => $info) {
                        //$contas.=  $index;
                        $contas .= "" . $info['name'] . "<br>"; //nome


                        //$contas .= "" . $info['type']. "<br>"; //nome
                    }
                }
            }
        }
    }


    return $linhasTabela;
}



function totalContas($data, $conta, $email_domain) // Quantidade de contas e produtos contratados
{
    $linhasTabela = '';
    $contas = '';
    
    
    $token = gerarToken();
    
    //Pega o domínio do cliente no banco e joga na query de forma automática
    global $edomain;
    $edomain = $email_domain;

    //Lista as caixas de E-mails do domínio
    $query = "@".$edomain;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.skymail.net.br/v1/mailbox?query={$query}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: bearer ' . $token
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    $data = [
        $response
    ];



    //Lista os produtos contratados e a quantidade que o cliente possui 
    $domain = $edomain;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.skymail.net.br/v1/domain/{$domain}/mail-products");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: bearer ' . $token
    ));

    $tipoConta = curl_exec($ch);
    curl_close($ch);


    $conta = [
        $tipoConta
    ];


    $clienteID = "626";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.skymail.net.br/v1/client/{$clienteID}/product");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: bearer ' . $token
    ));


    $response = curl_exec($ch);
    curl_close($ch);

    $produtosCliente = [
        $response
    ];

    $linhasTabela = '';
    $contas = '';

 
    // Conta a quantidade de E-mails por tamanho e exibe todos os produtos contratados.

    $contagemPorProduto = array(); // Inicializa o array para contagem
    $total = 0;

    foreach ($data as $item) {
        $decodedItem = json_decode($item, true);
        if ($decodedItem && isset($decodedItem['data'])) {

            foreach ($decodedItem['data'] as $index => $info) {
                $linhasTabela .= "<tr>";
                $linhasTabela .= "<td> $index</td>"; //indice
                $linhasTabela .= "<td> " . $info['displayname'] . "</td>"; //nome
                $linhasTabela .= "<td>" . $info['mail'] . "</td>"; //email
                $linhasTabela .= "<td> " . $info['accounttype'] . "</td>"; //tamanho conta
                $linhasTabela .= "<td> " . $info['creationdate'] . "</td>"; //data criação
                $linhasTabela .= "<td> " . $info['clientId'] . "</td>"; //id cliente
                $linhasTabela .= "</tr>";

                // Contagem de contas de E-mail por produto contratado
                $produtoContratado = $info['accounttype'];

                $total++;
                if (isset($contagemPorProduto[$produtoContratado])) {
                    $contagemPorProduto[$produtoContratado]++;
                } else {
                    $contagemPorProduto[$produtoContratado] = 1;
                }
            }

            foreach ($conta as $item) {
                $decodedItem = json_decode($item, true);
                if ($decodedItem && isset($decodedItem['data'])) {

                    foreach ($decodedItem['data'] as $index => $info) {
                        //$contas.=  $index ." - "; // Enumeração
                        //$contas .= "" . $info['productId']. "<br>"; //ID do produto
                        $contas .= "" . $info['name'] . "<br>"; //nome


                        //$contas .= "" . $info['type']. "<br>"; //nome
                    }
                }
            }
        }
    }

    // Agora, você pode exibir a contagem de contas por produto contratado
    foreach ($contagemPorProduto as $produto => $contagem) {
        echo "$produto : $contagem  <br>";
    }
    echo "Total: $total <br><br>";

    return $contas;
}
