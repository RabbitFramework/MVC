<?php

namespace Rabbit\MVC;

use Rabbit\ORM\Repository\EntityManager;

abstract class Controller implements ControllerInterface
{

   protected $entityManager;

   public function __construct()
   {
       $this->entityManager = EntityManager::getInstance();
   }

    public function getEntityManager() {
        return $this->entityManager;
    }

}