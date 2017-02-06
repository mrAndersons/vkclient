<?php
/**
 * Copyright (c) 2016. SPb GBU IMC  (http://imc.spb.ru). All rights reserved.
 */

/**
 * Description of VkMessangerControllerFactory.php
 *
 * @company IMC.
 * @author Fedoseev V.V.(fedoseev.v@imc.spb.ru)
 */

namespace Messangers;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class MessangerControllerFactory
 *
 * @package Messangers
 */
class MessangersControllerFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return MessangersController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new MessangersController();
    }
}