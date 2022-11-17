<?php

class Korisnik{

    public $korisnikID;
    public $korisnickoIme;
    public $lozinka;


    public function __construct($korisnikID=null,$korisnickoIme=null,$lozinka=null)
    {
        $this->korisnikID = $korisnikID;
        $this->korisnickoIme=$korisnickoIme;
        $this->lozinka=$lozinka;
    }

    public static function getAll(mysqli $con)
    {
        $query = "SELECT * FROM korisnik";
        $resultSet = $konekcija->query($query);
        $array = [];
        while($row = $resultSet->fetch_object()){
            $array[] = $row;
        }
        return $array;
    }

    public static function register($korisnik, mysqli $con)
    {
        return $con->query("INSERT INTO korisnik VALUES(null, '$korisnik->korisnickoIme', '$korisnik->lozinka')");
    }

    public static function login($korisnik, mysqli $con)
    {
        $query = "SELECT * FROM korisnik WHERE korisnickoIme='$korisnik->korisnickoIme' and lozinka='$korisnik->lozinka'";
        return $con->query($query);
    }


}

