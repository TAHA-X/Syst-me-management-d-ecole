
@foreach ($demandes as $demande)
    <tr>
        <td>{{ $demande->certificat->title }}</td>
        <td>{{ $demande->created_at }}</td>
        <td>
            @if($demande->status==1)
               <div class="badge badge-primary">en cours</div>  
            @elseif ($demande->status==2)    
                <div class="badge badge-success">realisé</div>  
                <a class="btn btn-success"  href="{{route('etudiant.demande.download',$demande->id)}}"><i class="bi bi-cloud-download"></i></a>                
            @else
                <div class="badge badge-danger">refusé</div>  
            @endif
        </td>
    </tr>
@endforeach
