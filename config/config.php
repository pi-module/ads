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
            'title' => _a('Admin'),
            'name' => 'admin'
        ),
        array(
            'title' => _a('Mobile'),
            'name' => 'mobile'
        ),

    ),
    'item' => array(
        // Admin
        'admin_perpage' => array(
            'category' => 'admin',
            'title' => _a('Perpage'),
            'description' => '',
            'edit' => 'text',
            'filter' => 'number_int',
            'value' => 50
        ),
        // Show
        'mobile_ads_type' => array(
            'title' => _a('Ads type'),
            'description' => ' ',
            'edit' => array(
                'type' => 'select',
                'options' => array(
                    'options' => array(
                        0 => _a('Off - Dont show ads on mobile aplication'),
                        1 => _a('Online - Use online ads service'),
                        2 => _a('Module - Use ads module'),
                        3 => _a('Random - Select random between Online and module'),
                    ),
                ),
            ),
            'filter' => 'string',
            'value' => 0,
            'category' => 'mobile',
        ),
    ),
);        