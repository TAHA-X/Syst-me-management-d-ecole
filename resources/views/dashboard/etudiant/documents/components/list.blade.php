
@foreach ($documents as $document)
    <tr>
        <td>{{$document->type_document->title}}</td>
        <td style="display:flex; align-items:center; gap:5px;"><i style="font-size:26px;" class="bi bi-file-earmark-pdf-fill text-danger"></i>{{ $document->title }}</td>
        <td>{{ $document->etudiant->name }}</td>
        <td>{{ $document->created_at }}</td>
        <td>
            @if($document->id_etudiant==auth()->user()->id)
               <a class="btn btn-success"  href="{{route('etudiant.documents.dowload',$document->id)}}"><i class="bi bi-cloud-download"></i></a>                
               <a class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer ce document ?')" href="{{route('etudiant.documents.delete',$document->id)}}"><i class="bi bi-trash3-fill"></i></a>                
            @else
               <a class="btn btn-success"  href="{{route('etudiant.documents.dowload',$document->id)}}"><i class="bi bi-cloud-download"></i></a>                
            @endif
        </td>
    </tr>
@endforeach
