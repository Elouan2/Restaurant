<?php 

class MediaModel
{
    const QUERY_ADDMEDIA = 'INSERT INTO `media` (`name`, `type`)
    VALUES (?, ?)';
}

if ($_FILES["picture"]["error"] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["picture"]["tmp_name"}];
    // basename() peut empêcher les attaques "filesystem traversal";
    // une autre validation/néttoyage du nom de fichier peux être appropriée
    $name = basename($_FILES["picture"]["name"]);
    $type = basename($_FILES["picture"]["type"]);
    move_uploaded_file($tmp_name, ROOT_PATH."/application/www/images/uploads/$name");
}

?>