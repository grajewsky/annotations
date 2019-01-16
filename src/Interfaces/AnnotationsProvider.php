<?php


namespace Grajewsky\Annotations\Interfaces;

use Grajewsky\Annotations\Interfaces\Parser;

/**
 * AnnotationsProvider - Dostarcza 
 * 
 */
interface AnnotationsProvider {
    /**
     * Parser Resolving string into array of Annotations interface
     *
     * @param Parser $parser
     * @return void
     */
    public function setParser(Parser $parser);
    /**
     * Getter for Parser
     *
     * @return Parser
     */
    public function getParser(): Parser;
    /**
     * Return Annotations
     * @param $fromString
     * @return Array<Grajewsky\Annotations\Interfaces\Annotation>
     */
    public function getAnnotations(string $fromString): array;
    
}