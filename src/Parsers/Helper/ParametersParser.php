<?php


namespace Annotations\Parsers\Helper;



class ParametersParser {
    
    const PARAMETER_REGEX = '/(\w+)\s*=\s*(\[[^\]]*\]|"[^"]*"|[^,)]*)\s*(?:,|$)/';

    public function parseParameter(string $source): array {
        $hasAnnotations = preg_match_all(
			self::PARAMETER_REGEX,
			$source,
			$matches,
			PREG_SET_ORDER
        );
        $parameters = array();
        foreach($matches as $param) {
            if (is_array($param) && count($param) > 2) {
                $parameters = array_merge($parameters, array($param[1] => $param[2]));
            }
        }
        return $parameters;
    }
}