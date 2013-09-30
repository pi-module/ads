<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 */

/**
 * Module meta
 *
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */
return array(
    // route name
    'ads'  => array(
        'section'   => 'front',
        'priority'  => 10,

        'type'      => 'Module\Ads\Route\Ads',
        'options'   => array(
            'route'     => '/ads',
            'defaults'  => array(
                'module'        => 'ads',
                'controller'    => 'index',
                'action'        => 'index'
            )
        ),
    )
);
