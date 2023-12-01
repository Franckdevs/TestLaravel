<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark">

        <div class="container-fluid">
          <!-- Links -->
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="#">Project</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="cars">Enregistrer une voiture</a>
            </li>

          </ul>
        </div>
      
      </nav>



<div class="container mt-3">
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
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->role }}</td>
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
                Open modal
            </button>
        </td>
        
        </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Affichage de la pagination -->
  <!-- Affichage de la pagination avec Bootstrap -->
<div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>

</div>


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <p>{{$user->id}}</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('modification') }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <label for="name">Nom prénom</label>
                    <input type="text" id="name" name="name" required value="{{ $user->name }}">
                </div>

                <div>
                    <label for="email">Adresse Email</label>
                    <input type="email" id="email" name="email" required value="{{ $user->email }}">
                </div>

                <!-- Ajoute d'autres champs à modifier si nécessaire -->

                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>


  

</body>
</html>
