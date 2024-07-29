<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $primaryKey = 'idCommentaires';

    protected $fillable = [
        'idPublication', 'idMembre', 'DateHeureCommentaires', 'TexteCommentaire'
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class, 'idPublication', 'idPublication');
    }

    public function membre()
    {
        return $this->belongsTo(Membre::class, 'idMembre', 'idMembre');
    }
}
