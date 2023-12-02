<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNEXION</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Contenu de ta vue ici -->
    <div class="contactez-nous">
        <h1>Connexion</h1>
        <form action="{{route('connexion')}}" method="POST">
        @csrf
        <div>
        <label for="email">Votre e-mail</label>
        <input type="email" id="email" name="email" >
        </div>

            <div>
            <label for="password">Votre mot de passe</label>
            <input type="password" id="password" name="password"  >
            </div>
            <a style="text-align: center" href="inscription">j'ai pas de compte !</a>
        <div>
        <button type="submit">Connexion</button>
        </div>
        </form>
        </div>

</body>
</html>
