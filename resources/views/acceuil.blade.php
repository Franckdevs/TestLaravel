<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>

       <!-- Contenu de ta vue ici -->
       <div class="contactez-nous">
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Photo de profil" class="mx-auto d-block">

<!-- Formulaire pour supprimer la photo -->
<div class="gb">
    <form action="{{ route('supprimerphoto') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer la photo</button>
    </form>
</div>
        <h1>Modifier un utilisateur </h1>
        <!-- ... -->
<form action="{{route('modification')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="profile_picture">Photo de profil</label>
        <input type="file" id="profile_picture" name="profile_picture">
    </div>
    <div>
        <label for="name">Votre nom</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
    </div>
    <div>
        <label for="email">Votre e-mail</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
    </div>
    <div>
        <label for="password">Votre mot de passe</label>
        <input type="password" id="password" name="password" required>
    </div>
   
    <button type="submit">Modifier</button>
</form>
<!-- ... -->

        </div>

</body>

</html>
