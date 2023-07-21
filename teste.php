<?php

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
    echo "O arquivo não foi encontrado.";
}

$signature = hash_hmac('sha256', "$header.$payload", "$linha", true);

// Codifica dados em base64
$signature = base64_encode($signature);


// TOKEN __________________________________________________

$token = "$header.$payload.$signature";

//echo "$token <br><br>"; //Token completo de requisição a API

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.skymail.net.br/v1/mailbox?query=@alpha");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Authorization: bearer ' . $token
));

$response = curl_exec($ch);
curl_close($ch);

//var_dump($response);

$data = [
    $response
];


function gerarContas($data) {
    $linhasTabela = '';
    
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
          
            }
          
        }
        
    }
    return $linhasTabela;

 
    
}


function totalContas($data) {
    $linhasTabela = '';
    $count5GB =0;
    $count25GB =0;
    $count50GB =0;
    $count100GB =0;
    $count200GB =0;
  
    
    
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

                $info['accounttype'];
                if($info['accounttype'] == "SkyExchange 5GB" || $info['accounttype'] == "SkyMail 5GB"){
                    $count5GB = $count5GB + 1;
        
                  
                }
        
                if($info['accounttype'] == "SkyExchange 25GB" || $info['accounttype'] == "SkyMail 25GB") {
                    $count25GB = $count25GB +1;
                    
                }
        
                if($info['accounttype'] == "SkyExchange 50GB" || $info['accounttype'] == "SkyMail 50GB" ) {
                $count50GB = $count50GB +1;
               
                }
                if($info['accounttype'] == "SkyExchange 100GB" || $info['accounttype'] == "SkyMail 100GB" ) {
                    $count100GB = $count100GB +1;
                   
                }
                if($info['accounttype'] == "SkyExchange 200GB" || $info['accounttype'] == "SkyMail 200GB" ) {
                    $count200GB = $count200GB +1;
                   
                }
          
            }
          
        }
        
    }
   
    for($i =0; $i<=$index; $i++){
        $i = $i + 1;
        

    }
    echo "SkyMail 5GB: ".$count5GB."<br>";
    echo "SkyMail 25GB: ".$count25GB . "<br>";
    echo "SkyMail 50GB: ".$count50GB. "<br>";
    echo "SkyMail 100GB: ".$count100GB. "<br>";
    echo "SkyMail 200GB: ".$count200GB. "<br>";
    echo "TOTAL: ".$i . "<br>";
   

 
    
}








