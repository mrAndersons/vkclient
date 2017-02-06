<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Controller\IndexController;

return array_merge(
    include(__DIR__ . '/route.config.php'),
    [
        'service_manager' => array(
            'abstract_factories' => array(
                'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
                'Zend\Log\LoggerAbstractServiceFactory',
            ),
            'factories' => array(
                'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
            ),
        ),
        'translator' => array(
            'locale' => 'ru_RU',
            'translation_file_patterns' => array(
                array(
                    'type' => 'gettext',
                    'base_dir' => __DIR__ . '/../language',
                    'pattern' => '%s.mo',
                ),
            ),
        ),
        'controllers' => array(
            'invokables' => array(
                'Application\Controller\Index' => Controller\IndexController::class
            ),
        ),
        'view_manager' => array(
            'display_not_found_reason' => true,
            'display_exceptions' => true,
            'doctype' => 'HTML5',
            'not_found_template' => 'error/404',
            'exception_template' => 'error/index',
            'template_map' => array(
                'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
                'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
                'error/404' => __DIR__ . '/../view/error/404.phtml',
                'error/index' => __DIR__ . '/../view/error/index.phtml',
            ),
            'template_path_stack' => array(
                __DIR__ . '/../view',
            ),
        ),
        // Placeholder for console routes
        'console' => array(
            'router' => array(
                'routes' => array(),
            ),
        ),

        // ASSETS
//        'assetic_configuration' => [
//            'default' => [
////                'assets' => [
////                    '@applic_css', '@applic_js'
////                ],
//                'options' => [
//                    'mixin' => true
//                ],
//            ],
//            'controllers' => [
//                IndexController::class => [
//                    '@applic_css', '@applic_js'
//                ]
//            ],
//            'modules' => [
//                'application' => [
//                    'root_path' => __DIR__ . '/../assets',
//                    'collections' => [
//                        'applic_css' => [
//                            'assets' => [
//                                'css/application.css'
//                            ],
//                            'options' => []
//                        ],
//                        'applic_js' => [
//                            'assets' => [
//                                'js/application.js'
//                            ],
//                            'options' => []
//                        ]
//                    ]
//                ]
//            ]
//        ]
    ]
);
