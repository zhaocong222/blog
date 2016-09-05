<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 16-9-5
 * Time: 下午2:34
 */
return [
    'drive'=>'file',

    'stores'=>[

        'file'=>[
            'driver'=>'file',
            'path' => base_path.'/store/',

        ],

        'redis'=>[
            'driver'=>'redis',
            'connect'=>[
                'host'=>'127.0.0.1',
                'port'=>'6379'
            ]
        ],

        'memcached'=>[
            'driver'=>'memcached',
            'connect'=>[
                'host'=>'127.0.0.1',
                'port'=>'11211'
            ]
        ]
    ],

    'prefix' => 'mycache',
];