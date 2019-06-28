<?php

use App\Util\EmailSender;
use App\Util\Etudiant;
use App\Util\Session;
use PHPUnit\Framework\TestCase;
class EtudiantTest extends TestCase
{
    private $etudiant;

    protected function setUp(): void {
        $mockedSession=$this->createMock(Session::class,array('isValid'));
        $mockedSession->expects($this->any())->method('isValid')->will($this->returnValue(true));
        $mockedEmailSender=$this->createMock(EmailSender::class,array('sendEmail'));
        $mockedEmailSender->expects($this->any())->method('sendEmail')->will($this->returnValue(true));


        $this->etudiant = new Etudiant("truc@truc.fr","truc", "truc", 15, $mockedSession, $mockedEmailSender);
    }


    public function testStudentIsValid()
    {
        $result = $this->etudiant->isValid();

        $this->assertTrue($result);
    }
    public function testStudentEmailInvalid()
    {
        $this->etudiant->setMail("truc");
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Email invalide');
        $this->etudiant->isValid();
    }
    public function testStudentNameEmpty(){
        $this->etudiant->setName("");
        $result = $this->etudiant->isValid();
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please enter a firstname');
    }

    public function testValidDemandeTrue()
    {
        $result = $this->etudiant->demandeInscription($this->etudiant->getDemande(), $this->etudiant->getSend());
        $this->assertTrue($result);
    }

}