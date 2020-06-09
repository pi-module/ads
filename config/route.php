<?php
/**
 * Pi Engine (http://piengine.org)
 *
 * @link            http://code.piengine.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://piengine.org
 * @license         http://piengine.org/license.txt New BSD License
 */

/**
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */
return [
    // route ads
    'ads' => [
        'name'    => 'ads',
        'type'    => 'Module\Ads\Route\Ads',
        'options' => [
            'route'    => '/ads',
            'defaults' => [
                'module'     => 'ads',
                'controller' => 'index',
                'action'     => 'index',
            ],
        ],
    ],
];