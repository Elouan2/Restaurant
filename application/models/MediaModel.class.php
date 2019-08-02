<?php 

class MediaModel
{
    const QUERY_ADDMEDIA = 'INSERT INTO `media` (`name`, `type`)
    VALUES (?, ?)';
    private $db;

    function __construct (Database $database)
    {
        $this->db = $database;
    }

    function addMedia (string $media)
    {
        if ($_FILES[$media]["error"] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES[$media]["tmp_name"];
            // basename() peut empêcher les attaques "filesystem traversal";
            // une autre validation/néttoyage du nom de fichier peux être appropriée
            $name = basename($_FILES[$media]["name"]);
            $type = basename($_FILES[$media]["type"]);
            move_uploaded_file($tmp_name, ROOT_PATH."/application/www/images/uploads/$name");
        }
        $parameters[0]= $name;
        $parameters[1] = $type;
        $key = $this->db->executeSql(self::QUERY_ADDMEDIA, $parameters);

        return $key;
    }

}


?>