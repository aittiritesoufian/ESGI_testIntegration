<?php

namespace App\Util;


class Formateur {

    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $firstname;
    /**
     * @var string
     */
    private $lastname;
    /**
     * @var int
     */
    private $age;



    public function __construct(string $email, string $firstname, string $lastname, int $age) {

        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->age = $age;
    }

    public function isValid() {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            throw new \Exception('Wrong email format');
        }
        if(!isset($this->firstname) || empty($this->firstname)){
            throw new \Exception('Please enter a firstname');
        }
        if(!isset($this->lastname) || empty($this->lastname)){
            throw new \Exception('Please enter a lastname');
        }
        if($this->age < 13){
            throw new \Exception('You need to be at least 13 years old');
        }

        if($this->credit <= 0 && $this->credit > 1000){
            throw new \Exception('min 0 max 1000');
        }
        return true;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstname(): string {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void {
        $this->lastname = $lastname;
    }

    /**
     * @return int
     */
    public function getAge(): int {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void {
        $this->age = $age;
    }




}
