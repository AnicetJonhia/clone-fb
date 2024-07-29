<?php


@foreach($publications as $publication)
    <div>
        <p>{{ $publication->TextePublication }}</p>
        <p>{{ $publication->DateHeurePublication }}</p>
        <form action="{{ route('publications.comment', $publication->idPublication) }}" method="post">
            @csrf
            <input type="text" name="TexteCommentaire" placeholder="Votre commentaire" required>
            <button type="submit">Commenter</button>
        </form>
    </div>
@endforeach
