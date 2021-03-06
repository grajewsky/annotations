<?php


namespace Annotations\Parsers;

use Annotations\Interfaces\Parser;
use Annotations\Domains\Annotation;


class AnnotationParser implements Parser {
    
    const ANNOTATION_REGEX = '/@(\w+)(?:\s*(?:\(\s*)?(.*?)(?:\s*\))?)??\s*(?:\n|\*\/)/';

    private $parametersParsers = array(
        \Annotations\Parsers\Helper\ParametersParser::class
    );
    private function parseParamteter(string $source): array {
        $parameters = array();

        foreach ($this->parametersParsers as $parser) {
            if(\class_exists($parser, true)) {
                $parserClass = new $parser;
                $parameters = array_merge($parameters, $parserClass->parseParameter($source));

            }
        }
        return $parameters;
    }
    public function parse(string $source): array {
        $hasAnnotations = preg_match_all(
			self::ANNOTATION_REGEX,
			$source,
			$matches,
			PREG_SET_ORDER
        );
        if (!$hasAnnotations) {
			return array();
        }
        $annotations = array();
        if (is_array($matches)) {
            foreach ($matches as $annotationMatch) {
                if (is_array($annotationMatch) && count($annotationMatch) >= 2) {
                    $name = "";
                    if ( is_string($annotationMatch[1])) {
                        $name = $annotationMatch[1];
                    }
                    $annotation = new Annotation($name, null);
                    if (\array_key_exists(2, $annotationMatch)) {
                        if (\is_string($annotationMatch[2])) {
                            $annotation->setFields($this->parseParamteter($annotationMatch[2]));
                        }
                    }
                    $annotations = array_merge($annotations, array($annotation));
                }
            }
        }
        return $annotations;
    }
}