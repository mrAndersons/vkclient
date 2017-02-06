<?php
/**
 * Copyright (c) 2016. SPb GBU IMC  (http://imc.spb.ru). All rights reserved.
 */

/**
 * Description of AbstractActionController.php
 *
 * @company IMC.
 * @author Fedoseev V.V.(fedoseev.v@imc.spb.ru)
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController as ZendAbstractActionController;

/**
 * Class AbstractActionController
 *
 * @package Application\Controller
 */
abstract class AbstractActionController extends ZendAbstractActionController
{
    protected $em, $viewrenderer;
    public $base, $userParams, $query, $refUrl;

    /**
     * @return string
     */
    protected function backUrl()
    {
        /* @var $request \Zend\Http\PhpEnvironment\Request */
        $request = $this->getRequest();

        return base64_encode($request->getUri());
    }

    /**
     * @return string
     */
    protected function getBackUrl()
    {
        $backurl = $this->params()->fromQuery('backurl', null);
        if (empty($backurl)) {
            $backurl = '/';
        } else {
            $backurl = base64_decode($backurl);
        }
        return $backurl;
    }

    /**
     * Приводим имя Action к CamelCase
     * @param string $actionName
     * @return null|string
     */
    protected function actionToCamelCase($actionName)
    {
        if (!is_string($actionName)) {
            return null;
        }
        $result  = str_replace(array('.', '-', '_'), ' ', $actionName);
        $result  = ucwords($result);
        $result  = str_replace(' ', '', $result);
        $result  = lcfirst($result);
        return $result;
    }

    /**
     * Вернуть менеджер сущностей DoctrineORM
     * @return Doctrine\ORM\EntityManager
     */
    protected function getEntityManager() {
        if (null === $this->em) {
            $this->setEntityManager($this->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
        }
        return $this->em;
    }

    /**
     * Установить менеджер сущностей DoctrineORM
     * @param type $em
     * @return \User\Controller\MyAbstractController
     */
    protected function setEntityManager($em) {
        $this->em = $em;
        return $this;
    }

    /**
     * Возвращает репозиторий DoctrineORM
     * @param string $key
     * @return \Doctrine\ORM\EntityRepository $repository
     */
    public function getRepository($key) {
        return $this->getEntityManager()->getRepository($key);
    }

}