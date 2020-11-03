<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        include_once 'Serpiente.php';
        $serpiente = new Serpiente();
        do
            {
            ?><p>Año :<?php echo$serpiente->getEdad (); ?></p>
            <?php
            //MOSTRAR RESULTADO

            for ($i = 0;
            $i < count ($serpiente->getAnillas ());
            $i++) {
            ?>
            <input type="text"  style=" width : 15px; background-color: <?php echo $serpiente->getAnillas ()[$i]; ?>" border: "5px">
            <?php }
        ?><br>
        <?php
        ob_flush ();
        flush ();
        sleep (1);
        $continuaJuego = $serpiente->vivir ();
        } while ($continuaJuego);
        ?>
    </body>
</html>