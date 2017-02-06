<?php
/**
 * Copyright (c) 2016. SPb GBU IMC  (http://imc.spb.ru). All rights reserved.
 */

/**
 * Description of route.config.php
 *
 * @company IMC.
 * @author Fedoseev V.V.(fedoseev.v@imc.spb.ru)
 */

namespace Messangers;

return [
    'router' => [
        'routes' => [
            'messangers' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/messangers[/:action]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ],
                    'defaults' => [
                        'controller' => MessangersController::class,
                        'action' => 'Index'
                    ]
                ]
            ]
        ]
    ]
];