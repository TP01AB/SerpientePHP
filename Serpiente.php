<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Serpiente
 *
 * @author isra9
 */
class Serpiente {

    //ATRIBUTOS
    private $anillas;
    private $estoyViva;
    private $edad;

    //CONSTRUCTOR
    function __construct() {
        $this->anillas = $this->crecer();
        $this->edad = 0;
        $this->estoyViva = true;
    }

    //GET & SET
    function getAnillas() {
        return $this->anillas;
    }

    function isEstoyViva() {
        return $this->estoyViva;
    }

    function getEdad() {
        return $this->edad;
    }

    function setAnillas($anillas): void {
        $this->anillas = $anillas;
    }

    function setEstoyViva($estoyViva): void {
        $this->estoyViva = $estoyViva;
    }

    function setEdad($edad): void {
        $this->edad = $edad;
    }

    //FUNCIONES DE SERPIENTE
    private function muda() {
        $this->edad++;
        for ($i = 0; $i < count($this->anillas); $i++) {
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
            $this->anillas[$i] = $color;
        }
    }

    private function crecer() {
        $this->edad++;
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
        $this->anillas[] = $color;
        return $this->anillas;
    }

    private function disminuir() {
        if (count($this->anillas) == 1) {
            $this->estoyViva = false;
            echo 'muere la serpiente de vieja'.'<br>';
        } else {
            $this->edad++;
            array_pop($this->anillas);
        }
    }

    public function vivir() {

        $mangosta = random_int(1, 100);
        $prob = random_int(1, 100);
        if ($mangosta > 90) {//MUERE A MANOS DE TENACITAS
            $this->estoyViva = false;
            echo 'muere la serpiente, a manos de TENACITAS'.'<br>';
        } else { //VIVE
            if ($this->edad <= 10) {
                if ($prob < 71) {
                    $this->crecer();
                } else {
                    $this->muda();
                }
            } else {
                if ($prob < 81) { //Disminuir anillas
                    $this->disminuir();
                } else {
                     $this->muda();
                }
            }
        }
        return $this->estoyViva;
    }
}
