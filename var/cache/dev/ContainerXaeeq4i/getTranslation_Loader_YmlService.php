<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'translation.loader.yml' shared service.

include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\Loader\\LoaderInterface.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\Loader\\ArrayLoader.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\Loader\\FileLoader.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\Loader\\YamlFileLoader.php';

return $this->services['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader();
