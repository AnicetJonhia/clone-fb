<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPublication';

    protected $fillable = [
        'idMembre', 'DateHeurePublication', 'TextePublication', 'TypeAffichage'
    ];

    public function membre()
    {
        return $this->belongsTo(Membre::class, 'idMembre', 'idMembre');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'idPublication', 'idPublication');
    }
}
