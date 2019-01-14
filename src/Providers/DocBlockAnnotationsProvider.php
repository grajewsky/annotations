<?php



namespace Grajewsky\Annotations\Providers;

use Grajewsky\Annotations\Interfaces\AnnotationsProvider;


class DocBlockAnnotationsProvider implements AnnotationsProvider {
    
    public function getAnnotations(string $classDocBlock): array {
        
        return array();
    }
}
