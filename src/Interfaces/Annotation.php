<?php


namespace Grajewsky\Annotations\Interfaces;

use ArrayAccess;

interface Annotation extends ArrayAccess {
    public function getName(): string;
    public function setField(string $label, $val);
    public function setFields(array $fields);
    public function getField(string $label);
    public function getFields(): array;
}