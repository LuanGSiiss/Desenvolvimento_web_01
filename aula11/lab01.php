<?php
    try {
        /* Etapa 1 - Criar uma instância da classe de conexão e definir os parâmetros de conexão */
        $dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres");
        if($dbconn) {
            echo "Database conectado...";

            /* Etapa 2 - Fazer uma queru simples - retonará a quantiadde de tabelas no database */
            $result = pg_query($dbconn, "SELECT COUNT(*) AS QTDTABS FROM PG_TABLES");
            /* Etapa 3 - Buscar os dados da query e percorrer as linhas */
            while($row = pg_fetch_assoc($result)) {
                echo "<br>Result: ".$row['qtdtabs'];
            }
        } else {
            throw new Exception("Nao conectou");
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }

?>