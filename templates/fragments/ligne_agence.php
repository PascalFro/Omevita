<?php
        // Template d'affichage d'une ligne pour une liste
        // Fragment
        // Nécessite en paramètre d'avoir chargée l'objet $agence
?>

<tr>
    <td><a href="index.php?module=agence&action=affiche_agence&id=<?= $agence->getId()?>"><?= $agence->getNom()?></a></td>
    <td><?= $agence->getDescription()?></td>
    <td><?= $agence->getPhoto()?></td>
    <td><?= $agence->getAdresse()?></td>
    <td><?= $agence->getCp()?></td>
    <td><?= $agence->getVille()?></td>
    <td><?= $agence->getHoraires()?></td>
    <td><?= $agence->getPrestation1()?></td>
    <td><?= $agence->getPrestation2()?></td>
    <td><?= $agence->getPrestation3()?></td>
    <td><?= $agence->getPrestation4()?></td>
</tr>


