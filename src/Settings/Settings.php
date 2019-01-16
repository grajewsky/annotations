<?php 


namespace Grajewsky\Annotations\Settings;

use Grajewsky\Annotations\Interfaces\AnnotationsStorage;
use Grajewsky\Annotations\Storages\ArraysAnnotationsStorage;
use Grajewsky\Annotations\Interfaces\Settings as SettingsInterface;
use Grajewsky\Annotations\Providers\DocBlockAnnotationsProvider;
use Grajewsky\Annotations\Parsers\AnnotationParser;

final class Settings implements SettingsInterface {
    /**
     * @var Grajewsky\Annotations\Interfaces\AnnotationsStorage
     */
    private $storage;

    /** 
     * Strict types for annotations. If You choose object then you use strict types, so you must define annotations Classes
     * @var Enum<array|strict>
     */
    private $strict = "array";

    private $_strictTypes = array("array", "strict");

    /**
     * AnnotationProvider
     *
     * @var Grajewsky\Annotations\Interfaces\AnnotationsProvider
     */
    private $provider;
    
    public function __construct() {
        $this->setStrict("array");
        $this->setStorage(new ArraysAnnotationsStorage());
        
        $annotationsProvider = new DocBlockAnnotationsProvider();
        $annotationsProvider->setParser(new AnnotationParser());

        $this->setAnnotationProviders($annotationsProvider);
    }
    public function setStrict(string $strictType): void {
        if(\in_array($strictType, $this->_strictTypes)) {
            $this->strict = $strictType;
        }
    }
    public function getStrict(): string {
        return $this->strict;
    }
    public function getStorage(): AnnotationsStorage {
        return $this->storage;
    }
    public function setStorage(AnnotationsStorage $storage): void {
        $this->storage = $storage;
    }

    public function setAnnotationProviders(AnnotationsProvider $provider) {
        $this->provider = $provider;
    }
    public function getAnnotationsProvider(): AnnotationsProvider {
        return $this->provider;
    }
}
