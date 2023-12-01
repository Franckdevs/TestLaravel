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
        <h1>Enregistrer une voiture</h1>
        <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="photo1">Image de profil</label>
            <input type="file" id="photo1" name="photo1">
        </div>

        <div>
            <label for="photo2">Image de profil</label>
            <input type="file" id="photo2" name="photo2">
        </div>

        <div>
            <label for="photo3">Image de profil</label>
            <input type="file" id="photo3" name="photo3">
        </div>

        <div>
            <label for="photo4">Image de profil</label>
            <input type="file" id="photo4" name="photo4">
        </div>

        <div>
        <label for="name">Votre nom</label>
        <input type="text" id="name" name="name" >
        </div>

        <div>
        <label for="marque">Votre marque</label>
        <input type="text" id="marque" name="marque" >
        </div>

            <div>
            <label for="kilometrage">Votre kilometrage</label>
            <input type="text" id="kilometrage" name="kilometrage"  >
            </div>

            <div>
                <label for="annee">Votre annee</label>
                <input type="text" id="annee" name="annee">
                </div>

                <div>
                    <label for="couleur">Votre couleur</label>
                    <input type="text" id="couleur" name="couleur">
                    </div>

        <div>
        <button type="submit">Enregistrement</button>
        </div>
        
        </form>
        </div>
        

       
</body>
</html>

