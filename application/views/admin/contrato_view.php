<?php
foreach ($contratos as $linha) {
    echo $linha->idcontrato.": ";
    print "Tipo Contrato: ".$linha->nomecontrato;
    echo "<br/><br/>";    
}
?>