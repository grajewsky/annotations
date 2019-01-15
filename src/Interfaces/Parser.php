<?php


namespace Grajewsky\Annotations\Interfaces;



interface Parser {
    public function parse(string $source): array;
}