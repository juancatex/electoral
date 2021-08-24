<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametroVotacion extends Model
{
    use HasFactory;
    protected $primaryKey = 'idvo';
    protected $table = 'parametro_votacions'; 
}
