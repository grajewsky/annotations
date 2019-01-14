<?php 

namespace Grajewsky\Annotations;

use ReflectionClass;
use Grajewsky\Annotations\Interfaces\Settings;
use Grajewsky\Annotations\Interfaces\AnnotationsProvider;
use Grajewsky\Annotations\Settings\Settings as SettingsImpl;


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

    private function readClassAnnotations($class) {
        $providers = array(
            \Grajewsky\Annotations\Providers\DocBlockAnnotationsProvider::class
        );
        if(\class_exists($class, true)) {
            $rf = new ReflectionClass($class);
            foreach ($providers as $providerClass) {
                $provider = new $providerClass;
                if($provider instanceof AnnotationsProvider) {
                    $provider->getAnnotations($rf->getDocComment());
                }
            }
        }
    }
}