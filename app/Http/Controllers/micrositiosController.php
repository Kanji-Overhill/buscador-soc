<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserAsesores;
use App\Models\Fotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class micrositiosController extends Controller
{
    public function getAll($url){
        $micrositios = UserAsesores::all();
        return $micrositios;
    }
    public function search(){
        $state = $request->state;
        $municipio = $request->municipio;
        $products = $request->products;
        $micrositios = UserAsesores::->where('direccion', 'LIKE', "%{$state}%")->orWhere('direccion', 'LIKE', "%{$municipio}%")->orWhere('productos', 'LIKE', "%{$products}%")->get();
        return $micrositios;
    }
}
