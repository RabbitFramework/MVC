<?php

namespace Rabbit\MVC;

use Rabbit\DependencyContainer\DependencyContainer;

abstract class Controller implements ControllerInterface
{

    public function loadView(string $viewClass, string $viewAlias) {
        $this->$viewAlias = DependencyContainer::getInstance()->get($viewClass)->getInstance();
    }

    public function loadModel(string $modelName, string $modelAlias) {
        $this->$modelAlias = DependencyContainer::getInstance()->get($modelName)->getInstance();
    }
}