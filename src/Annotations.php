<?php 

namespace Grajewsky\Annotations;

use ReflectionClass;
use Grajewsky\Annotations\Interfaces\Settings;
use Grajewsky\Annotations\Interfaces\AnnotationsProvider;
use Grajewsky\Annotations\Settings\Settings as SettingsImpl;
use Grajewsky\Annotations\Interfaces\Annotation;


final class Annotations {
    /** 
     * @var Grajewsky\Annotations\Interfaces\Settings
     */
    private $settings;

    public function __construct($class, ?Settings $settings = null) {
        self::load($this, $class, $settings);
    }
    public static function read($class, ?Settings $settings = null): Annotations {
        $annotation = new self($class, $settings);
        return $annotation;

    }
    private static function load(Annotations $annotation, $class, ?Settings $settings = null): Annotations {
        if (!\is_null($settings)) {
            $annotation->setSettings($settings);
        } else {
            $annotation->setSettings(new SettingsImpl());
        }
        $annotation->readClassAnnotations($class);
        return $annotation;
    }
    public function getSettings(): Settings {
        return $this->settings;
    }
    public function setSettings(Settings $settings) {
        $this->settings = $settings;
    }

    /** 
     * @return Array<Annotation>
     */
    public function annotations(?string $accessor = null) : array {
        $storage = $this->getSettings()->getStorage();
        if(\is_null($accessor)) {
            return $storage->get("class");
        } else {
            return $storage->get($accessor);
        }
    }
    private function readClassAnnotations($class) {
        $provider = $this->getSettings()->getAnnotationsProvider();
        if(\class_exists($class, true)) {
            $storage = $this->getSettings()->getStorage();
            $rf = new ReflectionClass($class);
            $annotations = $provider->getAnnotations($rf->getDocComment());
            foreach($annotations as $annotation) {
                if($annotation instanceof \Grajewsky\Annotations\Interfaces\Annotation) {
                    $storage->add("class", $annotation);
                }
            }
            $this->readFieldsAnnotations($rf->getProperties());
            $this->readFieldsAnnotations($rf->getMethods());
        }
    }
    private function readFieldsAnnotations(?array $fieldsProperties) {
        $provider = $this->getSettings()->getAnnotationsProvider();
        if (\is_null($fieldsProperties) || count($fieldsProperties) > 0) {
            $storage = $this->getSettings()->getStorage();
            foreach ($fieldsProperties as $reflectField) {
                $annotations = $provider->getAnnotations($reflectField->getDocComment());
                foreach($annotations as $annotation) {
                    if($annotation instanceof \Grajewsky\Annotations\Interfaces\Annotation) {
                        $storage->add($reflectField->getName(), $annotation);
                    }
                }   
            }
        }
    }
}