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
    'admin' => array(
        'index' => array(
            'label' => __('Ads'),
            'route' => 'admin',
            'controller' => 'index',
            'action' => 'index',
        ),
        'category' => array(
            'label' => __('Category'),
            'route' => 'admin',
            'controller' => 'category',
            'action' => 'index',
        ),
        'view' => array(
            'label' => __('View log'),
            'route' => 'admin',
            'controller' => 'log',
            'action' => 'view',
        ),
        'click' => array(
            'label' => __('Click log'),
            'route' => 'admin',
            'controller' => 'log',
            'action' => 'click',
        ),
    ),
);