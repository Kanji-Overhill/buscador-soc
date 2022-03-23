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
    public function getAll(Request $request){
        $asesores = UserAsesores::all();
        return $asesores;
    }

    public function searchAsesores(Request $request) {
        $name = $request->name;
        $state = $request->state;
        $products = $request->products;
        if(!empty($name) ||
           !empty($state) ||
           !empty($products)){

            $micrositios['asesores'] = UserAsesores::when(!empty($name), function ($query) use($name){
                return $query->where('name','like', '%'.$name.'%');
            })
                ->when (!empty($state) , function ($query) use($state){
                return $query->where('direccion','like' ,'%'.$state.'%');
            })
                ->when (!empty($products) , function ($query) use($products){
                return $query->where('producto_1','like' ,'%'.$products.'%');
            })
            ->get();
        } else{
            $micrositios['asesores'] = [];
        }

        if(count($micrositios['asesores']) < 1){
            $micrositios['suggest'] = UserAsesores::when(!empty($name), function ($query) use($name){
                $keywords = explode(' ',$name);
                $keywords = ['creditos', 'asesores', 'puebla'];
                foreach($keywords as $keyword) {
                    $query->orwhere('name', 'like', '%'.$keyword.'%');
                }
                // return $query->whereIn('name',$array_names);
            })
                ->when (!empty($state) , function ($query) use($state){
                return $query->orwhere('direccion','like' ,'%'.$state.'%');
            })
                ->when (!empty($products) , function ($query) use($products){
                return $query->orwhere('producto_1','like' ,'%'.$products.'%');
            })
            ->limit(5)
            ->get();
        }

        return json_encode($micrositios);
    }
}
