<?php


<form action="{{ route('register') }}" method="post">
    @csrf
    <input type="email" name="Email" placeholder="Email" required>
    <input type="password" name="Motdepasse" placeholder="Mot de passe" required>
    <input type="text" name="Nom" placeholder="Nom" required>
    <input type="date" name="DateNaissance" placeholder="Date de Naissance" required>
    <button type="submit">S'inscrire</button>
</form>


?=>
