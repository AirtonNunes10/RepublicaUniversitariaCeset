<?php

    function tipoPagamento($tipoPagamento){

        $tipo = $tipoPagamento;
        
        if ($tipo === "1") {
            return "Doação";
        } else if ($tipo === "2") {
            return "Mensalidade";
        } else if ($tipo === "3") {
            return "Multa";
        }

    }
?>