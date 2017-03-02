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
        'default' => [
            'options' => [
                'mixin' => true
            ],
        ],
        'controllers' => [
            MessangersController::class => [
                '@lib_scroll_css',
                '@messangers_css',

                '@lib_scroll_js1',
                '@lib_scroll_js2',
                '@messangers_js',
            ]
        ],

        'modules' => [
            'messangers' => [
                'root_path' => __DIR__ . '/../assets',
                'collections' => [
                    // LIB
                    'lib_scroll_css' => [
                        'assets' => [
                            'lib/scrollbar/css/jquery.jscrollpane.css',
                        ]
                    ],
                    'lib_scroll_js1' => [
                        'assets' => [
                            'lib/scrollbar/js/jquery.jscrollpane.min.js',
                        ]
                    ],
                    'lib_scroll_js2' => [
                        'assets' => [
                            'lib/scrollbar/js/jquery.mousewheel.js',
                        ]
                    ],

                    // MODULE
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