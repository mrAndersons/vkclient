<?php
/**
 * Copyright (c) 2016. SPb GBU IMC  (http://imc.spb.ru). All rights reserved.
 */

/**
 * Description of module.config.php
 *
 * @company IMC.
 * @author Fedoseev V.V.(fedoseev.v@imc.spb.ru)
 */

namespace Messangers;

return array_merge(
    include __DIR__ . '/route.config.php',
    include __DIR__ . '/assets.config.php',

    [
        'view_manager' => [
            'template_map' => include __DIR__ . '/../template_map.php',
            'template_path_stack' => [
                'messanger' => __DIR__ . '/../view/',
            ],
            'strategies' => [
                'ViewJsonStrategy',
            ],
        ],

        'controllers' => [
            'factories' => [
                MessangersController::class => MessangersControllerFactory::class
            ]
        ]
    ]
);