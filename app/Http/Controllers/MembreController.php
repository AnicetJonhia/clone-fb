<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
use App\Models\Ami;

class MembreController extends Controller
{
    public function index()
    {
        $membres = Membre::all();
        return view('membres.index', compact('membres'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $membres = Membre::where('Nom', 'LIKE', "%$query%")->get();
        return view('membres.search', compact('membres'));
    }

    public function sendFriendRequest($id)
    {
        $ami = Ami::create([
            'idMembre1' => auth()->user()->idMembre,
            'idMembre2' => $id,
            'DateHeureDemande' => now(),
        ]);

        return back()->with('success', 'Demande d\'ami envoyée.');
    }

    public function acceptFriendRequest($id)
    {
        $ami = Ami::where('idMembre1', $id)->where('idMembre2', auth()->user()->idMembre)->first();
        $ami->update(['DateHeureAcceptation' => now()]);

        return back()->with('success', 'Demande d\'ami acceptée.');
    }
}

