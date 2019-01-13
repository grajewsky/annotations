<?php

namespace Grajewsky\Annotations\Interfaces;

use Grajewsky\Annotations\Interfaces\Annotation;


interface AnnotationsStorage {

    public function put(string $label, Annotation $annotion): void;
    public function get(string $label): Annotation;
}