<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lista banco</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        td, th {
            padding: 5px;
        }
    </style>
</head>
<body>

    <p>Pesquisa do banco</p>
    <form method="POST" action="">
        <button type="submit" name="BuscaBanco">Buscar dados</button>
    </form>
    
</body>
</html>

<?php

    if (isset($_POST['BuscaBanco'])) {
        try {
            $dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres");
            if($dbconn) {
                echo "databe conectado...";

                $result = pg_query($dbconn, "SELECT
                                                        PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE, PESESTADO
                                                    FROM TBPESSOA;");
                
                $tabelaInicio = "<table><thead><tr> <th>Nome</th> <th>Sobrenome</th> <th>Email</th> <th>Senha</th> <th>Cidade</th> <th>Estado</th> </tr></thead><tbody>";
                $tabelaFim = "</tbody></table>";
                
                echo $tabelaInicio;
                while($row = pg_fetch_assoc($result)) {
                    echo "<tr><td>" . $row['pesnome'] . "</td><td>" . $row['pessobrenome'] . "</td><td>". $row['pesemail'] 
                    . "</td><td>" . $row['pespassword'] . "</td><td>" . $row['pescidade'] . "</td><td>" . $row['pesestado'] . "</td></tr>";
                }
                echo $tabelaFim;
                
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

?> 
