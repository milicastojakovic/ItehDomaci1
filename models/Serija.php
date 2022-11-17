<?php


class Serija{

   public $serijaID;
   public $naziv;
   public $brojEpizoda;
   public $brojOdgledanihEpizoda;
   public $zanrID;
   public $jezikID;
  
    public function __construct($serijaID=null, $naziv=null, $brojEpizoda=null, $brojOdgledanihEpizoda=null, $zanrID=null, $jezikID=null)
    {
        $this->serijaID = $serijaID;
        $this->naziv = $naziv;
        $this->brojEpizoda = $brojEpizoda;
        $this->brojOdgledanihEpizoda = $brojOdgledanihEpizoda;
        $this->zanrID = $zanrID;
        $this->jezikID = $jezikID;
    }

    public static function select($zanr, $sort, mysqli $con)
    {
        $query = "SELECT * FROM serija s join jezik j on s.jezikID = j.jezikID join zanr z on s.zanrID = z.zanrID";
        if($zanr != "0"){
            $query .= " WHERE s.zanrID = " . $zanr;
        }
        $query.= " ORDER BY s.brojEpizoda " . $sort;
        $resultSet = $con->query($query);
        $array = [];
        while($row = $resultSet->fetch_object()){
            $array[] = $row;
        }
        return $array;
    }

    public static function add($naziv, $brojEpizoda, $brojOdgledanihEpizoda, $zanr, $jezik, mysqli $con)
    {
        return $con->query("INSERT INTO serija VALUES(null, '$naziv' , '$brojEpizoda', '$brojOdgledanihEpizoda' , '$zanr' , '$jezik' )");  
    }

    public static function update($serijaID, $brojOdgledanihEpizoda, mysqli $con)
    {
        return $con->query("UPDATE serija SET brojOdgledanihEpizoda = '$brojOdgledanihEpizoda' WHERE serijaID = $serijaID");
    }

    public static function delete($serijaID, mysqli $con)
    {
        return $con->query("DELETE FROM serija WHERE serijaID = $serijaID");
    }
}