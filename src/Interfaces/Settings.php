<?php 


namespace Annotations\Interfaces;

use Annotations\Interfaces\AnnotationsStorage;
use Annotations\Interfaces\AnnotationsProvider;

interface Settings {
    public function setStorage(AnnotationsStorage $as): void;
    public function getStorage(): AnnotationsStorage;

    public function setStrict(string $s): void; 

    /** 
     * @return Enum<string>("array"|"strict")
     */
    public function getStrict(): string; 
    
    public function setAnnotationProviders(AnnotationsProvider $provider);
    public function getAnnotationsProvider(): AnnotationsProvider;
}