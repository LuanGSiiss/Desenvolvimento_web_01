<?php
    $SALARIO1 = 1000;
    $SALARIO2 = 2000;
    
    $SALARIO2 = $SALARIO1;

    $SALARIO2++;

    $SALARIO1 *= 1.10;

    echo "Valor Salário 1: $SALARIO1 e Valor Salário 2: $SALARIO2 <br>";

    if ($SALARIO1 > $SALARIO2) {
        echo "O Valor de Salário 1 é maior que Salário 2";
    } else if ($SALARIO2 > @$SALARIO1) {
        echo "O Valor de Salário 2 é maior que Salário 1";

    } else {
        echo "Os valores são iguais";
    }
?>