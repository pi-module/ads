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
use Pi\Form\Form as BaseForm;

class AdsForm extends BaseForm
{
    public function __construct($name = null, $option = [])
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
        // id
        $this->add([
            'name'       => 'id',
            'attributes' => [
                'type' => 'hidden',
            ],
        ]);
        // title
        $this->add([
            'name'       => 'title',
            'options'    => [
                'label' => __('Title'),
            ],
            'attributes' => [
                'type'        => 'text',
                'description' => '',
                'required'    => true,
            ],
        ]);
        // url
        $this->add([
            'name'       => 'url',
            'options'    => [
                'label' => __('Url'),
            ],
            'attributes' => [
                'type'        => 'url',
                'description' => '',
                'required'    => true,
            ],
        ]);
        // Check type and device
        switch ($this->option['typeDevice']) {
            case 'image-web':
                // image_web
                $this->add([
                    'name'       => 'image_web',
                    'options'    => [
                        'label' => __('Image'),
                    ],
                    'attributes' => [
                        'type'        => 'url',
                        'description' => '',
                        'required'    => true,
                    ],
                ]);
                break;

            case 'image-mobile':
                // image_mobile_1
                $this->add([
                    'name'       => 'image_mobile_1',
                    'options'    => [
                        'label' => __('Image 1'),
                    ],
                    'attributes' => [
                        'type'        => 'url',
                        'description' => '',
                        'required'    => true,
                    ],
                ]);
                // image_mobile_2
                $this->add([
                    'name'       => 'image_mobile_2',
                    'options'    => [
                        'label' => __('Image 2'),
                    ],
                    'attributes' => [
                        'type'        => 'url',
                        'description' => '',
                    ],
                ]);
                // image_mobile_3
                $this->add([
                    'name'       => 'image_mobile_3',
                    'options'    => [
                        'label' => __('Image 3'),
                    ],
                    'attributes' => [
                        'type'        => 'url',
                        'description' => '',
                    ],
                ]);
                break;

            case 'html-web':
                // html
                $this->add([
                    'name'       => 'html',
                    'options'    => [
                        'label' => __('Html ads'),
                    ],
                    'attributes' => [
                        'type'        => 'textarea',
                        'rows'        => '5',
                        'cols'        => '40',
                        'description' => __('Put valid HTML code'),
                        'required'    => true,
                    ],
                ]);
                break;

            case 'script-web':
                // script
                $this->add([
                    'name'       => 'script',
                    'options'    => [
                        'label' => __('Script ads'),
                    ],
                    'attributes' => [
                        'type'        => 'textarea',
                        'rows'        => '5',
                        'cols'        => '40',
                        'description' => __('Put valid Java Script code, without <script> and </script>'),
                        'required'    => true,
                    ],
                ]);
                break;
        }
        // category
        $this->add([
            'name'       => 'category',
            'type'       => 'Module\Ads\Form\Element\Category',
            'options'    => [
                'label' => __('Category'),
            ],
            'attributes' => [
                'size'     => 1,
                'multiple' => 0,
                'required' => true,
            ],
        ]);
        // time_publish
        $this->add([
            'name'       => 'time_publish',
            'options'    => [
                'label' => __('Publish time'),
            ],
            'attributes' => [
                'type'     => 'text',
                'value'    => date('Y-m-d'),
                'required' => true,
            ],
        ]);
        // time_expire
        $this->add([
            'name'       => 'time_expire',
            'options'    => [
                'label' => __('Expire time'),
            ],
            'attributes' => [
                'type'     => 'text',
                'value'    => date('Y-m-d', strtotime('+6 month')),
                'required' => true,
            ],
        ]);
        // status
        $this->add([
            'name'       => 'status',
            'type'       => 'select',
            'options'    => [
                'label'         => __('Status'),
                'value_options' => [
                    1 => __('Published'),
                    2 => __('Pending review'),
                    3 => __('Draft'),
                    4 => __('Private'),
                ],
            ],
            'attributes' => [
                'required' => true,
            ],
        ]);
        // Save
        $this->add([
            'name'       => 'submit',
            'type'       => 'submit',
            'attributes' => [
                'value' => __('Submit'),
            ],
        ]);
    }
}