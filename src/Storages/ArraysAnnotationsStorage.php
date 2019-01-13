<?php 

namespace Grajewsky\Annotations\Storages;

use SplFixedArray;
use Grajewsky\Annotations\Interfaces\Annotation;
use Grajewsky\Annotations\Interfaces\AnnotationsStorage;

/**
 * Dostarcza Adnotacje
 * 
 */
class ArraysAnnotationsStorage implements AnnotationsStorage {
    private $_annotations = null;
    /**
     * Undocumented function
     */
    public function __construct(){
        $this->_annotations = array();
    }
    public function put(string $label, Annotation $annotation): void {
        if(is_array($this->_annotations)) {
            $this->_annotations[$label] = $val;
        }
    }
    public function get(string $label): Annotation {
        $exist = \array_key_exists($label, $this->_annotations);
        if($exist) {
            return $this->_annotations[$label];
        }
        return $exist;
    }
}