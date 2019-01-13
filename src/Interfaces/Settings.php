<?php 


namespace Grajewsky\Annotations\Interfaces;

use Grajewsky\Annotations\Interfaces\AnnotationsStorage;

interface Settings {
    public function setStorage(AnnotationsStorage $as): void;
    public function getStorage(): AnnotationsStorage;

    public function setStrict(string $s): void; 

    /** 
     * @return Enum<string>("array"|"strict")
     */
    public function getStrict(): string; 
}