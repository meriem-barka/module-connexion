<?php

session_start();

/* Connection à une base de données */

//mysqli_connet = connexion mysql
$bdd = mysqli_connect('localhost','root', 'root', 'moduleconnexion');


// Vérifier si le formulaire est soumis
if ( isset( $_POST['submit'] ) ) {

  
/* récupérer les données du formulaire en utilisant la valeur des attributs name comme clé*/
  $login = $_POST['login'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $Password = $_POST['pwd'];
  $Password2 = $_POST['pwd2'];

 //$salt = sha1($nom);
  $hashed_password = sha1($password);

  
  // Si les champs est différent de vide donc rempli
    if(!empty($login) && !empty($nom) && !empty($prenom) && !empty($Password)){

      // Selectioner les utilisateurs qui on le login que l'utilisateur a rentrer dans le formulaire 
      $req = mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE login = '$login' " );
      $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
      
      //si count = 0 le login est libre
      if(count($res) == 0){
        if ($Password2 == $Password) {
          
          // On inscrit l'utilisateur dans la base de donée
         mysqli_query ($bdd, "INSERT INTO utilisateurs (login, nom, prenom, password) VALUES ('$login', '$nom', '$prenom', '$hashed_password ')");
         header("Location: connexion.php");

        }else {
          $_SESSION ['Error'] = 'dans la confirmation du mot de passe.';
        }
      }else{
        $_SESSION['error'] = 'Le login existe deja';
      }
      
    }
    else{
      $_SESSION['error'] = 'Les champs sont vide';
    } 
}

?>

<!DOCTYPE html>
  <html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/styles.css" rel="stylesheet" type="text/css">

        <title>Inscription</title>
    </head>

    <body>
        <?php
            require_once('header.php');
        ?>
      
          
        <?php
          if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
          }
        
        ?>
      <main>
      <div class="image"> </div>
        <div class="for">
          <form class="insciption" action="#" method="POST" >
          <h3>Inscription</h3>

            <label >Login</label>
            <input type="text" id="login" name="login"></input><br/>

            <label>Nom</label>
            <input type="text" id="nom" name="nom"></input><br/>

            <label>Prenom</label>
            <input type="text" id="prenom" name="prenom"></input><br/>

            <label>Password</label>
            <input type="password" id="pwd" name="pwd"><br/>

            <label>Confirmation du Password</label>
            <input type="password" id="pwd" name="pwd2"><br/>

            <input type="submit" name="submit" value="inscription" >
          </form>
          <p><a class="button2" href="connexion.php">Connexion</a></p>
        </div>  
        
      </main> 

      <?php
        require_once('footer.php');
        ?>  
    </body>
      
  </html>

  <?php
    unset($_SESSION['error']);
  ?>