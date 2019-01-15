<?php


namespace Grajewsky\Annotations\Parsers;

use Grajewsky\Annotations\Interfaces\Parser;
use Grajewsky\Annotations\Interfaces\Annotation;


class ParametersParser implements Parser {
    
    const PARAMETER_REGEX = '/(\w+)\s*=\s*(\[[^\]]*\]|"[^"]*"|[^,)]*)\s*(?:,|$)/';

    public function parse(string $source): array {

    }
}