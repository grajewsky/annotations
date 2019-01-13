<?php


namespace Grajewsky\Annotations\Interfaces;

interface Annotation {
    public function getName(): string;
    public function setField(string $label, $val);
    public function getField(string $label);
    public function getFields(): array;
}