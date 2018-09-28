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
    // Random block
    'random' => [
        'title'       => _a('Random ads'),
        'description' => '',
        'render'      => 'block::random',
        'template'    => 'random',
        'config'      => [
            'number'   => [
                'title'       => _a('Number'),
                'description' => '',
                'edit'        => 'text',
                'filter'      => 'number_int',
                'value'       => 1,
            ],
            'category' => [
                'title'       => _a('Select category'),
                'description' => '',
                'edit'        => 'Module\Ads\Form\Element\Category',
                'filter'      => 'number_int',
                'value'       => 0,
            ],
        ],
    ],
    // Select block
    'select' => [
        'title'       => _a('Selected ads'),
        'description' => '',
        'render'      => 'block::select',
        'template'    => 'select',
        'config'      => [
            'propaganda' => [
                'title'       => _a('Select ads'),
                'description' => '',
                'edit'        => 'Module\Ads\Form\Element\Propaganda',
                'filter'      => 'number_int',
                'value'       => 0,
            ],
        ],
    ],
];	