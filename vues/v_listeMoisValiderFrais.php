<div id="contenu">
    <h2>Validation des fiches de frais</h2>
    <form method="POST" action="index.php?uc=validerfrais&action=validationFrais">
        <div class="corpsform">
            <fieldset>
                <legend>Visiteur et mois à sélectionner</legend>
                <p>
                    <label for="visiteur" accesskey="n">Visiteur : </label>
                    <select id="visiteur" name="visiteur">
                        <?php if ($etat) { ?>
                            <option value="<?= $infos_visiteur["id"] ?>"><?= $infos_visiteur["prenom"] ?> <?= $infos_visiteur["nom"] ?></option>
                        <?php } ?>
                        <?php foreach ($visiteurs as $v) { ?>
                            <option value="<?= $v["id"] ?>"><?= $v["prenom"] ?> <?= $v["nom"] ?></option>
                        <?php } ?>
                    </select><br>

                </p>
                <p>
                    <label for="moisValider" accesskey="n">Mois : </label>
                    <select id="moisValider" name="mois">
                        <?php if ($etat) { ?>
                            <option value="<?= $mois_visiteur ?>"><?= $numMois_visiteur ?>/<?= $numAnnee_visiteur ?></option>
                        <?php } ?>
                        <?php foreach ($mois as $m) { ?>
                            <?php
                            $numAnnee = substr($m["mois"], 0, 4);
                            $numMois = substr($m["mois"], 4, 2);

                            ?>
                            <option value="<?= $m["mois"] ?>"><?= $numMois ?>/<?= $numAnnee ?></option>
                        <?php } ?>
                    </select>
                </p>
            </fieldset>
        </div>
        <div class="piedForm">
            <p>
                <input id="ok" type="submit" name="validerfrais" value="Valider" size="20">
                <input id="annuler" type="reset" value="Effacer" size="20">
            </p>
        </div>
    </form>