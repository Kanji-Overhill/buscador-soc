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
        $locations = UserAsesores::all();
        foreach ($locations as $key => $value) {
            if(!empty($value['lng']) && !empty($value['lat'])){
                $data['locations'][] = [$value['name'],$value['lat'],$value['lng']];
            }
        }
        $data['locations'] = json_encode($data['locations']);
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

        $micrositios = UserAsesores::when(!empty($data['state']), function ($query) use($data){
            return $query->where('direccion','like', '%'.$data['state'].'%');
        })
            ->when (!empty($data['municipio']) , function ($query) use($data){
            return $query->where('direccion','like' ,'%'.$data['municipio'].'%');
        })
            ->when (!empty($data['products']) , function ($query) use($data){
            return $query->where('products','like' ,'%'.$data['products'].'%');
        })
        ->get();

        if(!empty($micrositios)){
            foreach ($micrositios as $key => $value) {
                if($value['certificacion'] == 'diamante'){
                    $data['micrositios'][] = $value;
                }
            }

            foreach ($micrositios as $key => $value) {
                if($value['certificacion'] == 'oro'){
                    $data['micrositios'][] = $value;
                }
            }

            foreach ($micrositios as $key => $value) {
                if($value['certificacion'] == 'plata'){
                    $data['micrositios'][] = $value;
                }
            }

            foreach ($micrositios as $key => $value) {
                if($value['certificacion'] == '0' || empty($value['certificacion'])){
                    $data['micrositios'][] = $value;
                }
            }
        }
        // return $micrositios;
        return view('offices_results',$data);
    }
}
