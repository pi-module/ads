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

namespace Module\Ads\Controller\Admin;

use Module\Ads\Form\CategoryFilter;
use Module\Ads\Form\CategoryForm;
use Pi;
use Pi\Mvc\Controller\ActionController;

class CategoryController extends ActionController
{
    public function indexAction()
    {
        $order  = ['id DESC'];
        $select = $this->getModel('category')->select()->order($order);
        $rowset = $this->getModel('category')->selectWith($select);
        foreach ($rowset as $row) {
            $list[$row->id] = $row->toArray();
        }
        // Set view
        $this->view()->setTemplate('category-index');
        $this->view()->assign('list', $list);
    }

    public function updateAction()
    {
        // Get id
        $id = $this->params('id');
        // Set form
        $form = new CategoryForm('category');
        if ($this->request->isPost()) {
            $data = $this->request->getPost();
            $form->setInputFilter(new CategoryFilter);
            $form->setData($data);
            if ($form->isValid()) {
                $values = $form->getData();
                // Save values
                if (!empty($values['id'])) {
                    $row = $this->getModel('category')->find($values['id']);
                } else {
                    $row = $this->getModel('category')->createRow();
                }
                $row->assign($values);
                $row->save();
                // jump
                $message = __('Category data saved successfully.');
                $url     = ['action' => 'index'];
                $this->jump($url, $message);
            }
        } else {
            if ($id) {
                $values = $this->getModel('category')->find($id)->toArray();
                $form->setData($values);
            }
        }
        // Set view
        $this->view()->setTemplate('category-update');
        $this->view()->assign('form', $form);
        $this->view()->assign('title', __('Add a Category'));
    }
}