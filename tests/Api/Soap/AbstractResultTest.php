<?php
namespace CallFire\Api\Soap;

use CallFire\Api\Soap\AbstractResult;

use PHPUnit_Framework_TestCase as TestCase;

use ReflectionClass;

class AbstractResultTest extends TestCase
{
    protected $resultFixture;

    /**
     * Test hydration of result types using public property setters
     * 
     * @dataProvider provideResultTypes
     *
     * @param string $resultType
     */
    public function testResultHydration($resultType) {
        $resultFixture = $this->getResultFixture();
    
        $resultTypeFQN = AbstractResult::ns()."\\{$resultType}";
        $resultTypeReflection = new ReflectionClass($resultTypeFQN);
        if($resultTypeReflection->isAbstract()) {
            return;
        }
        
        $result = new $resultTypeFQN;
        $this->assertInstanceOf($resultTypeFQN, $result);
        
        if(!isset($resultFixture[$resultType])) {
            $this->markTestSkipped('No fixture to test with.');
        }
        $hydrator = $result->getHydrator();
        
        $fixture = $resultFixture[$resultType];
        
        foreach($fixture["data"] as $property => $value) {
            $result->$property = $value;
        }
        
        $dataResult = $hydrator->extract($result);
        
        $this->assertEquals($fixture["result"], $dataResult);
    }
    
    /**
     * @dataProvider provideNumericValues
     */
    public function testNumericHydration($value) {
        $client = $this->getMockClient();
        
        $result = $client::response($value);
        $this->assertInstanceOf("CallFire\Api\Soap\Response\ResourceReference", $result);
        $this->assertEquals((int) $value, $result->getId());
    }
    
    public function provideResultTypes() {
        $data = array();
        foreach(glob(__DIR__.'/../../../src/CallFire/Api/Soap/Result/*.php') as $filename) {
            $resultType = basename($filename, ".php");
            $data[] = array(
                $resultType
            );
        }
        
        return $data;
    }
    
    public function provideNumericValues() {
        return array(
            array(1),
            array("1"),
            array(1.0),
            array("1.0"),
        );
    }
    
    public function getResultFixture() {
        if(!$this->resultFixture) {
            $this->resultFixture = include __DIR__.'/AbstractResultTest/fixtures/results.php';
        }
        return $this->resultFixture;
    }
    
    public function setResultFixture($resultFixture) {
        $this->resultFixture = $resultFixture;
        return $this;
    }

    public function getMockClient()
    {
        $client = $this->getMockForAbstractClass('CallFire\Api\Soap\AbstractClient');

        return $client;
    }

    public function getMockResult()
    {
        $response = $this->getMockForAbstractClass('CallFire\Api\Soap\AbstractResult');

        return $response;
    }
}
