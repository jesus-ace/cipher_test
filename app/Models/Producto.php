<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\Divisa;
use App\Models\Precioproducto;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'name',
        'description',
        'price',
        'currency_id',
        'tax_cost',
        'manufacturing_cost'
    ];
    public static function create($data){
        try {
            $saveproduct = new Producto;
        
            $saveproduct->name = $data->name;
            $saveproduct->description = $data->description;
            $saveproduct->price = $data->price;
            $saveproduct->currency_id = $data->currency_id;
            $saveproduct->tax_cost = $data->tax_cost;
            $saveproduct->manufacturing_cost = $data->manufacturing_cost;
            $saveproduct->save();

            $priductoid = $saveproduct->id;

            foreach ($data->divisas as $key => $value) {
                Divisa::saveprices($priductoid, $value);
            }

            
            return "sussefull";
        }catch (\Exception $e) {
            Log::error($e);
        }


    }

    public static function updateproduct($id, $data){
        try {
            $saveproduct = Producto::find($id);
        
            $saveproduct->name = $data->name;
            $saveproduct->description = $data->description;
            $saveproduct->price = $data->price;
            $saveproduct->currency_id = $data->currency_id;
            $saveproduct->tax_cost = $data->tax_cost;
            $saveproduct->manufacturing_cost = $data->manufacturing_cost;
            $saveproduct->save();
            
            return "sussefull";
        }catch (\Exception $e) {
            Log::error($e);
        }


    }
}
