<?php
        // Template d'affichage d'une ligne pour une liste
        // Fragment
        // Nécessite en paramètre d'avoir chargée l'objet $agence
?>

<tr>
    <td><a href="index.php?module=admin&action=affiche_admin&id=<?= $administrateur->getId()?>"><?= $administrateur->getNom()?></a></td>
    <td><?= $administrateur->getPrenom()?></td>
    <td><?= $administrateur->getPassword()?></td>
    <td><?= $administrateur->getAdmin()?></td>
    <td><?= $administrateur->getAgence()?></td>
</tr>



