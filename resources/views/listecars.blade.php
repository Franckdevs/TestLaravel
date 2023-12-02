<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    

    <div class="container mt-3">
        <h2>Striped Rows</h2>
        <button onclick="window.location.href='inscription'" class="btn btn-primary">+</button>
      
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nom prénom</th>
              <th>Adresse Email</th>
              <th>Role</th>
              <th>Date de création</th>
              <th>Date de connexion</th>
              <th>Supprimer</th>
              <th>Modifier</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cars as $user)
              <tr>
                <td>{{ $user->matricule }}</td>
                <td>{{ $user->marque }}</td>
                <td>{{ $user->couleur }}</td>
                <td>{{ $user->annee }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                  <form action="{{ route('supprimer',$user->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">
                          Supprimer
                      </button>
                  </form>
              </td>
               
              <td>
                  <button type="submite" class="btn btn-primary btn-open-modal" data-bs-toggle="modal" data-bs-target="#myModal"  href="{{ route('utilisateur',$user->id) }}">
                     Modifier
                  </button>
              </td>
              
              </tr>
            @endforeach
          </tbody>
        </table>
      
        <!-- Affichage de la pagination -->
        <!-- Affichage de la pagination avec Bootstrap -->
      <div class="d-flex justify-content-center">
          {{ $cars->links() }}
      </div>
      
      </div>
      

</body>
</html>