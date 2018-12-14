<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14/12/2018
 * Time: 15:21
 */

namespace Rabbit\MVC;

interface ViewInterface
{

    public function setParameter(string $name, $value);

    public function setParameters($parameters);

    public function render(string ...$templates);

}