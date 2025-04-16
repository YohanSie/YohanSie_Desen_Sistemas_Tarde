<?php

# rand - Gera um inteiro aleatório
$sorteio = rand (0, 5);
echo "Sorteado: $sorteio <br>";
#array_merge - combina um ou mais arrays
# range - Cria um array contendo uma faixa de elementos
# (inicio, fim, passo)
$vetor = array_merge( 
    range(0, 10),
    range($sorteio, 10, 2),
    array($sorteio)
);
echo "<pre>";
print_r($vetor);
echo "<br>";
#embaralha
shuffle($vetor);
print_r($vetor);
echo "<br>";
foreach ($vetor as $valor) {
    echo " valor $valor tem 3 elementos. <br>";
}
echo "<hr>Yohan Siedschlag";