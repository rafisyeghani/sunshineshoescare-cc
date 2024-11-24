<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'stock', 'picture'];

    // Menghubungkan dengan model Transaction
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // Metode untuk mengurangi stok
    public function reduceStock($quantity)
    {
        // Pastikan stok tidak negatif
        if ($this->stock >= $quantity) {
            $this->stock -= $quantity;
            $this->save();
        } else {
            // Tangani kasus di mana stok tidak mencukupi
            throw new \Exception('Stok tidak mencukupi');
        }
    }
}
