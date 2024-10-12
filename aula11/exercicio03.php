<?php

    $aDados = [
        strtoupper($_POST['campo_primeiro_nome']) ,
        strtoupper($_POST['campo_sobrenome']),
        $_POST['campo_email'],
        $_POST['campo_password'],
        $_POST['campo_cidade'],
        $_POST['campo_estado']
    ];

    $filename = './dados/pessoasExer03.json';

if (file_exists($filename)) {
    $conteudo = file_get_contents($filename);
    $conteudoEstruturado = json_decode($conteudo);

    array_push($conteudoEstruturado->pessoas, $aDados);

    //Volta para json
    $conteudoJSON = json_encode($conteudoEstruturado);

    //Salva no disco
    file_put_contents('./dados/pessoasExer03.json', $conteudoJSON);

    //Escreve para mostrar
    echo file_get_contents($filename);

} else {
    echo "caminho não existe";
}

?>