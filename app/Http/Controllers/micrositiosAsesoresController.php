<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserAsesores;
use App\Models\Fotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class micrositiosAsesoresController extends Controller
{
    public function getAll($url){
        $asesores = UserAsesores::all();
        return $asesores;
    }
}
