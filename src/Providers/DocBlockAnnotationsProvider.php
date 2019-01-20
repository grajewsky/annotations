<?php



namespace Grajewsky\Annotations\Providers;

use Grajewsky\Annotations\Interfaces\Parser;
use Grajewsky\Annotations\Interfaces\AnnotationsProvider;


class DocBlockAnnotationsProvider implements AnnotationsProvider {
    /**
     * Parser
     *
     * @var Grajewsky\Annotations\Interfaces\Parser
     */
    private $parser;

    public function setParser(Parser $parser) {
        $this->parser = $parser;
    }
    public function getParser(): Parser {
        return $this->parser;
    }
    public function getAnnotations(string $classDocBlock): array {
        return $this->getParser()->parse($classDocBlock);
    }
}
