<div id="contenu">
    <h2>Suivi des fiches de frais</h2>
    <form method="POST" action="index.php?uc=suiviFrais&action=validationFrais">
        <div class="corpsform">
            <fieldset>
                <legend>Fiches des visiteurs et mois à sélectionner</legend>
                <p>
                    <label for="visiteur" accesskey="n">Visiteur : </label>
                    <select id="visiteur" name="visiteur">
                        <?php if(!empty($_POST)) { ?>
                            <?php
                            $numAnnee_visiteur = substr($moisVisiteur, 0, 4);
                            $numMois_visiteur = substr($moisVisiteur, 4, 2);

                            ?>
                            <option value="<?= $idVisiteur ?>-<?= $moisVisiteur ?>" selected> <?= $numMois_visiteur ?>/<?= $numAnnee_visiteur ?> - <?= $infos_visiteur["prenom"] . " " . $infos_visiteur["nom"] ?></option>
                        <?php } ?>
                        <?php foreach($visiteursetmois as $vm) { ?>

                        <?php
                            $numAnnee = substr($vm["mois"], 0, 4);
                            $numMois = substr($vm["mois"], 4, 2);

                        ?>
                        <option value="<?= $vm["idVisiteur"] ?>-<?= $vm["mois"] ?>"> <?= $numMois ?>/<?= $numAnnee ?> - <?= $vm["prenom"] . " " . $vm["nom"] ?></option>
                        <?php } ?>
                    </select><br>
                </p>
            </fieldset>
        </div>
        <div class="piedForm">
            <p>
                <input id="ok" type="submit" name="suivifrais" value="Valider" size="20">
            </p>
        </div>
    </form>