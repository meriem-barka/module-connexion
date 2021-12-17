
 <?php
session_start();

if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: connexion.php");
}

//mysqli_connet = connexion mysql
$bdd = mysqli_connect('localhost','root', 'root', 'moduleconnexion');

if(isset($_SESSION['user']['id'])){

    $id = $_SESSION['user']['id'];
    $newLogin = $_POST['newlogin'];
    $newNom = $_POST['newnom'];
    $newPrenom = $_POST['newprenom'];

    $req = mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE id = $id");
    $res = mysqli_fetch_all($req, MYSQLI_ASSOC);

    if (isset($_POST['newlogin']) AND !empty($_POST['newlogin']) AND $_POST['newlogin'] != $newLogin['login']) {
        var_dump($newLogin);
        $insertlogin = mysqli_query($bdd, "UPDATE utilisateurs SET login ='$newLogin' WHERE id ='$id'");
        var_dump($insertlogin);
      }
        if (isset($_POST['newnom']) AND !empty($_POST['newnom'])){
          $insertname = mysqli_query($bdd, "UPDATE utilisateurs SET nom = '$newNom' WHERE id  = '$id'");
          echo'Bonjour';
        } 

          if(isset($_POST['newprenom']) AND !empty($_POST['newprenom'])){
            $insertprenom = mysqli_query($bdd, "UPDATE utilisateurs SET prenom = '$newPrenom' WHERE id  = '$id'");
            echo '1';
          }

          if (isset($_POST['newpwd']) AND !empty($_POST['newpwd']) AND isset($_POST['newpwd2']) AND !empty($_POST['newpwd2'])) {

            $mdp = ($_POST['newpwd']);
            $mdp2 = ($_POST['newpwd2']);

            if($mdp == $mdp2){
              $insertpwd = mysqli_query($bdd, "UPDATE utilisateurs SET newpwd = '$mdp' WHERE id = '$id'");
              session_destroy();
              header("Location: connexion.php");
            }    
          }   
}

?>

<!DOCTYPE html>
  <html>
    <head>
          <meta charset="utf-8" />
          <link href="css/styles.css" rel="stylesheet" type="text/css">
          <title>Profil</title>
    </head>

    <body>
    <div class="image"> </div>
        <?php
          require_once('header.php');
        ?>
        <main>
        <h3>Edition de mon profil</h3>
        <?php 
        echo  " Bonjour ".$res[0]['nom']." ".$res[0]['prenom'];
        ?>
        <div class="flex"> 
          
        <div class="pro">
          <article>
            <p>On sait depuis longtemps que travailler avec du texte lisible 
              et contenant du sens est source de distractions, et 
              empêche de se concentrer sur la mise en page elle-même. 
              L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. 
              Du texte. Du texte.' 
              est qu'il possède une distribution de lettres plus ou moins normale, 
              et en tout cas comparable avec celle du français standard. 
              De nombreuses suites logicielles de mise en page ou éditeurs de 
              sites Web ont fait du Lorem Ipsum leur faux texte par défaut, 
              et une recherche pour 'Lorem Ipsum' vous conduira vers de nombreux 
              sites qui n'en sont encore qu'à leur phase de construction. 
              Plusieurs versions sont apparues avec le temps, parfois par accident, 
              souvent intentionnellement (histoire d'y rajouter de petits clins d'oeil, 
              voire des phrases embarassantes).Lorem Ipsum is simply dummy text of the printing and 
              typesetting industry. Lorem Ipsum has been the 
              industry's standard dummy text ever since the 1500s, 
            </p>
          </article>
        </div>

        <div class="profil">
          <form action="" method="POST" >
            <img class="img-profil" src="https://img.icons8.com/ios-filled/50/000000/user.png"/>   
          
              <label >New Login</label>
              <input type="text" id="newLogin" name="newlogin" value="<?= $_SESSION['user']['newLogin'] ?>" placeholder="newLogin"><br/>

              <label>New Nom</label>
              <input type="text" id="nom" name="newnom"  placeholder="newnom"><br/>

              <label>New Prenom</label>
              <input type="text" id="prenom" name="newprenom" placeholder="newprenom"><br/>

              <label>New Password</label>
              <input type="password" id="pwd" name="newpwd" placeholder="password"><br/>

              <label>New Password</label>
              <input type="password2" id="pwd" name="newpwd2" placeholder="Confirmation of password"><br/>

              <input type="submit" name="submit" value="Mettre à jour mon profil !"><br/>
          </form>
        </div>
        </div>
      </main>  
      <?php
        require_once('footer.php');
      ?> 
    </body>
  </html>

