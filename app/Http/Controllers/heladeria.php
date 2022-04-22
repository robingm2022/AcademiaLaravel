<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class heladeria extends Controller{

    public function cubierta_helados($helado){

        if ($helado == 1){
            echo 'El helado seleccionado es de => Chocolate';
        }
        else if ($helado == 2){
            echo 'El helado seleccionado es de => Brownie';
        }
        else if ($helado == 3){
            echo 'El helado seleccionado es de => Delicatessen';
        }
        else{
            echo 'El helado seleccionado no existe';
        }
    }
}
