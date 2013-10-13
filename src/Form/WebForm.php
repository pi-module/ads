<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt New BSD License
 */

/**
 * Module meta
 *
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */ 

namespace Module\Ads\Form;

use Pi;
use Pi\Form\Form as BaseForm;

class WebForm extends BaseForm
{
	public function __construct($name = null)
    {
        parent::__construct($name);
    }

    public function getInputFilter()
    {
        if (!$this->filter) {
            $this->filter = new WebFilter;
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
                'value' => 'web',
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
                'class' => 'span6',
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
                'class' => 'span6',
            )
        ));
        // image_web
        $this->add(array(
            'name' => 'image_web',
            'options' => array(
                'label' => __('Image'),
            ),
            'attributes' => array(
                'type' => 'url',
                'description' => '',
                'class' => 'span6',
            )
        ));
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