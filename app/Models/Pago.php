<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'amount', 'status', 'empresa_id', 'user_id', 'month', 'year'];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function empresas(){
        return $this->hasMany(Empresa::class);
    }
}
