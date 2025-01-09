<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Precioproducto extends Model
{
    protected $table = 'precios_productos';
    protected $fillable = [
        'product_id',
        'currency_id',
    ];

    public static function saveproduct($id_priduc, $currency_id){
        $saveproduct = new Precioproducto;
        $saveproduct->product_id = $id_priduc;
        $saveproduct->currency_id = $currency_id;
        $saveproduct->save();
    }
}
