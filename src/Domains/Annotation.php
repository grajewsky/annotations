<?php

namespace Grajewsky\Annotations\Domains;

use SplObjectStorage;
use Grajewsky\Annotations\Interfaces\Annotation as AnnotationInteraface;


class Annotation implements AnnotationInteraface {

    private $fields = null;
    private $name = "";

    public function __construct(string $name, ?array $fields = null) {
        $this->name = $name;
        $this->fields = array();
        if (\is_array($fields) && !\is_null($fields)) {
                $this->fields = $fields;
        }
    }
    public function setField(string $label, $value) {
        $this->fields[$label] = $value;
    }
    public function getField(string $field) {
        if (\array_key_exists($field, $this->fields)) {
            return $this->fields[$field];
        }
        return null;
    }
    public function setFields(array $fields) {
        $this->fields = $fields;
    }
    public function getFields(): array {
        return $this->fields;
    }
    public function getName(): string {
        return $this->name;
    }
}