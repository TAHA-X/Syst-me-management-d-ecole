@extends("dashboard")
 
@section("title")
    modifier etudiant
@endsection

@section("title_page")
    modifier etudiant
@endsection

@section("contenu")
<form class="mt-3" action="{{route('admin.etudiants.update',$etudiant->id)}}" method="post">
    @csrf
    @method("put")
    <div>
          <div class="d-flex gap-2">
               <div class="w-50">
                    <label for="name">name :</label>
                    <input value="{{$etudiant->name}}" name="name" id="name" class="form-control" type="text">
               </div>
               <div class="w-50">
                    <label for="email">email :</label>
                    <input value="{{$etudiant->email}}" name="email" id="email" class="form-control" type="text">
               </div>
          </div>
    </div>

   <button class="btn btn-primary mt-2">modifier</button>
</form> 
@endsection



@section("script")
$(document).ready(function() {
      $('#level').on('change', function() {
            var type_div = document.getElementById("type_div");
            var id = $("#level").val();
            $.ajax({
                  url: "{{ url('admin/contrat_type_partenaire') }}" + '/'+id,
                  dataType: 'json',
                  success: function(data) {
                      if(data==3){
                         type_div.style.display = "block";
                         $("#categorie_div").css("display","block");
                         $("#types_points_div").css("display","block");
                      }
                      else{
                         $("#categorie_div").css("display","none");
                         type_div.style.display = "none";
                         detaills_type_contrat.style.display = "none";
                         $("#types_points_div").css("display","none");
                      }

                      if(data==4){
                          $("#partenaire_div").css("display","block");
                      }
                      else{
                         $("#partenaire_div").css("display","none");
                      }
                  },
                  type: 'GET'
            });
      });

      $('#type_div').on('change', function() {
          var type_div = document.getElementById("type_div");
          var id = $("#type_contrat").val();
          var detaills_type_contrat = document.getElementById("detaills_type_contrat");
          $.ajax({
                url: "{{ url('admin/contrat_type_partenaire2') }}" + '/'+id,
                dataType: 'json',
                success: function(data) {
                    if(data){
                         if(id==0){
                              detaills_type_contrat.style.display = "block";
                              $('#id_contrat').empty();
                              $('#id_contrat').append('<option disabled selected>choisir la contrat</option>')
                              for(var i=0; i < data.length;i++){
                                   var periode = data[i].periode;
                                   var montant = data[i].montant;
                                   var contrat_id = data[i].id;                              
                                   $('#id_contrat').append(`<option value=${data[i].id}>${periode} mois | ${montant} dh</option>`);
                              }
                         }
                         else if(id==1){
                              detaills_type_contrat.style.display = "block";
                              $('#id_contrat').empty();
                              $('#id_contrat').append('<option disabled selected>choisir la contrat</option>')
                              for(var i=0; i < data.length;i++){
                                   var commission = data[i].commission;
                                   $('#id_contrat').append(`<option value=${data[i].id}>${commission}</option>`);
                              }
                         }
                         else{
                              detaills_type_contrat.style.display = "none";
                         }

                    } 
                    else{
                         alert("vous avez aucune contrat");
                    }
                },
                type: 'GET'
          });
    });
});
@endsection

