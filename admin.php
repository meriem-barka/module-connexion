<?php
session_start();

//mysqli_connet = connexion mysql
$bdd = mysqli_connect('localhost','root', 'root', 'moduleconnexion');

// Selectioner les dans la base de donnée le login, nom, prenom
$req = mysqli_query($bdd,"SELECT login, prenom, nom FROM utilisateurs" );
$res = mysqli_fetch_all($req, MYSQLI_ASSOC);

if ($_SESSION['user']['login'] == 'admin') {
    echo 'Bonjour';
}else{
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
  <head>
    <link href="css/styles.css" rel="stylesheet" type="text/css"> 
    <title>Admin</title>
  </head>
  <body>

    <?php
        require_once('header.php');
    ?>
  <div class="image"></div>
      <h3>Bienvenu sur votre page admin</h3>
    <table>
        <thead>
            <tr>
                <th>Login</th>
                <th>Prenom</th>
                <th>Nom</th>
            </tr>
        </thead>    

        <tbody> 
            <?php
                foreach ($res as $key => $value) {

                    echo '
                        <tr>
                        ';
                    foreach ($value as $key2 => $value2) {
                        echo '
                            <td>'.$value2.'</td>
                        ';
                    }
                    echo'  
                        </tr>
                    ';
                }
            ?> 
        </tbody>
    </table>
    
    <?php
        require_once('footer.php');
        ?>  
  </body>
</html>