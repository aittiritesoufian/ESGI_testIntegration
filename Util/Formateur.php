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
     * @var array
     */
    private $courses;



    public function __construct(string $email, string $firstname, string $lastname,array  $courses) {

        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->courses = $courses;
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
        return true;
    }

    public function validerInscription() {

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
     * @return array
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * @param array $courses
     */
    public function setCourses($courses)
    {
        $this->courses = $courses;
    }



}
