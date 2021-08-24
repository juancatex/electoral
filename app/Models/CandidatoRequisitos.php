<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatoRequisitos extends Model
{
    use HasFactory;
    protected $primaryKey = 'idcanreq';
    protected $table = 'candidato_requisitos'; 
}
