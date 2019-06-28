<?php

namespace App\Util;



use PHPUnit\Runner\Exception;
use App\Util\Session;

class Etudiant
{

    private $mail;
    private $name;
    private $firstname;
    private $age;
    private $demande;

    /**
     * Etudiant constructor.
     * @param $mail
     * @param $name
     * @param $firstname
     * @param $age
     * @param $demande
     */
    public function __construct($mail, $name, $firstname, $age, Session $demande)
    {
        $this->mail = $mail;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->age = $age;
        $this->demande = $demande;
    }


    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return \App\Util\Session
     */
    public function getDemande()
    {
        return $this->demande;
    }

    /**
     * @param \App\Util\Session $demande
     */
    public function setDemande($demande)
    {
        $this->demande = $demande;
    }


    public function isValid()
    {
        if (filter_var($this->mail, FILTER_VALIDATE_EMAIL)) {
            if ($this->name != null and $this->firstname != null) {
                return true;
            } else {
                throw new Exception("Nom ou prénom non renseigné");
            }
        } else {
            throw new Exception("Email invalide");
        }

    }


    public function demandeInscriptiton($demande)
    {
        if ($this->$demande != null) {
            return true;
        } else {
            throw new Exception("Demande non renseigné");
        }

    }


    public function save(): void {
        $encoded = json_encode(
            array(
                "name" => $this->getName(),
                "mail" => $this->getMail(),
                "firstname" => $this->getFirstname(),
                "age" => $this->getAge()
            )
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "localhost:3000/etudiant");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $output = curl_exec($ch);
        curl_close($ch);

        var_dump($output);
    }


}
