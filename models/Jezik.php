<?php

class Jezik{

    public $jezikID;
    public $jezik;

    public function __construct($jezikID=null,$jezik=null)
    {
        $this->jezikID = $jezikID;
        $this->jezik = $jezik;
    }

    public static function getAll(mysqli $con)
    {
        $query = "SELECT * FROM jezik";
        $resultSet = $con->query($query);
        $array = [];

        while($row = $resultSet->fetch_object()){
            $array[] = $row;
        }
        return $array;
    }

}

