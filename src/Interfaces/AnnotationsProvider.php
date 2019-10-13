<?php


namespace Annotations\Interfaces;

use Annotations\Interfaces\Parser;

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
     * @param string $fromString
     * @return Array<\Annotations\Interfaces\Annotation>
     */
    public function getAnnotations(string $fromString): array;
    
}