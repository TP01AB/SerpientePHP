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

        function muda(&$anillas) {
            for ($i = 0; $i < count($anillas); $i++) {
                $c = random_int(0, 3);
                switch ($c) {
                    case 0:
                        $color = "red";
                        break;
                    case 1:
                        $color = "blue";
                        break;
                    case 2:
                        $color = "yellow";
                        break;
                    case 3:
                        $color = "green";
                        break;
                }
                $anillas[$i] = $color;
            }
        }

        function crecer(&$edad, &$anillas) {
            $edad++;
            $c = random_int(0, 3);
            switch ($c) {
                case 0:
                    $color = "red";
                    break;
                case 1:
                    $color = "blue";
                    break;
                case 2:
                    $color = "yellow";
                    break;
                case 3:
                    $color = "green";
                    break;
            }
            $anillas[] = $color;
        }

        function disminuir(&$anillas, &$estoyViva) {
            if (count($anillas) == 1) {
                $estoyViva = false;
            }
        }

//---------------INICIAMOS
        session_start();
        $estoyViva = true;
        $anillas = array();
        $edad = 0;
        do {
            $mangosta = random_int(1, 100);
            $prob = random_int(1, 100);
            if ($mangosta > 90) {//MUERE
                $estoyViva = false;
            } else { //VIVE
                if ($edad <= 10) {
                    if ($prob < 71) {
                        crecer($edad, $anillas);
                    } else {
                        muda($anillas);
                    }
                } else {
                    if ($prob < 81) { //Disminuir anillas
                        disminuir($anillas, $estoyViva);
                    } else {
                        mudar($anillas);
                    }
                }
            }
            //MOSTRAR RESULTADO
            for ($i = 0; $i < count($anillas); $i++) {
                ?>
                <input type="text"  style=" background-color: <?php echo $anillas[$i]; ?>" border: "2px">

            <?php }
            ?><br>
            <?php
            ob_flush();
            flush();
            sleep(1);
        } while ($estoyViva);
        echo 'muere la serpiente';
        ?>
    </body>
</html>