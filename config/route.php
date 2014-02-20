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
return array(
    // route ads
    'ads' => array(
        'name'    => 'ads',
        'type'    => 'Module\Ads\Route\Ads',
        'options' => array(
            'route'    => '/ads',
            'defaults' => array(
                'module'     => 'ads',
                'controller' => 'index',
                'action'     => 'index'
            )
        ),
    )
);