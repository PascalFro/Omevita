<?php

/* 
 * Template pour l'affichage de ligne
 */
?>
<tr>
    <td><a href="index.php?module=reference&action=affiche_reference&id=<?= $reference->getId() ?>"><?= htmlentities($reference->getTitre())?></a></td>
<td><?= htmlentities($reference->getPhoto())?></td>
<td><?= nl2br(htmlentities($reference->getDescription()))?></td>
<td><?= htmlentities($reference->getRegion())?></td>
<td><?= htmlentities($reference->getCategorie())?></td>
</tr>