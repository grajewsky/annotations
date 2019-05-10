<?php

namespace Annotations\Interfaces;

use Annotations\Interfaces\Annotation;
use Annotations\Interfaces\Configable;


interface AnnotationsStorage extends Configable {

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

    /** 
     * @return Array<String, Annotation>
     */
    public function getAll() : array;
}