<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socio extends Model
{
    use HasFactory;
    protected $primaryKey = 'idsocio';
    protected $table = 'socios';
}
