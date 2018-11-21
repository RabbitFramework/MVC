<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04/11/2018
 * Time: 19:10
 */

namespace Xirion\MVC;

use Xirion\DependencyInjector\DependencyContainer;

class Controller implements \ControllerInterface
{

    public function loadModel(string $modelName) {
        $this->$modelName = DependencyContainer::getInstance()->getClass($modelName);
    }

}