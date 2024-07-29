<?php

<form action="{{ route('login') }}" method="post">
    @csrf
    <input type="email" name="Email" placeholder="Email" required>
    <input type="password" name="Motdepasse" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>
