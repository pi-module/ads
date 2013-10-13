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
	// Random block
    'random' => array(
        'title' => __('Random ads'),
        'description' => '',
        'render' => array('block', 'random'),
        'template' => 'random',
        'config' => array(
            'category' => array(
                'title' => __('Select category'),
                'description' => '',
                'edit' => 'Module\Ads\Form\Element\Category',
                'filter' => 'number_int',
                'value' => 0,
            ),
        ),
    ),
    // Select block
    'select' => array(
        'title' => __('Select ads'),
        'description' => '',
        'render' => array('block', 'select'),
        'template' => 'select',
        'config' => array(
            'propaganda' => array(
                'title' => __('Select ads'),
                'description' => '',
                'edit' => 'Module\Ads\Form\Element\Propaganda',
                'filter' => 'number_int',
                'value' => 0,
            ),
        ),
    ),
);	