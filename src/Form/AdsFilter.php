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

namespace Module\Ads\Form;

use Pi;
use Laminas\InputFilter\InputFilter;

class AdsFilter extends InputFilter
{
    public function __construct($option = [])
    {
        // id
        $this->add([
            'name'     => 'id',
            'required' => false,
        ]);
        // title
        $this->add([
            'name'     => 'title',
            'required' => true,
            'filters'  => [
                [
                    'name' => 'StringTrim',
                ],
            ],
        ]);
        // url
        $this->add([
            'name'     => 'url',
            'required' => true,
            'filters'  => [
                [
                    'name' => 'StringTrim',
                ],
            ],
        ]);
        // Check type and device
        switch ($option['typeDevice']) {
            case 'image-web':
                // image_web
                $this->add([
                    'name'     => 'image_web',
                    'required' => true,
                    'filters'  => [
                        [
                            'name' => 'StringTrim',
                        ],
                    ],
                ]);

                break;

            case 'image-mobile':
                // image_mobile_1
                $this->add([
                    'name'     => 'image_mobile_1',
                    'required' => true,
                    'filters'  => [
                        [
                            'name' => 'StringTrim',
                        ],
                    ],
                ]);
                // image_mobile_2
                $this->add([
                    'name'     => 'image_mobile_2',
                    'required' => false,
                    'filters'  => [
                        [
                            'name' => 'StringTrim',
                        ],
                    ],
                ]);
                // image_mobile_3
                $this->add([
                    'name'     => 'image_mobile_3',
                    'required' => false,
                    'filters'  => [
                        [
                            'name' => 'StringTrim',
                        ],
                    ],
                ]);
                break;

            case 'html-web':
                // html
                $this->add([
                    'name'     => 'html',
                    'required' => true,
                    'filters'  => [
                        [
                            'name' => 'StringTrim',
                        ],
                    ],
                ]);
                break;

            case 'script-web':
                // script
                $this->add([
                    'name'     => 'script',
                    'required' => true,
                    'filters'  => [
                        [
                            'name' => 'StringTrim',
                        ],
                    ],
                ]);
                break;

        }
        // category
        $this->add([
            'name'     => 'category',
            'required' => true,
        ]);
        // time_publish
        $this->add([
            'name'     => 'time_publish',
            'required' => true,
        ]);
        // time_expire
        $this->add([
            'name'     => 'time_expire',
            'required' => true,
        ]);
        // status
        $this->add([
            'name'     => 'status',
            'required' => true,
        ]);
    }
}	