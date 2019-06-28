<?php
namespace App\Tests;


use App\Util\Organisation;
use PHPUnit\Framework\TestCase;

class OrganisationTest extends TestCase
{
    /** @var $organisation Organisation  **/
    private $organisation;
    
    protected function setUp(): void
    {
        $this->organisation = new Organisation('esgi', 'paris');
    }

    public function testSave()
    {
        $this->assertEquals(201, $this->organisation->save());
    }
    
    

}