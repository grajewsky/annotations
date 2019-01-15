<?php


namespace Grajewsky\Annotations\Parsers;

use Grajewsky\Annotations\Interfaces\Parser;


class AnnotationParser implements Parser {
    
    const ANNOTATION_REGEX = '/@(\w+)(?:\s*(?:\(\s*)?(.*?)(?:\s*\))?)??\s*(?:\n|\*\/)/';

    private $parametersParsers = array(
        \Grajewsky\Annotations\Parsers\ParametersParser::class
    );
    private function parseParamteter(string $source): array {
        $parameters = array();

        foreach ($this->parametersParsers as $parser) {
            if(\class_exists($parser, true)) {
                $parserClass = new $parser;
                if($parserClass instanceof \Grajewsky\Annotations\Interfaces\Parser) {
                    $parameters = array_merge($parameters, $parserClass->parse($source));
                }

            }
        }
        return $parameters;
    }
    public function parse(string $source): array {
        $hasAnnotations = preg_match_all(
			self::ANNOTATION_REGEX,
			$classDocBlock,
			$matches,
			PREG_SET_ORDER
        );
        if (!$hasAnnotations) {
			return array();
        }
        
    }
}