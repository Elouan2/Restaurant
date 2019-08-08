<?php
class CommandeModel
{
    private $db;

    function __construct (Database $database)
    {
        $this->db = $database;
    }

    public function findAllFormule()
    {
        $sql = 'SELECT * FROM formule';

        $formules = $this->db->query($sql);

        return $formules;
    }
}