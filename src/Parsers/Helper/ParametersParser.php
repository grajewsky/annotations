<?php


namespace Grajewsky\Annotations\Parsers\Helpers;



class ParametersParser {
    
    const PARAMETER_REGEX = '/(\w+)\s*=\s*(\[[^\]]*\]|"[^"]*"|[^,)]*)\s*(?:,|$)/';

    public function parseParameter(string $source): array {

    }
}