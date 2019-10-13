<?php 

namespace Annotations\Storages;

use SplFixedArray;
use Annotations\Interfaces\Annotation;
use Annotations\Interfaces\AnnotationsStorage;

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
    public function putAll(string $label, array $annotations): void {
        if(is_array($this->_annotations)) {
            $this->_annotations[$label] = $annotations;
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

        if ($exist) {
            return $this->_annotations[$label];   
        }
        return null;
    }
    public function setConfig(array $data): void {
        // unsupported
    }
    public function getConfig(): array {
        // unsupported
        return array();
    }

    public function getAll(): array {
        return $this->_annotations;
    }
}