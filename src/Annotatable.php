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
    /**
     * @return Array<Annotation>
     */
    public function annotations(?string $name = null): array {
        return $this->annotations->annotations($name);
    }
}