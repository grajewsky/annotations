<?php



namespace Annotations\Providers;

use Annotations\Interfaces\Parser;
use Annotations\Interfaces\AnnotationsProvider;


class DocBlockAnnotationsProvider implements AnnotationsProvider {
    /**
     * Parser
     *
     * @var \Annotations\Interfaces\Parser
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
