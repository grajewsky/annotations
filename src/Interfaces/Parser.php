<?php


namespace Annotations\Interfaces;



interface Parser {
    public function parse(string $source): array;
}