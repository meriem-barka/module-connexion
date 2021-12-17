
            <header>
                <nav>
                <a class="logo" href="index.php" title="Recharger la page">
                    <img src="img/icons8.png"  alt="MERIEM BARKA">
                </a>
                
                    <ul id="menu">
                        <li><a href="index.php">Accueil</a></li>
                        

                        <?php
                        if (!isset($_SESSION['user']['login'])){
                        ?>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                        <?php 
                            }
                        ?>

                        <?php
                        if (isset($_SESSION['user']['login'])){
                        ?>
                        <li><a href="profil.php">Profil</a></li>
                        <li><a href="deconnexion.php">Déconnexion</a></li>
                        <?php 
                            }
                        ?>
                        

                        <?php

                        if (isset($_SESSION['user']['login']) && $_SESSION['user']['login'] == 'admin') {?>
                        <li><a href="admin.php">Admin</a></li>
                        <?php
                        }
                        ?> 
                    </ul>
                </nav>
            </header>    
