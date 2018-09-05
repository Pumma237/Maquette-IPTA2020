<?php 

//TODO : DEFINIR LES VARIABLES CONSTANTES
$serveur ="localhost";
$base = "ipta2020";
$user = "root";
$pass = "";
$array_data= array();

if($_POST['action'] == 1 ){

    $link = mysqli_connect($serveur,$user,$pass);
    mysqli_select_db($link,$base);

    $resultat = mysqli_query($link,"SELECT * FROM user WHERE login ='".$_POST['id_user']."' AND password='".$_POST['password_user']."'");
    if(mysqli_num_rows($resultat)  == 0){
        echo json_encode($resultat);
        exit;
    }
    while($data = mysqli_fetch_assoc($resultat)){
        $array_data = $data;
    }
  
    mysqli_free_result($resultat);
    session_start();
    
    $_SESSION['login'] = $array_data['login'];

    $_SESSION['id_user'] = $array_data['id_user'];

    $_SESSION['email'] = $array_data['email'];

    $_SESSION['type_visite'] = $array_data['type_visite'];
    
    echo json_encode($array_data);
}

if($_POST['action'] == 2 ){

    $link = mysqli_connect($serveur,$user,$pass);
    mysqli_select_db($link,$base);

    $resultat_recherche = mysqli_query($link,"SELECT * FROM user WHERE login ='".$_POST['id_new_user']."'");
    if(mysqli_num_rows($resultat_recherche)  == 0){

        $resultat = "INSERT INTO `user`(`login`, `password`, `email`,`type_visite`) VALUES ('".$_POST['id_new_user']."','".$_POST['pass_new_user']."','".$_POST['id_new_user']."','".$_POST['type_new_user']."')";
        if (mysqli_query($link, $resultat)) {
            echo json_encode('Redirection vers page client');
        }
        else {
            echo "Error: " . $resultat . "" . mysqli_error($link);
        }
    }
    elseif(mysqli_num_rows($resultat_recherche) > 0 ){
        echo json_encode('Cette adresse mail est déja presente dans la base Veuillez saisir une nouvelle adresse mail');
    }      
}
if($_POST['action'] == 3 ){
    
    $link = mysqli_connect($serveur,$user,$pass);
    mysqli_select_db($link,$base);

    $recherche_all_users = mysqli_query($link,"SELECT * FROM user WHERE 'admin'= 0 ");
    
    while($data = mysqli_fetch_assoc($recherche_all_users)){
        $array_data[] = $data;
    }
    echo json_encode( $array_data);
}

if($_POST['action'] == 4 ){

    $array_data= array();
    $link = mysqli_connect($serveur,$user,$pass);
    mysqli_select_db($link,$base);

    $recherche_all_conference = mysqli_query($link,"SELECT * FROM conferences");
    
    while($data = mysqli_fetch_assoc($recherche_all_conference)){
        $array_data[] = $data;
    }
        
    echo json_encode($array_data);
}

if($_POST['action'] == 5 ){

    $link = mysqli_connect($serveur,$user,$pass);
    mysqli_select_db($link,$base);

    $resultat = "INSERT INTO `conferences`(`id_conference`,`name`, `city`, `countries`,`place_maxi`,`place_dispo`)
                    VALUES (null,'".$_POST['name_conference']."','".$_POST['city_conference']."','".$_POST['countrie_conference']."','".$_POST['place_maxi_conference']."','".$_POST['place_maxi_conference']."')";
    
    if (mysqli_query($link, $resultat)) {
        echo json_encode('Redirection vers page client');
    }
    else{
        echo "Error: " . $resultat . "" . mysqli_error($link);
    }
    
}
if($_POST['action'] == 6 ){

    $link = mysqli_connect($serveur,$user,$pass);
    mysqli_select_db($link,$base);
    
    $recherche_all_conference = mysqli_query($link,"SELECT * FROM conferences WHERE place_dispo > 0 ");
    
    while($data = mysqli_fetch_assoc($recherche_all_conference)){
        $array_data[] = $data;
    }
    echo json_encode( $array_data);
}

if($_POST['action'] == 7 ){

    $link = mysqli_connect($serveur,$user,$pass);
    mysqli_select_db($link,$base);

    $resultat = "INSERT INTO `participation`(`id_conference`,`id_user`)
    VALUES ('".$_POST['id_conference']."','".$_POST['id_user']."')";
    
    if (mysqli_query($link, $resultat)) {
        //
        } else {
        echo "Error: " . $resultat . "" . mysqli_error($link);
        }

        $resultat = "UPDATE conferences SET place_dispo=place_dispo-1 WHERE id_conference='".$_POST['id_conference']."'";
        
        if (mysqli_query($link, $resultat)) {
        echo json_encode('reussi');
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

}
if($_POST['action'] == 8 ){
    
        $link = mysqli_connect($serveur,$user,$pass);
        mysqli_select_db($link,$base);
    
        $recherche_all_conference = mysqli_query($link,"SELECT * FROM participation LEFT JOIN conferences ON conferences.id_conference = participation.id_conference 
        WHERE id_user='".$_POST['id_user']."'");
        
        while($data = mysqli_fetch_assoc($recherche_all_conference)){
            $array_data[] = $data;
        }
        echo json_encode( $array_data);
    
    }
        
        
    
?>