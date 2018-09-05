<?php require_once('includes/header.php'); ?>

<?php  // echo $_SESSION['login']; //TODO Gerer le variable de Session ?> 
<h1> Admin DashBoard </h1>
<div id='control_user_panel'>
    <h2>Utilisateur</h2>
    <button id='show_users' class="btn btn-default"> Voir les utilisateurs </button>
    <!-- <button id='set_users'> Modifier les utilisateurs</button> -->
</div>

<div id='control_conference_panel'>
    <h2>Conférences</h2>
    <button id='show_conference' class="btn btn-default"> Voir les conférences </button>
    <button id='create_conference' class="btn btn-default"> Créer une conférences </button>
    <button id='set_conference' class="btn btn-default"> Modifier les conférences</button>
    
</div>
<div id='control_publication_panel'>
    <h2>Publications</h2>
    <button id='show_publication' class="btn btn-default"> Voir les publications </button>
    <button id='set_publication' class="btn btn-default"> Modifier les publication </button>
</div>

<div id='affichage'> </div>

<div id='creation_conference'>
    <h1>Creation of Conference</h1>
    <label class="control-label" for="name_conference">Name of the conference :</label>
    <input type='text' class="form-control" id="name_conference">

    <label class="control-label" for="city_conference"> city of the conference : </label>
    <input type='text' class="form-control" id="city_conference">

    <label class="control-label" for="countrie_conference"> countrie of the conference :  </label>
    <input type='text' class="form-control" id="countrie_conference">

    <label class="control-label" for="place_maxi_conference">Places for the conference : </label> 
    <input type='number' class="form-control" id="place_maxi_conference">

    <button id="bouton_create_conference" class="btn btn-primary">Sign UP</button>
</div>



<script type='text/javascript'>			
$(function (){
    
    $('#creation_conference').hide();
    $('#show_users').click(function(){
    $('#affichage').show();
    $('#creation_conference').hide();
    var action = 3;
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
                    affichage += "<th > ID </th>";
                    affichage += "<th> Email </th>";
                    affichage += "<th> Type visite </th>";
                    affichage += "</tr>";
                    affichage +="</thead>";
                    affichage += "<tbody>";

                    for (var user in datar) {

                    affichage += "<tr>";
                    affichage += "<td> "+ datar[user].id_user+" </td>";
                    affichage += "<td> "+ datar[user].login+" </td>";
                    affichage += "<td> "+ datar[user].type_visite+" </td>";
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

    $('#show_conference').click(function(){
        $('#affichage').show();
        $('#creation_conference').hide();
        var action=4;
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
                                
                        affichage += "<tr>";
                        affichage += "<td> "+ datar[conference].id_conference+" </td>";
                        affichage += "<td> "+ datar[conference].name+" </td>";
                        affichage += "<td> "+ datar[conference].city+" </td>";
                        affichage += "<td> "+ datar[conference].countries+" </td>";
                        affichage += "<td> "+ datar[conference].place_maxi+" </td>";
                        affichage += "<td> "+ datar[conference].place_dispo+" </td>";
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
    $('#create_conference').click(function(){

        $('#affichage').hide();
        $('#creation_conference').show();
        
    });
    $('#bouton_create_conference').click(function(){
        var name_conference =$('#name_conference').val();
        var city_conference =$('#city_conference').val();
        var countrie_conference =$('#countrie_conference').val();
        var place_maxi_conference =$('#place_maxi_conference').val();

        var action=5;
        $.ajax({
                url:'includes/function.php',
                method: 'POST',
                dataType: 'json',
                data:{action:action,name_conference,city_conference,countrie_conference,place_maxi_conference},
                success:function(datar){
                    if(datar){
                        $( "#show_conference" ).trigger( "click" );
                    }
                },
                error:function(datar){
                    console.log("Erreur interne au serveur  veuillez Contacter L administrateur");
                }
            });

    });
    $('#set_conference').click(function(){

        var action=4;
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
                                
                        affichage += "<tr>";
                        affichage += "<td> "+ datar[conference].id_conference+" </td>";
                        affichage += "<td> <input type='text' value='"+ datar[conference].name+"' id='name_"+datar[conference].id_conference+"'> </td>";
                        affichage += "<td> <input type='text' value='"+ datar[conference].city+"' id='city_"+datar[conference].id_conference+"'> </td>";
                        affichage += "<td> <input type='text' value='"+ datar[conference].countries+"' id='countries_"+datar[conference].id_conference+"'> </td>";
                        affichage += "<td> <input type='text' value='"+ datar[conference].place_maxi+"' id='place_maxi_"+datar[conference].id_conference+"'> </td>";
                        affichage += "<td> <input type='text' value='"+ datar[conference].place_dispo+"' id='place_dispo_"+datar[conference].id_conference+"'> </td>";
                        affichage += "<td> <button class='update_conference'> Update </button> </td>";
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
    $( "body" ).on( "click", ".update_conference", function(){
        var id_conference = $(this).parent().parent();
        var id_conference = $(this).parent().parent();
    });
    
    $('#show_publication').click(function(){
        alert('En cours de Developpement');
    });
    $('#set_publication').click(function(){
        alert('En cours de Developpement');
    });
});
</script>
<br>
<?php require_once('includes/footer.php'); ?>