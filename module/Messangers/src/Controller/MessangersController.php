<?php
/**
 * Copyright (c) 2016. SPb GBU IMC  (http://imc.spb.ru). All rights reserved.
 */

/**
 * Description of MessangersController.php
 *
 * @company IMC.
 * @author Fedoseev V.V.(fedoseev.v@imc.spb.ru)
 */

namespace Messangers;


use Application\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class MessangersController
 *
 * @package Messangers
 */
class MessangersController extends AbstractActionController
{

    /**
     * @return ViewModel
     */
    public function IndexAction()
    {
        $view = new ViewModel();
//        $view->setTemplate('messangers/index');
        return $view;
    }
}