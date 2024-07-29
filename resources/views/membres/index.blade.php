<?php

@foreach($membres as $membre)
    <div>
        <p>{{ $membre->Nom }}</p>
        <a href="{{ route('membres.friend-request', $membre->idMembre) }}">Ajouter comme ami</a>
    </div>
@endforeach
