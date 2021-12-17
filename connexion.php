<?php

session_start();

//mysqli_connet = connexion mysql
$bdd = mysqli_connect('localhost','root', 'root', 'moduleconnexion');

if(isset($_POST['submit'])) {

    /* récupérer les données du formulaire en utilisant la valeur des attributs name comme clé*/
  $login = $_POST['login'];
  $Password = $_POST['pwd'];
 
   // Selectioner les utilisateurs qui on le login que l'utilisateur a rentrer dans le formulaire 
   $req = mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE login = '$login' " );
   $res = mysqli_fetch_assoc($req, MYSQLI_ASSOC);
}

if(isset($_POST['login'])){
    echo"Bienvenue sur votre page";
}

 // Si les champs est différent de vide donc rempli
if(!empty($login) && !empty($Password)){
    if(!empty($res)){
        //comparison de valeur
        if ($Password == $res["password"]) {

            $_SESSION['user'] = $res;

            //$_SESSION['login'] = $login;
            header('Location: profil.php');
        }else {
            echo'login ou le mot de passe incorrect';
        }

    }else {
        echo'login ou le mot de passe incorrect';
    }
} else {
    $_SESSION['erreur'] = "Tous les champ doivent être remplie";
}
    
?>

<!DOCTYPE html>
  <html>
    <head>
          <meta charset="utf-8" />
          <link href="css/styles.css" rel="stylesheet" type="text/css">
          <title>Formulaire de connexion</title>
    </head>

    <body>

        <?php
            require_once('header.php');
        ?>
        <main>
        <div class="image"> </div>
            <div class="conn">
            <fieldset>
                <legend>Connexion</legend>
                <form class="connexion" action="#" method="POST" >
                    <label >Login</label>
                    <input type="text" id="login" name="login"></input><br/>

                    <label>Password</label>
                    <input type="password" id="pwd" name="pwd"><br/>
                
                    <input class="submit" type="submit" name="submit" value="connexion" >
                </form>
                <p><a class="button" href="inscription.php">Inscription</a></p> 
            </fieldset>
            </div>
        </main>  
        <?php
                require_once('footer.php');
            ?>       
    <body>
  <html>
    