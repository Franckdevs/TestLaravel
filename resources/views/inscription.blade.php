<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Contenu de ta vue ici -->
    <div class="contactez-nous">
        <h1>Inscrivez-vous</h1>
        <form action="{{ route('registers') }}" method="POST" enctype="multipart/form-data">
            @csrf
        {{-- <p>{{dd($errors)}}</p> --}}
        <div>
            <label for="profile_picture">Image de profil</label>
            <input type="file" id="profile_picture" name="profile_picture">
            @error('profile_picture')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        
        <div>
            <label for="name">Votre nom</label>
            <input type="text" id="name" name="name">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        
        <div>
            <label for="email">Votre e-mail</label>
            <input type="email" id="email" name="email">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        
        <div>
            <label for="password">Votre mot de passe</label>
            <input type="password" id="password" name="password">
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <a style="text-align: center" href="connexion">j'ai deja un compte !</a>

        <div>
        <button type="submit">Inscription</button>
        </div>

        </form>
        </div>
        

       
</body>
</html>
