<?php 

namespace Grajewsky\Annotations\Readers;

abstract class Annotatable extends AnnotationsProvider {

    public function __call($name, $args) {
        if(\property_exists($this, $name) && !\method_exists($this, $name)) {
            return $this->getFieldAnnotations($name);
        }
    }
}