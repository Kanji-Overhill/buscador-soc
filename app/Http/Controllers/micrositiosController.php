<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserAsesores;
use App\Models\Fotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use URL;

class micrositiosController extends Controller
{
    public function ubica_oficina()
    {
        $data['locations'] = json_encode([
            ['location','19.4242185','-99.1693262']
        ]);
        return view('offices',$data);
    }

    public function ubica_asesor(Request $request)
    {
        return view('buscador_asesores');
    }

    public function getAll($url){
        $micrositios = UserAsesores::all();
        return $micrositios;
    }
    public function search(Request $request){

        $data['state'] = $request->state;
        $data['municipio'] = $request->city;
        $data['products'] = $request->products;

        $data['micrositios'] = UserAsesores::when(!empty($data['state']), function ($query) use($data){
            return $query->where('direccion','like', '%'.$data['state'].'%');
        })
            ->when (!empty($data['municipio']) , function ($query) use($data){
            return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
        })
            ->when (!empty($data['products']) , function ($query) use($data){
            return $query->where('products','like' ,'%'.$data['products'].'%');
        })
        ->get();
        // return $micrositios;
        return view('offices_results',$data);
    }
}
