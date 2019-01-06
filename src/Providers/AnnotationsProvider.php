<?php 

namespace Grajewsky\Annotations\Providers;


class AnnotationsProvider {
    private $_annotations = null;

    public function __construct(){
        $this->_annotations = array();
    }
    public function addFieldAnnotations(string $label, $val): void {
        if(is_array($this->_annotations)) {
            $this->_annotations[$label] = $val;
        }
    }
    public function getAnnotations(): array {
        return $this->_annotations;
    }
    public function getFieldAnnotations(string $label) {
        $exist = \array_key_exists($label, $this->_annotations);
        if($exist) {
            return $this->_annotations[$label];
        }
        return $exist;
    }
}