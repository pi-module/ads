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

class MobileForm extends BaseForm
{
	public function __construct($name = null)
    {
        parent::__construct($name);
    }

    public function getInputFilter()
    {
        if (!$this->filter) {
            $this->filter = new MobileFilter;
        }
        return $this->filter;
    }

    public function init()
    {
        // id
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));
        // device
        $this->add(array(
            'name' => 'device',
            'attributes' => array(
                'type' => 'hidden',
                'value' => 'mobile',
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
        // image_mobile_1
        $this->add(array(
            'name' => 'image_mobile_1',
            'options' => array(
                'label' => __('Image 1'),
            ),
            'attributes' => array(
                'type' => 'url',
                'description' => '',
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
        // time_publish
        $this->add(array(
            'name' => 'time_publish',
            'options' => array(
                'label' => __('Publish time'),
            ),
            'attributes' => array(
                'type' => 'text',
                'value' => date('Y-m-d'),
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
                'value' => date('Y-m-d', strtotime('+1 month')),
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