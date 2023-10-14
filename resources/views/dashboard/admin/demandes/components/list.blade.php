
@foreach ($demandes as $demande)
    <tr>
        <td>{{ $demande->etudiant->name }}</td>
        <td>{{ $demande->certificat->title }}</td>
        <td>
                @if($demande->status==1)
                    <div class="badge badge-primary">en cours</div>  
                @elseif ($demande->status==2)    
                    <div class="badge badge-success">realisé</div>  
                @else
                    <div class="badge badge-danger">refusé</div>  
                @endif
        </td>
        <td>{{ $demande->created_at }}</td>
        <td>
            @if($demande->status!=1)
               <a class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer ce demande ?')" href="{{route('admin.demandes.delete',$demande->id)}}"><i class="bi bi-trash3-fill"></i></a>                
            @else
            <a class="btn btn-danger" onclick="return confirm('voulez vous vraiment refuser ce demande ?')" href="{{route('admin.demandes.refuser',$demande->id)}}">refusé</a>
            <a class="btn btn-primary"  href="{{route('admin.demandes.accepter',$demande->id)}}">realisé</a>
            @endif
        </td>
    </tr>
@endforeach
