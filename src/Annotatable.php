<?php 

namespace Grajewsky\Annotations;

use Grajewsky\Annotations\Settings\Settings;


abstract class Annotatable {

    /**
     * @var Grajewsky\Annotations\Annotations
     */
    private $annotations = null;
    /**
     * 
     */
    protected $annotationsSettings = null;

    public function __construct() {
        $this->annotationsSettings = new Settings();
        $this->annotations = Annotations::read($this, $this->annotationsSettings);
    }
    public function __call($name, $args) {
        if(\property_exists($this, $name) && !\method_exists($this, $name)) {
            $rc = new \ReflectionClass($this);
            print_r($rc->getProperties());
            return $this->getFieldAnnotations($name);
        }
    }
}