<?php
//exemplo: entrada = 1235678901, mascara = ###.###.###.-##
    function mascarar($entrada, $mascara){
        $mascarado = "";
        //esse j=0 é pra ter outro contador que não muda a cada iteração no for
        $j = 0;

        //aqui tem uma iteração no tamanho da máscara
        for($i =0; $i<= strlen($mascara) -1; $i++){
            //o caractere que substitui vai ser #, se o caractere for um #
            if($mascara[$i] === "#"){
                //e se houver um caractere naquela posição na entrada a ser mascarada
                if(isset($entrada[$j])){
                    //é colocado o caractere da entrada (no lugar do #)
                    $mascarado .= $entrada[$j++];
                    //então é colocado o 1 aqui, 2, 3
                }
            }
            //senão, é colocado o item da máscara (o que não é # na máscara)
            else {
                if(isset($mascara[$i])){
                    //então a variavel $mascarado que atualmente está com o valor 123 é acrescida do .
                    $mascarado .= $mascara[$i];
                }
            }
        }
        return $mascarado;
    }
?>