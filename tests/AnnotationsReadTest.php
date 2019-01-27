<?php
declare(strict_types=1);

use Test\EntityTestClass;
use PHPUnit\Framework\TestCase;
use Grajewsky\Annotations\Annotations;
use Grajewsky\Annotations\Interfaces\Annotation;

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
            $this->assertInstanceOf(Annotation::class, $arrayOfAnnotations[$keyString]);
        }

    }
    public function testOnePropertyHasEmptyAnnotationFields(): void {
        $allAnnotations = $this->annotationsDefault->annotations(Annotations::ALL_ANNOTATIONS);
        print_r($allAnnotations);
        $foundEmptyFields = false;
        foreach ($allAnnotations as $property => $annotations) {
            $this->assertTrue(is_string($property));
            foreach ($annotations as $name => $annotation) {
                $this->assertTrue(is_string($name));
                $this->assertInstanceOf(Annotation::class, $annotation);
                if(count($annotation->getFields()) == 0) {
                    $foundEmptyFields = true;
                }
            }
        }
        $this->assertTrue($foundEmptyFields);
    }
    public function testAnnotationFieldsArrayAccess(): void {
        $annotationName = 'Sample';
        $annotationField = 'value';

        $annotations = $this->annotationsDefault->annotations(Annotations::CLASS_ANNOTATIONS);
        $annotation = $annotations[$annotationName];
        $this->assertArrayHasKey($annotationField, $annotation);
        $this->assertNotEmpty($annotation[$annotationField]);
        $this->assertEquals($annotation[$annotationField], $annotation->getField($annotationField));
    }

}