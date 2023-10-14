
@foreach ($etudiants as $etudiant)
    <tr>
        <td>{{ $etudiant->name }}</td>
        <td>{{ $etudiant->email}}</td>
        <td>{{ count($etudiant->documents) }}</td>
        <td>{{ $etudiant->created_at }}</td>
        <td>
            <a class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer cet etudiant ?')" href="{{route('admin.etudiants.delete',$etudiant->id)}}"><i class="bi bi-trash3-fill"></i></a>
            <a class="btn btn-primary"  href="{{route('admin.etudiants.edit',$etudiant->id)}}"><i class="bi bi-pen"></i></a>
        </td>
    </tr>
@endforeach
