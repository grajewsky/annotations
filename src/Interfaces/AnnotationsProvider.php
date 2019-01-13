<?php


namespace Grajewsky\Annotations\Interfaces;

/**
 * AnnotationsProvider - Dostarcza 
 * 
 */
interface AnnotationsProvider {
    /**
     * Return Annotations
     * @param $fromString
     * @return Array<Grajewsky\Annotations\Interfaces\Annotation>
     */
    public function getAnnotations(string $fromString): array;
    
}