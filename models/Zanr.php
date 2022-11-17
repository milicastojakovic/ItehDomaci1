<?php

class Zanr{

    public $zanrID;
    public $zanr;

    public function __construct($zanrID=null,$zanr=null)
    {
        $this->zanrID = $zanrID;
        $this->zanr = $zanr;
    }

    public static function getAll(mysqli $con)
    {
        $query = "SELECT * FROM zanr";
        $resultSet = $con->query($query);
        $array = [];
        while($row = $resultSet->fetch_object()){
            $array[] = $row;
        }
        return $array;
    }

}

