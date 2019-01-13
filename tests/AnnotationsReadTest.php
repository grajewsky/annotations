<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Grajewsky\Annotations\Annotations;

final class AnnotationsReadTest extends TestCase
{
    private $annotationsDefault = null;

    public function setUp() {
        $this->annotationsDefault = Annotations::read(EntityTestClass::class);
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

}