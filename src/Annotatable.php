<?php 

namespace Annotations;

use Annotations\Annotations;
use Annotations\Settings\Settings;
use Annotations\Interfaces\Annotation;


abstract class Annotatable {

    /**
     * @var Annotations
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
    /**
     * @return Array<Annotation>
     */
    public function annotations(?string $name = null): array {
        return $this->annotations->annotations($name);
    }
}