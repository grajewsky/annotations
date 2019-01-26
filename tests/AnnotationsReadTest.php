<?php
declare(strict_types=1);

use Test\EntityTestClass;
use PHPUnit\Framework\TestCase;
use Grajewsky\Annotations\Annotations;

final class AnnotationsReadTest extends TestCase
{
    /** 
     * @var Annotations
     */
    private $annotationsDefault = null;

    public function setUp() {
        if($this->annotationsDefault == null) {
            $this->annotationsDefault = Annotations::read(EntityTestClass::class);
        }
    }
    public function testCreateNewAnnotationObject(): void {
        $name = "test";
        $fields = array("test1" => 'test');

        $annotation  = new \Grajewsky\Annotations\Domains\Annotation($name, $fields);

        $this->assertEquals($annotation->getFields(), $fields);
        $this->assertEquals($annotation->getName(), $name);
        
    }
    public function testDefaultStrictTypeArray(): void {
        $this->assertTrue($this->annotationsDefault->getSettings()->getStrict() == "array");
    }
    public function testReadProptertyAnnotation(): void {
        $propertyName = 'test';
        $requiredArrayKey = 'ORM';

        $arrayOfAnnotations = $this->annotationsDefault->annotations($propertyName);
        $this->assertArrayHasKey($requiredArrayKey, $arrayOfAnnotations);
        $this->assertTrue(is_array($arrayOfAnnotations));
        foreach($arrayOfAnnotations as $keyString => $annotationObject) {
            $this->assertTrue(is_string($keyString));
            $this->assertInstanceOf(\Grajewsky\Annotations\Interfaces\Annotation::class, $arrayOfAnnotations[$keyString]);
        }

    }
    public function testOnePropertyHasEmptyAnnotationFields(): void {
        $this->annotationsDefault->annotations()
    }

}