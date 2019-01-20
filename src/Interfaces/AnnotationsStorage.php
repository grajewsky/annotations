<?php

namespace Grajewsky\Annotations\Interfaces;

use Grajewsky\Annotations\Interfaces\Annotation;


interface AnnotationsStorage {

    /**
     * Put all annotations by $label namespace
     * @return void
     */
    public function putAll(string $label, array $annotions): void;

    /**
     * Add label by namespace
     * @return void
     */
    public function add(string $label, Annotation $annotation) : void;

    /**
     * @return Array<Annotation> | null
     */
    public function get(string $label): ?array;
}