<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Membre extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'idMembre';

    protected $fillable = [
        'Email', 'Motdepasse', 'Nom', 'DateNaissance'
    ];

    protected $hidden = [
        'Motdepasse', 'remember_token'
    ];

    public function amis()
    {
        return $this->belongsToMany(Membre::class, 'amis', 'idMembre1', 'idMembre2')->withPivot('DateHeureDemande', 'DateHeureAcceptation')->withTimestamps();
    }

    public function publications()
    {
        return $this->hasMany(Publication::class, 'idMembre', 'idMembre');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'idMembre', 'idMembre');
    }
}

