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
            'title' => __('Mobile'),
            'name' => 'mobile'
        ),

    ),
    'item' => array(
        // Show
        'mobile_ads_type' => array(
            'title' => __('Ads type'),
            'description' => ' ',
            'edit' => array(
                'type' => 'select',
                'options' => array(
                    'options' => array(
                        0 => __('Off - Dont show ads on mobile aplication'),
                        1 => __('Online - Use online ads service'),
                        2 => __('Module - Use ads module'),
                    ),
                ),
            ),
            'filter' => 'string',
            'value' => 0,
            'category' => 'show',
        ),
    ),
);        