<?php
    try {
        /* Etapa 1 - Criar uma instância da classe de conexão e definir os parâmetros de conexão */
        $dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres");
        if($dbconn) {
            echo "Database conectado...";

            /* Etapa 2 - Fazer uma queru simples -retonará a quantiadde de tabelas no database */
            $aDados = [
                strtoupper($_POST['campo_primeiro_nome']) ,
                strtoupper($_POST['campo_sobrenome']),
                $_POST['campo_email'],
                $_POST['campo_password'],
                $_POST['campo_cidade'],
                $_POST['campo_estado']
            ];

            /* Etapa 3 - Fazer a query de inserção dos dados (DML) com o array de valores*/
            $result = pg_query_params($dbconn, "INSERT INTO TBPESSOA
                                                (PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE, PESESTADO)
                                                VALUES
                                                ($1, $2, $3, $4, $5, $6)",
                                                $aDados
                                    );
        } else {
            throw new Exception("Nao conectou");
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }

?>