<?php require_once('includes/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="content col-lg-9">
         
            <h1> My account </h1>
            <div id="control_my_account">
                <button id="sign_up_conference" class="btn btn-default">Sign up for a conference </button>
                <button id="history_conference" class="btn btn-default">History conference</button>
                <div id='affichage'></div>
            </div>
        </div>
        <div class="col-lg-3">
            <h1 class="text-center">PARTNERS</h1>
            <img class="img-partner" src="https://img.generation-nt.com/logo-ieee_0901F4026C00045324.jpg">
            <img class="img-partner" src="https://pbs.twimg.com/profile_images/1359430953/EurasipSmall_400x400.png">
            <img class="img-partner" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/c4509f13712953.5627729823905.jpg">
        </div>
    </div>
</div>
    
<?php

//var_dump($_SESSION); 
$url = $_SERVER['SCRIPT_FILENAME'];

 //TODO :  DYNAMISER L URL ?> 

<script type='text/javascript'>		
    $(function (){

        $("#sign_up_conference").click(function(){
            var action = 6;

            $.ajax({
                    url:'includes/function.php',
                    method: 'POST',
                    dataType: 'json',
                    data:{action:action},
                    success:function(datar){
                        if(datar){

                    var affichage = "<table class=table table-striped table-hover>";
                        affichage += "<thead>";
                        affichage += "<tr>";
                        affichage += "<th > ID conference </th>";
                        affichage += "<th> Name  </th>";
                        affichage += "<th> city </th>";
                        affichage += "<th> countries </th>";
                        affichage += "<th> place Maxi </th>";
                        affichage += "<th> place dispo </th>";
                        affichage += "</tr>";
                        affichage +="</thead>";
                        affichage += "<tbody>";

                            for (var conference in datar) {
                                
                        affichage += "<tr id='"+datar[conference].id_conference+"'>";
                        affichage += "<td> "+ datar[conference].id_conference+" </td>";
                        affichage += "<td> "+ datar[conference].name+" </td>";
                        affichage += "<td> "+ datar[conference].city+" </td>";
                        affichage += "<td> "+ datar[conference].countries+" </td>";
                        affichage += "<td> "+ datar[conference].place_dispo+" </td>";
                        affichage += "<td> <button class='bouton_sign_up'> Sign up </button> </td>";

                        affichage += "<tr>";
                    }

                    affichage += "</tbody>";
                        affichage += " </table>";
                        $('#affichage').html(affichage);
                        
                        }
                    },
                    error:function(datar){
                        console.log("Erreur interne au serveur  veuillez Contacter L administrateur");
                    }
                });           
        });
        
        $("#sign_up").click(function(){
            var id_new_user = $("#email_connection").val();
            var pass_new_user = $("#password_connection").val();
            var type_new_user = $("#type_user").val();
            var action = 2;

            if(id_new_user != "" && pass_new_user != "" ){

                $.ajax({
                    url:'includes/function.php',
                    method: 'POST',
                    dataType: 'json',
                    data:{id_new_user:id_new_user,pass_new_user:pass_new_user,type_new_user:type_new_user,action:action},
                    success:function(datar){
                        if(datar){
                            alert(datar);
                        }
                    },
                    error:function(datar){
                        console.log("Erreur interne au serveur  veuillez Contacter L administrateur");
                    }
                });
            }
            else{
                alert("Un des champs ne correspond pas au critere d'inscription ! Pensez à bien  remplir tout les champs")
            }
        }); 

        $( "body" ).on( "click", ".bouton_sign_up", function() {
            var action = 7;
            var id_conference = $(this).parent().parent().attr('id');
            var id_user = 4; //TODO mettre $session
            

            if (confirm("Etes vous sûr de vousinscrire a cette conférence?")){
               
                $.ajax({
                    url:'includes/function.php',
                    method: 'POST',
                    dataType: 'json',
                    data:{action:action,id_conference:id_conference,id_user:id_user},
                    success:function(datar){
                        if(datar){
                            alert('Un email va vous etre envoyé contenant les accès et les modalitées de payement.');
                            $( "#sign_up_conference" ).trigger( "click" );
                        }
                    },
                    error:function(datar){
                        console.log("Erreur interne au serveur  veuillez Contacter L administrateur");
                    }
                });
  
            }
        });  
        $( "#history_conference" ).click(function(){
            // alert("En Cours de developpement");
            var action = 8;
            var id_user = "<?php echo $_SESSION['id_user']; ?>";
            
            $.ajax({
                    url:'includes/function.php',
                    method: 'POST',
                    dataType: 'json',
                    data:{action:action,id_user:id_user},
                    success:function(datar){
                        if(datar.length > 0){
                            var affichage = "<table class=table table-striped table-hover>";
                                affichage += "<thead>";
                                affichage += "<tr>";
                                affichage += "<th> Name  </th>";
                                affichage += "<th> city </th>";
                                affichage += "<th> countries </th>";
                                affichage += "</tr>";
                                affichage +="</thead>";
                                affichage += "<tbody>";
                                for (var participation in datar) {
                                    
                                    affichage += "<td> "+ datar[participation].name+" </td>";
                                    affichage += "<td> "+ datar[participation].city+" </td>";
                                    affichage += "<td> "+ datar[participation].countries+" </td>";
                                }
                                $('#affichage').html(affichage);
                        }
                        else{
                            $('#affichage').html("There is no data.");
                        }
                        
                    },
                    error:function(datar){
                        console.log("Erreur interne au serveur  veuillez Contacter L administrateur");
                    }
                });
        });
});
</script>
        
		
<?php require_once('includes/footer.php'); ?>