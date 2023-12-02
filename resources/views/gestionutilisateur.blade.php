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

        @if(isset($users))
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
                    <form action="{{ route('supprimer', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Supprimer
                        </button>
                    </form>
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary btn-open-modal" data-bs-toggle="modal" data-bs-target="#myModal"  href="{{ route('utilisateur', $user->id) }}">
                        Open modal
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        
          <!-- Affichage de la pagination -->
          {{ $users->links() }}
        @else
            <p>Aucun utilisateur trouvé.</p>
        @endif
    </div>
</body>
</html>
