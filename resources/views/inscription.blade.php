<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
   
    <!-- Contenu de ta vue ici -->
    <div class="contactez-nous">
        <h1>Inscrivez-vous</h1>
        <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="profile_picture">Image de profil</label>
            <input type="file" id="profile_picture" name="profile_picture">
        </div>

        <div>
        <label for="name">Votre nom</label>
        <input type="text" id="name" name="name" >
        </div>

        <div>
        <label for="email">Votre e-mail</label>
        <input type="email" id="email" name="email" >
        </div>

            <div>
            <label for="password">Votre mot de passe</label>
            <input type="password" id="password" name="password"  >
            </div>

            <a style="text-align: center" href="connexion">j'ai deja un compte !</a>
            
        <div>
        <button type="submit">Inscription</button>
        </div>
        
        </form>
        </div>
        

       
</body>
</html>
