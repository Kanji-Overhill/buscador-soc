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
                $icons = [
                    'diamante' => 'icon-diamante.png',
                    'oro' => 'icon-oro.png',
                    'plata' => 'icon-plata.png',
                ];
                $data['locations'][] = [$value['name'],$value['lat'],$value['lng'],isset($icons[strtolower($value['certificacion'])]) ? $icons[strtolower($value['certificacion'])] : 'icon-soc.png'];
            }
        }
        $data['locations'] = json_encode($data['locations']);
        $data['states'] = [
            "Aguascalientes"=>"Aguascalientes","Baja California"=>"Baja California","Baja California Sur"=>"Baja California Sur","Campeche"=>"Campeche","Chiapas"=>"Chiapas","Chihuahua"=>"Chihuahua","Ciudad de Mexico"=>"Ciudad de México","Coahuila"=>"Coahuila","Colima"=>"Colima","Durango"=>"Durango ","Estado de Mexico"=>"Estado de México","Guanajuato"=>"Guanajuato","Guerrero"=>"Guerrero","Hidalgo"=>"Hidalgo","Jalisco"=>"Jalisco","Michoacan"=>"Michoacán","Morelos"=>"Morelos","Nayarit"=>"Nayarit","Nuevo Leon"=>"Nuevo León","Oaxaca"=>"Oaxaca","Puebla"=>"Puebla","Queretaro"=>"Querétaro","Quintana Roo"=>"Quintana Roo","San Luis Potosi"=>"San Luis Potosí","Sinaloa"=>"Sinaloa","Sonora"=>"Sonora","Tabasco"=>"Tabasco","Tamaulipas"=>"Tamaulipas","Tlaxcala"=>"Tlaxcala","Veracruz"=>"Veracruz","Yucatan"=>"Yucatán","Zacatecas"=>"Zacatecas"];
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

        $data['micrositios'] = [];

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
        $data['states'] = [
            "Aguascalientes"=>"Aguascalientes","Baja California"=>"Baja California","Baja California Sur"=>"Baja California Sur","Campeche"=>"Campeche","Chiapas"=>"Chiapas","Chihuahua"=>"Chihuahua","Ciudad de Mexico"=>"Ciudad de México","Coahuila"=>"Coahuila","Colima"=>"Colima","Durango"=>"Durango ","Estado de Mexico"=>"Estado de México","Guanajuato"=>"Guanajuato","Guerrero"=>"Guerrero","Hidalgo"=>"Hidalgo","Jalisco"=>"Jalisco","Michoacan"=>"Michoacán","Morelos"=>"Morelos","Nayarit"=>"Nayarit","Nuevo Leon"=>"Nuevo León","Oaxaca"=>"Oaxaca","Puebla"=>"Puebla","Queretaro"=>"Querétaro","Quintana Roo"=>"Quintana Roo","San Luis Potosi"=>"San Luis Potosí","Sinaloa"=>"Sinaloa","Sonora"=>"Sonora","Tabasco"=>"Tabasco","Tamaulipas"=>"Tamaulipas","Tlaxcala"=>"Tlaxcala","Veracruz"=>"Veracruz","Yucatan"=>"Yucatán","Zacatecas"=>"Zacatecas"];

        return view('offices_results',$data);
    }
}
