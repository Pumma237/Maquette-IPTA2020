<?php require_once('includes/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="content col-lg-9">
             
            <div class="form-group col-lg-6">
                <h1>LOGIN</h1>
                <label class="control-label" for="inputDefault">Email :</label>
                <input type="text" class="form-control" id="identifiant" name="identifiant">

                <label class="control-label" for="inputDefault">Password :</label>
                <input type="password" class="form-control" id="pass" name="pass">

                <button class="btn btn-primary" id="sign_in">Sign IN</button>
                
            </div>

            <div class="form-group col-lg-6">
                <h1>REGISTRATION</h1>
                <label class="control-label" for="email_connection">Email :</label>
                <input type="mail" class="form-control" id="email_connection" name="email_connection">

                <label class="control-label" for="password_connection">Password :</label>
                <input type="password" class="form-control" id="password_connection" name="password_connection">
            
                <label for="select" class="control-label">You are a :</label>
                <select class="form-control" id="type_user">
                    <option value="student"> Student </option>
                    <option value="professional"> Professional </option>
                    <option value="visitor"> Visitor </option>
                </select>
                <button class="btn btn-primary" id="sign_up">Sign UP</button>
                
            </div>
        </div>
        <div class="col-lg-3">
            <h1 class="text-center">PARTNERS</h1>
            <img class="img-partner" src="https://img.generation-nt.com/logo-ieee_0901F4026C00045324.jpg">
            <img class="img-partner" src="https://pbs.twimg.com/profile_images/1359430953/EurasipSmall_400x400.png">
            <img class="img-partner" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/c4509f13712953.5627729823905.jpg">
        </div>


<?php  $url = $_SERVER['SCRIPT_FILENAME'];

 //TODO :  DYNAMISER L URL ?> 

<script type='text/javascript'>		
    $(function (){

        $("#sign_in").click(function(){
            
            var id_user = $("#identifiant").val();
            var password_user = $("#pass").val();
            var action = 1;
            
            $.ajax({
                url:'includes/function.php',
                method: 'POST',
                dataType: 'json',
                data:{id_user:id_user,password_user:password_user,action:action},
                success:function(datar){
                    if(datar){
                console.log(datar);
                        if(datar.login == id_user && datar.password == password_user){
                                
                            if(datar.admin == 1){
                                window.location.replace("back_office.php");
                            }
                            else{
                                 window.location.replace("my_account.php");
                            }
                        }
                        if(datar == "false"){
                            alert('No Way you are Fucked');
                        }
                    }
                },
                error:function(datar){
                    console.log("Erreur interne au serveur veuillez contacter l'administrateur");
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
                        console.log("Erreur interne au serveur veuillez contacter l'administrateur");
                    }
                });
            }
            else{
                alert("Un des champs ne correspond pas au critere d'inscription ! Pensez à bien  remplir tout les champs");
            }
        });      
});
</script>
        
		
		