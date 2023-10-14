<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($certificat->type=1)
        <img src="{{ public_path('assets/img/ens.png') }}">
        
        <h2>{{$certificat->title}}</h2>

        <span>{{$date}}</span>
        <br>
        <p>
            Nous soussignés, ENS Rabat, certifions par la présente que <strong>{{$etudiant->name}}</strong> ,  est actuellement inscrit(e) en tant qu'étudiant(e) régulier(ère) au sein de notre établissement.
        </p>
    @elseif($certificat->type=2)
        <img src="{{ public_path('assets/img/ens.png') }}">
            
        <h2>{{$certificat->title}}</h2>

        <span>{{$date}}</span>
        <br>
        <p>
            Nous soussignés, ENS Rabat, certifions par la présente que <strong>{{$etudiant->name}}</strong> ,  est actuellement peut passer un stage dans une société au marché de taravil aprés q'il a passé 2 ans de l'enseignement ......
        </p>
    @else
        <img src="{{ public_path('assets/img/ens.png') }}">
                
        <h2>{{$certificat->title}}</h2>

        <span>{{$date}}</span>
        <br>
        <p>
            Attestation de réussite
        </p>
    @endif
   
  
    
</body>
</html>