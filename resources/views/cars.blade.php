<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer une voiture</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
   
    <!-- Contenu de ta vue ici -->
    <div class="contactez-nous">
        <h1>Enregistrer une voiture</h1>
        <form action="{{ route('registert') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="photo1">Image 1</label>
            <input type="file" id="photo1" name="photo1">
           
        </div>

        <div>
            <label for="photo2">Image 2</label>
            <input type="file" id="photo2" name="photo2">
           
        </div>

        <div>
            <label for="photo3">Image 3</label>
            <input type="file" id="photo3" name="photo3">
          
        </div>

        <div>
            <label for="photo4">Image 4</label>
            <input type="file" id="photo4" name="photo4">
           
        </div>

        <div>
            <label for="matricule">Votre matricule</label>
            <input type="text" id="matricule" name="matricule" >
            @error('matricule')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="marque">Votre marque</label>
            <input type="text" id="marque" name="marque" >
            @error('marque')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="kilometrage">Votre kilometrage</label>
            <input type="text" id="kilometrage" name="kilometrage"  >
            @error('kilometrage')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="annee">Votre annee</label>
            <input type="text" id="annee" name="annee">
            @error('annee')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="couleur">Votre couleur</label>
            <input type="text" id="couleur" name="couleur">
            @error('couleur')
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
    
        <div>
            <button type="submit">Enregistrement</button>
        </div>
        
        </form>
    </div>
       
</body>
</html>

