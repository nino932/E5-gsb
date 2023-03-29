<div class="corpsform">
    <fieldset>
        <legend>Fiche de frais du mois <?= $numMois_visiteur ?>/<?= $numAnnee_visiteur ?></legend>
        <p>Etat : <?= $etat["libelle"] ?> depuis le <?= $date_fiche ?> <br> Montant validé : <?= $etat["montant"] ?></p>
        <table class="listeLegere" style="width: 100%;">
            <h3>Eléments forfatisés</h3>
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $libelle = $unFraisForfait['libelle'];
                ?>
                    <th><?= $libelle ?></th>
                <?php } ?>
            </tr>
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $quantite = $unFraisForfait['quantite'];
                ?>
                    <td><?= $quantite ?></td>
                <?php
                }
                ?>
            </tr>
        </table>
        <table class="listeLegere" style="width: 100%;border: 0;">
            <caption>Descriptif des éléments hors forfait - <?= $etat["nbJ"] ?> justificatifs reçus -</caption>
            <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>
            </tr>

            <?php foreach ($lesFraisHorsForfait as $unFraisHorsForfait) { ?>
                <tr <?php if ($unFraisHorsForfait["suppr"]) { ?>style="background-color: #f43535;" <?php } ?>>
                    <td><?= $unFraisHorsForfait["date"] ?></td>
                    <td><?php if ($unFraisHorsForfait["suppr"]) { ?>REFUSE : <?php } ?><?= $unFraisHorsForfait["libelle"] ?></td>
                    <td><?= $unFraisHorsForfait["montant"] ?></td>
                </tr>
            <?php } ?>
        </table>
        <form method="POST" action="index.php?uc=suiviFrais&action=rembourserFiche">
            <div class="piedForm" style="width: 100%;border: 0;">
                <p>
                    <input id="ok" type="submit" name="rembourserFiche" value="Valider le remboursement" size="20">
                    <input type="hidden" name="visiteurID" value="<?= $infos_visiteur["id"] ?>">
                    <input type="hidden" name="moisvisiteur" value="<?= $moisVisiteur; ?>">
                </p>
            </div>
        </form>
    </fieldset>
</div>