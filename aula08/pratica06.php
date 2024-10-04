<?php

    $resumoAlunos = array(
        array("Matemática", 5, 8.5),
        array("Português", 2, 9), 
        array("Geografia", 10, 6),
        array("Educação Física", 2, 8));
?>

<table>
    <thead>
        <tr> 
            <th>Disciplina</th> 
            <th>Faltas</th> 
            <th>Média</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($resumoAlunos); $i++): ?>
            <tr>
                <?php for ($j = 0; $j < count($resumoAlunos[$i]); $j++): ?>
                    <td><?php echo $resumoAlunos[$i][$j]; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>