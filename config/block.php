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
	// Random block
    'random' => array(
        'title'         => _a('Random ads'),
        'description'   => '',
        'render'        => 'block::random',
        'template'      => 'random',
        'config'        => array(
            'number' => array(
                'title'         =>  _a('Number'),
                'description'   => '',
                'edit'          => 'text',
                'filter'        => 'number_int',
                'value'         => 1,
            ),
            'category' => array(
                'title'         => _a('Select category'),
                'description'   => '',
                'edit'          => 'Module\Ads\Form\Element\Category',
                'filter'        => 'number_int',
                'value'         => 0,
            ),
        ),
    ),
    // Select block
    'select' => array(
        'title'         => _a('Selected ads'),
        'description'   => '',
        'render'        => 'block::select',
        'template'      => 'select',
        'config'        => array(
            'propaganda' => array(
                'title'         => _a('Select ads'),
                'description'   => '',
                'edit'          => 'Module\Ads\Form\Element\Propaganda',
                'filter'        => 'number_int',
                'value'         => 0,
            ),
        ),
    ),
);	