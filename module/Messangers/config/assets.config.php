<?php
/**
 * Copyright (c) 2016. SPb GBU IMC  (http://imc.spb.ru). All rights reserved.
 */

/**
 * Description of assets.config.php
 *
 * @company IMC.
 * @author Fedoseev V.V.(fedoseev.v@imc.spb.ru)
 */

namespace Messangers;

return [
    'assetic_configuration' => [
        'debug' => true,
        'controllers' => [
            MessangersController::class => [
                '@messangers_css',
                '@messangers_js'
            ]
        ],

        'modules' => [
            'messangers' => [
                'root_path' => __DIR__ . '/../assets',
                'collections' => [
                    'messangers_css' => [
                        'assets' => [
                            'css/messangers.css'
                        ]
                    ],
                    'messangers_js' => [
                        'assets' => [
                            'js/messangers.js'
                        ]
                    ]
                ]
            ]
        ]
    ]
];