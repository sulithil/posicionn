<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id'];

    public function cuenta()
    {
        $this->belongsTo(Cuenta::class);
    }
    public function diferido()
    {
        $this->belongsTo(Diferido::class);
    }
    public function cuentaporpagar()
    {
        $this->belongsTo(CuentasPorPagar::class);
    }
    public function cuentaporcobrar()
    {
        $this->belongsTo(CuentasPorCobrar::class);
    }
}
