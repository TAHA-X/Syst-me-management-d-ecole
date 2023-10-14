
@if(auth()->user()->type==1)
<!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link">
            <i class="bi bi-person"></i>
            <span>Admin</span></a>
    </li>

    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#etudiants"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-people"></i>
            <span>etudiants</span>
        </a>
        <div id="etudiants" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{Route('admin.etudiants.index')}}">Afficher</a>
                <a class="collapse-item" href="{{Route('admin.etudiants.create')}}">Ajouter</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#demandes"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-people"></i>
            <span>demandes</span>
        </a>
        <div id="demandes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{Route('admin.demandes.index')}}">Afficher</a>
            </div>
        </div>
    </li>
@else
    <li class="nav-item active">
        <a class="nav-link">
            <i class="bi bi-person"></i>
            <span>Etudiant</span></a>
    </li>


    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-people"></i>
            <span>documents</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{Route('etudiant.documents.index')}}">Afficher</a>
                <a class="collapse-item" href="{{Route('etudiant.documents.create')}}">Ajouter</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#demandes"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-people"></i>
            <span>mes demandes</span>
        </a>
        <div id="demandes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{Route('etudiant.demandes.index')}}">Afficher</a>
                <a class="collapse-item" href="{{Route('etudiant.demandes.create')}}">Ajouter</a>
            </div>
        </div>
    </li>
@endif

