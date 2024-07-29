<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Commentaire;

class PublicationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'TextePublication' => 'required|string',
            'TypeAffichage' => 'required|in:public,amis',
        ]);

        $publication = Publication::create([
            'idMembre' => auth()->user()->idMembre,
            'DateHeurePublication' => now(),
            'TextePublication' => $request->TextePublication,
            'TypeAffichage' => $request->TypeAffichage,
        ]);

        return back()->with('success', 'Publication postée.');
    }

    public function comment(Request $request, $id)
    {
        $request->validate([
            'TexteCommentaire' => 'required|string',
        ]);

        $commentaire = Commentaire::create([
            'idPublication' => $id,
            'idMembre' => auth()->user()->idMembre,
            'DateHeureCommentaires' => now(),
            'TexteCommentaire' => $request->TexteCommentaire,
        ]);

        return back()->with('success', 'Commentaire posté.');
    }

    public function index()
    {
        $publications = Publication::where('idMembre', auth()->user()->idMembre)
            ->orWhereHas('membre.amis', function($query) {
                $query->where('idMembre1', auth()->user()->idMembre)
                    ->orWhere('idMembre2', auth()->user()->idMembre);
            })
            ->orderBy('DateHeurePublication', 'desc')
            ->get();

        return view('publications.index', compact('publications'));
    }
}

