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
    'category' => array(
        array(
            'title'  => _a('Admin'),
            'name'   => 'admin'
        ),
        array(
            'title'  => _a('Mobile'),
            'name'   => 'mobile'
        ),

    ),
    'item' => array(
        // Admin
        'admin_perpage' => array(
            'category'     => 'admin',
            'title'        => _a('Perpage'),
            'description'  => '',
            'edit'         => 'text',
            'filter'       => 'number_int',
            'value'        => 50
        ),
        // Mobile
        'mobile_ads_type' => array(
            'title'        => _a('Ads type'),
            'description'  => ' ',
            'edit'         => array(
                'type'        => 'select',
                'options'     => array(
                    'options' => array(
                        0     => _a('Off - Dont show ads on mobile aplication'),
                        1     => _a('Online - Use online ads service'),
                        2     => _a('Module - Use ads module'),
                        3     => _a('Random - Select random between Online and module'),
                    ),
                ),
            ),
            'filter'       => 'string',
            'value'        => 0,
            'category'     => 'mobile',
        ),
        'mobile_random' => array(
            'title'        => _a('Percentage Show'),
            'description'  => _a('Percentage Show ads between website and online service'),
            'edit'         => array(
                'type'     => 'select',
                'options'  => array(
                    'options' => array(
                        '1-9' => _a('10% website and 90% online'),
                        '2-8' => _a('20% website and 80% online'),
                        '3-7' => _a('30% website and 70% online'),
                        '4-6' => _a('40% website and 60% online'),
                        '5-5' => _a('50% website and 50% online'),
                        '6-4' => _a('60% website and 40% online'),
                        '7-3' => _a('70% website and 30% online'),
                        '8-2' => _a('80% website and 20% online'),
                        '9-1' => _a('90% website and 10% online'),
                    ),
                ),
            ),
            'filter'      => 'string',
            'value'       => '5-5',
            'category'    => 'mobile',
        ),
    ),
);        