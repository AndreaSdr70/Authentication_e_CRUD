<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Questa proprietà defnisce i campi del mio modello
    protected $fillable = [
        'name',
        'description',
        'price',
        'img',
        'user_id'
    ];

    /**
     * Get the user  that owns the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class);// Questo metodo ci indica che quando richiamo il metodo user ci ritora l'utente collegato al prodotto
    }




}
