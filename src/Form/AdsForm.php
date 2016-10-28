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
use Pi\Form\Form as BaseForm;

class AdsForm extends BaseForm
{
	public function __construct($name = null, $option = array())
    {
        $this->option = $option;
        parent::__construct($name);
    }

    public function getInputFilter()
    {
        if (!$this->filter) {
            $this->filter = new AdsFilter($this->option);
        }
        return $this->filter;
    }

    public function init()
    {
        print_r($this->option);

        // id
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));
        // title
        $this->add(array(
            'name' => 'title',
            'options' => array(
                'label' => __('Title'),
            ),
            'attributes' => array(
                'type' => 'text',
                'description' => '',
                'required' => true,
            )
        ));
        // url
        $this->add(array(
            'name' => 'url',
            'options' => array(
                'label' => __('Url'),
            ),
            'attributes' => array(
                'type' => 'url',
                'description' => '',
            )
        ));
        // Check type and device
        switch ($this->option['typeDevice']) {
            case 'image-web':
                // image_web
                $this->add(array(
                    'name' => 'image_web',
                    'options' => array(
                        'label' => __('Image'),
                    ),
                    'attributes' => array(
                        'type' => 'url',
                        'description' => '',
                        'required' => true,
                    )
                ));

                break;

            case 'image-mobile':
                // image_mobile_1
                $this->add(array(
                    'name' => 'image_mobile_1',
                    'options' => array(
                        'label' => __('Image 1'),
                    ),
                    'attributes' => array(
                        'type' => 'url',
                        'description' => '',
                        'required' => true,
                    )
                ));
                // image_mobile_2
                $this->add(array(
                    'name' => 'image_mobile_2',
                    'options' => array(
                        'label' => __('Image 2'),
                    ),
                    'attributes' => array(
                        'type' => 'url',
                        'description' => '',
                    )
                ));
                // image_mobile_3
                $this->add(array(
                    'name' => 'image_mobile_3',
                    'options' => array(
                        'label' => __('Image 3'),
                    ),
                    'attributes' => array(
                        'type' => 'url',
                        'description' => '',
                    )
                ));
                break;

            case 'html-web':
                // html
                $this->add(array(
                    'name' => 'html',
                    'options' => array(
                        'label' => __('Html ads'),
                    ),
                    'attributes' => array(
                        'type' => 'textarea',
                        'rows' => '5',
                        'cols' => '40',
                        'description' => __('Put valid HTML code'),
                        'required' => true,
                    )
                ));
                break;

            case 'script-web':
                // script
                $this->add(array(
                    'name' => 'script',
                    'options' => array(
                        'label' => __('Script ads'),
                    ),
                    'attributes' => array(
                        'type' => 'textarea',
                        'rows' => '5',
                        'cols' => '40',
                        'description' => __('Put valid Java Script code, without <script> and </script>'),
                        'required' => true,
                    )
                ));
                break;
        }
        // category
        $this->add(array(
            'name' => 'category',
            'type' => 'Module\Ads\Form\Element\Category',
            'options' => array(
                'label' => __('Category'),
            ),
            'attributes' => array(
                'size' => 1,
                'multiple' => 0,
                'required' => true,
            ),
        ));
        // time_publish
        $this->add(array(
            'name' => 'time_publish',
            'options' => array(
                'label' => __('Publish time'),
            ),
            'attributes' => array(
                'type' => 'text',
                'value' => date('Y-m-d'),
                'required' => true,
            )
        ));
        // time_expire
        $this->add(array(
            'name' => 'time_expire',
            'options' => array(
                'label' => __('Expire time'),
            ),
            'attributes' => array(
                'type' => 'text',
                'value' => date('Y-m-d', strtotime('+6 month')),
                'required' => true,
            )
        ));
        // status
        $this->add(array(
            'name' => 'status',
            'type' => 'select',
            'options' => array(
                'label' => __('Status'),
                'value_options' => array(
                    1 => __('Published'),
                    2 => __('Pending review'),
                    3 => __('Draft'),
                    4 => __('Private'),
                ),
            ),
            'attributes' => array(
                'required' => true,
            )
        ));
        // Save
        $this->add(array(
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => array(
                'value' => __('Submit'),
            )
        ));
    }
}