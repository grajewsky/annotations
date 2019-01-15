<?php


namespace Grajewsky\Annotations\Parsers;

use Grajewsky\Annotations\Interfaces\Parser;
use Grajewsky\Annotations\Domains\Annotation;


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
        if(is_array($matches)) {
            foreach($matches as $annotationMatch) {
                if(is_array($annotationMatch) && count($annotationMatch) > 2) {
                    if( is_string($annotationMatch[1]) && is_string($annotationMatch[2])) {
                        $name = $annotationMatch[1];
                    }
                    $annotation = new Annotation($name, null);
                    $annotation->setFields($this->parseParamteter($annotationMatch[2]));
                }
            }
        }

    }
}