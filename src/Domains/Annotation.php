<?php

namespace Annotations\Domains;

use SplObjectStorage;
use Annotations\Interfaces\Annotation as AnnotationInteraface;


class Annotation implements AnnotationInteraface {

    private $fields = null;
    private $name = "";

    public function __construct(string $name, ?array $fields = null) {
        $this->name = $name;
        $this->fields = array();
        if (\is_array($fields) && !empty($fields)) {
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

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            return;
        } else {
            $this->fields[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->fields[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->fields[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->fields[$offset]) ? $this->fields[$offset] : null;
    }
}