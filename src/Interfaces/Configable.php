<?php

namespace Grajewsky\Annotations\Interfaces;

interface Configable {
    public function setConfig(array $data);
    public function getConfig(): array;

}