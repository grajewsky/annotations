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
    private $structAnnotation = array("name"=> null);
    /**
     * Undocumented function
     */
    public function __construct(){
        $this->_annotations = array();
    }
    private function normalizeAnnotationsArray(array $annotations, bool $annotationAssoc = false) : array {
        
    }
    public function putAll(string $label, array $annotations): void {
        if(is_array($this->_annotations)) {
            $this->_annotations[$label] = $annotations;
            $this->_annotations[$label] = $val;
        }
    }
    public function add(string $label, Annotation $annotation): void {
        if (is_array($this->_annotations)) {

            if (!\array_key_exists($label, $this->_annotations)) {
                $this->_annotations[$label] = array();
            }
            $this->_annotations[$label] = array_merge($this->_annotations[$label], array($annotation->getName() => $annotation));
        }

    }
    public function get(string $label): ?array {
        $exist = \array_key_exists($label, $this->_annotations);

        if($exist) {
            return $this->_annotations[$label];   
        }
        return $exist;
    }
}