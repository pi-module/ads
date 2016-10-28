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

namespace Module\Ads\Form;

use Pi;
use Zend\InputFilter\InputFilter;

class AdsFilter extends InputFilter
{
    public function __construct($option = array())
    {
        // id
        $this->add(array(
            'name' => 'id',
            'required' => false,
        ));
        // title
        $this->add(array(
            'name' => 'title',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // url
        $this->add(array(
            'name' => 'url',
            'required' => false,
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
            ),
        ));
        // Check type and device
        switch ($option['typeDevice']) {
            case 'image-web':
                // image_web
                $this->add(array(
                    'name' => 'image_web',
                    'required' => true,
                    'filters' => array(
                        array(
                            'name' => 'StringTrim',
                        ),
                    ),
                ));

                break;

            case 'image-mobile':
                // image_mobile_1
                $this->add(array(
                    'name' => 'image_mobile_1',
                    'required' => true,
                    'filters' => array(
                        array(
                            'name' => 'StringTrim',
                        ),
                    ),
                ));
                // image_mobile_2
                $this->add(array(
                    'name' => 'image_mobile_2',
                    'required' => false,
                    'filters' => array(
                        array(
                            'name' => 'StringTrim',
                        ),
                    ),
                ));
                // image_mobile_3
                $this->add(array(
                    'name' => 'image_mobile_3',
                    'required' => false,
                    'filters' => array(
                        array(
                            'name' => 'StringTrim',
                        ),
                    ),
                ));
                break;

            case 'html-web':
                // html
                $this->add(array(
                    'name' => 'html',
                    'required' => true,
                    'filters' => array(
                        array(
                            'name' => 'StringTrim',
                        ),
                    ),
                ));
                break;

            case 'script-web':
                // script
                $this->add(array(
                    'name' => 'script',
                    'required' => true,
                    'filters' => array(
                        array(
                            'name' => 'StringTrim',
                        ),
                    ),
                ));
                break;

        }
        // category
        $this->add(array(
            'name' => 'category',
            'required' => true,
        ));
        // time_publish
        $this->add(array(
            'name' => 'time_publish',
            'required' => true,
        ));
        // time_expire
        $this->add(array(
            'name' => 'time_expire',
            'required' => true,
        ));
        // status
        $this->add(array(
            'name' => 'status',
            'required' => true,
        ));
    }
}	