<?php

use App\Util\EmailSender;
use App\Util\Session;
use \PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    private $session;
    private $date;
   protected function setUp(): void {
       $mockedEmailSender=$this->createMock(EmailSender::class,array('sendEmail'));
       $mockedEmailSender->expects($this->any())->method('sendEmail')->will($this->returnValue(true));
       $this->date= new \DateTime();
       $this->session = new Session("test","test","test","test",$this->date,"test");

   }

}