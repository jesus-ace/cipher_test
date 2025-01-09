<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\Precioproducto;

class Divisa extends Model
{
    protected $table = 'divisas';
    protected $fillable = [
        'name',
        'symbol',
        'exchange_rate',
    ];

    public static function saveprices($id_produc, $data){
        try {
            $saveDivisa = new Divisa;
            $saveDivisa->name = $data["name"];
            $saveDivisa->symbol = $data["symbol"];
            $saveDivisa->exchange_rate = $data["exchange_rate"];
            $saveDivisa->save();
            Precioproducto::saveproduct($id_produc, $saveDivisa->id);
        } catch (\Exception $e) {
            Log::error($e);
        }
       

        
    }
}
