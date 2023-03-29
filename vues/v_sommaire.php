    <!-- Division pour le sommaire -->
    <div id="menuGauche">
       <div id="infosUtil">

          <h2></h2>

       </div>
       <ul id="menuList">
          <li>
             <?= $_SESSION['role'] ?> :<br>
             <?php echo $_SESSION['prenom'] . "  " . $_SESSION['nom']  ?>
          </li>
          <li class="smenu">
             <?php if ($_SESSION['role'] == "Visiteur") { ?>
                <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
             <?php } elseif ($_SESSION['role'] == "Comptable") { ?>
                <a href="index.php?uc=validerfrais&action=selectionnerMois" title="Valider les fiches de frais">Valider les fiches de frais</a>
             <?php } ?>
          </li>
          <li class="smenu">
             <?php if ($_SESSION['role'] == "Visiteur") { ?>
                <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
             <?php } elseif ($_SESSION['role'] == "Comptable") { ?>
                <a href="index.php?uc=suiviFrais&action=selectionnerMois" title="Suivi des fiches de frais">Suivi des fiches de frais</a>
             <?php } ?>
          </li>
          <li class="smenu">
             <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
          </li>
       </ul>
    </div>