<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 */

/**
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */
return [
    // Admin section
    'admin' => [
        [
            'title'      => _a('Ads'),
            'controller' => 'index',
            'permission' => 'index',
        ],
        [
            'title'      => _a('Category'),
            'controller' => 'category',
            'permission' => 'category',
        ],
        [
            'title'      => _a('Logs'),
            'controller' => 'log',
            'permission' => 'log',
        ],
    ],
];