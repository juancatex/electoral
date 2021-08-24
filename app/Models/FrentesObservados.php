<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrentesObservados extends Model
{
    use HasFactory;
    protected $primaryKey = 'idobs';
    protected $table = 'frentes_observados'; 
}
