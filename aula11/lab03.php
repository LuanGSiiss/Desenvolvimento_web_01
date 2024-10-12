<?php

$filename = './dados/dados.txt';

if (file_exists($filename)) {
    $conteudo = file_get_contents($filename);
    $serializeCouteudo = serialize($conteudo);
    
    file_put_contents('./dados/dados02.txt', $serializeCouteudo);

} else {
    echo "caminho não existe";
}
?>