<?php

namespace App\Util;



use PHPUnit\Runner\Exception;

class Student
{

    private $mail;
    private $name;
    private $firstname;
    private $age;
    /**
     * @param String $mail
     * @param String $name
     * @param String $firstname
     * @param Int $age
     */
    public function __construct(String $mail, String $name, String $firstname, Int $age){
        $this->mail = $mail;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->age = $age;
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

    public function isValid()
    {
        if (filter_var($this->mail, FILTER_VALIDATE_EMAIL)){
            if($this->name != null and $this->firstname != null){
                return true;
            }else{
                throw new Exception("Nom ou prénom non renseigné");
            }
        } else {
            throw new Exception("Email invalide");
        }

    }

}
