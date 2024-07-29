<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ami extends Model
{
    use HasFactory;

    protected $table = 'amis';

    protected $fillable = [
        'idMembre1', 'idMembre2', 'DateHeureDemande', 'DateHeureAcceptation'
    ];
}
