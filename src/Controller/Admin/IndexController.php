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

namespace Module\Ads\Controller\Admin;

use Pi;
use Pi\Mvc\Controller\ActionController;
use Module\Ads\Form\WebForm;
use Module\Ads\Form\WebFilter;
use Module\Ads\Form\MobileForm;
use Module\Ads\Form\MobileFilter;

class IndexController extends ActionController
{
    protected $propagandaColumns = array(
        'id', 'title', 'category', 'url', 'status', 'time_create', 'time_publish', 'time_expire', 
        'view', 'click', 'device', 'image_web', 'image_mobile_1', 'image_mobile_2', 'image_mobile_3'
    );
 
    public function indexAction()
    {
        // Set Info
        $order = array('time_create DESC', 'id DESC');
        $where1 = array('device' => 'web', 'status' => 1, 'time_publish < ?' => time(), 'time_expire > ?' => time());
        $where2 = array('device' => 'mobile', 'status' => 1, 'time_publish < ?' => time(), 'time_expire > ?' => time());
        $where3 = array('status' => 1, 'time_publish > ?' => time());
        $where4 = array('status' => 1, 'time_expire < ?' => time());
        $where5 = array('status != ?' => 1);
        // Get list 1
        $select = $this->getModel('propaganda')->select()->where($where1)->order($order);
        $rowset = $this->getModel('propaganda')->selectWith($select);
        foreach ($rowset as $row) {
            $list1[$row->id] = $row->toArray();
            $list1[$row->id]['image_url'] = $list1[$row->id]['image_web'];
            $list1[$row->id]['time_publish'] = _date($list1[$row->id]['time_publish']);
            $list1[$row->id]['time_expire'] = _date($list1[$row->id]['time_expire']);
        }
        // Get list 2
        $select = $this->getModel('propaganda')->select()->where($where2)->order($order);
        $rowset = $this->getModel('propaganda')->selectWith($select);
        foreach ($rowset as $row) {
            $list2[$row->id] = $row->toArray();
            $list2[$row->id]['image_url'] = $list2[$row->id]['image_mobile_1'];
            $list2[$row->id]['time_publish'] = _date($list2[$row->id]['time_publish']);
            $list2[$row->id]['time_expire'] = _date($list2[$row->id]['time_expire']);
        }
        // Get list 3
        $select = $this->getModel('propaganda')->select()->where($where3)->order($order);
        $rowset = $this->getModel('propaganda')->selectWith($select);
        foreach ($rowset as $row) {
            $list3[$row->id] = $row->toArray();
            $list3[$row->id]['image_url'] = ($list3[$row->id]['device'] == 'web') ? 
                                             $list3[$row->id]['image_web'] : $list3[$row->id]['image_mobile_1'];
            $list3[$row->id]['time_publish'] = _date($list3[$row->id]['time_publish']);
            $list3[$row->id]['time_expire'] = _date($list3[$row->id]['time_expire']);
        }
        // Get list 4
        $select = $this->getModel('propaganda')->select()->where($where4)->order($order);
        $rowset = $this->getModel('propaganda')->selectWith($select);
        foreach ($rowset as $row) {
            $list4[$row->id] = $row->toArray();
            $list4[$row->id]['image_url'] = ($list4[$row->id]['device'] == 'web') ? 
                                             $list4[$row->id]['image_web'] : $list4[$row->id]['image_mobile_1'];
            $list4[$row->id]['time_publish'] = _date($list4[$row->id]['time_publish']);
            $list4[$row->id]['time_expire'] = _date($list4[$row->id]['time_expire']);
        }
        // Get list 5
        $select = $this->getModel('propaganda')->select()->where($where5)->order($order);
        $rowset = $this->getModel('propaganda')->selectWith($select);
        foreach ($rowset as $row) {
            $list5[$row->id] = $row->toArray();
            $list5[$row->id]['image_url'] = ($list5[$row->id]['device'] == 'web') ? 
                                             $list5[$row->id]['image_web'] : $list5[$row->id]['image_mobile_1'];
            $list5[$row->id]['time_publish'] = _date($list5[$row->id]['time_publish']);
            $list5[$row->id]['time_expire'] = _date($list5[$row->id]['time_expire']);
        }
        // Set view
        $this->view()->setTemplate('ads_index');
        $this->view()->assign('list1', $list1);
        $this->view()->assign('list2', $list2);
        $this->view()->assign('list3', $list3);
        $this->view()->assign('list4', $list4);
        $this->view()->assign('list5', $list5);
    }

    public function webAction()
    {
        // check category
        $columns = array('count' => new \Zend\Db\Sql\Predicate\Expression('count(*)'));
        $select = Pi::model('category', $this->getModule())->select()->columns($columns);
        $categoryCount = Pi::model('category', $this->getModule())->selectWith($select)->current()->count;
        if (!$categoryCount) {
            return $this->redirect()->toRoute('', array(
                'controller' => 'category',
                'action' => 'update'
            ));
        }
        // Get id
        $id = $this->params('id');
        // Set form
        $form = new WebForm('web');
        $form->setAttribute('enctype', 'multipart/form-data');
        if ($this->request->isPost()) {
            $data = $this->request->getPost();
            $form->setInputFilter(new WebFilter);
            $form->setData($data);
            if ($form->isValid()) {
                $values = $form->getData();
                // Set just story fields
                foreach (array_keys($values) as $key) {
                    if (!in_array($key, $this->propagandaColumns)) {
                        unset($values[$key]);
                    }
                }
                // Set time
                if (empty($values['id'])) {
                    $values['time_create'] = time();
                }
                $values['time_publish'] = strtotime($values['time_publish']);
                $values['time_expire'] = strtotime($values['time_expire']);
                // Save values
                if (!empty($values['id'])) {
                    $row = $this->getModel('propaganda')->find($values['id']);
                } else {
                    $row = $this->getModel('propaganda')->createRow();
                }
                $row->assign($values);
                $row->save();

                $message = __('Ads data saved successfully.');
                $url = array('action' => 'index');
                $this->jump($url, $message);
            }
        } else {
            if ($id) {
                $values = $this->getModel('propaganda')->find($id)->toArray();
                $values['time_publish'] = date('Y-m-d', $values['time_publish']);
                $values['time_expire'] = date('Y-m-d', $values['time_expire']);
                $form->setData($values);
            }   
        }    
        // Set view
        $message = __('Ads for show on website front');
        $this->view()->setTemplate('ads_add');
        $this->view()->assign('form', $form);
        $this->view()->assign('title', __('Add a Ads for web'));
        $this->view()->assign('message', $message);
    }

    public function mobileAction()
    {
        // Get id
        $id = $this->params('id');
        // Set form
        $form = new MobileForm('web');
        $form->setAttribute('enctype', 'multipart/form-data');
        if ($this->request->isPost()) {
            $data = $this->request->getPost();
            $form->setInputFilter(new MobileFilter);
            $form->setData($data);
            if ($form->isValid()) {
                $values = $form->getData();
                // Set just story fields
                foreach (array_keys($values) as $key) {
                    if (!in_array($key, $this->propagandaColumns)) {
                        unset($values[$key]);
                    }
                }
                // Set time
                if (empty($values['id'])) {
                    $values['time_create'] = time();
                }
                $values['time_publish'] = strtotime($values['time_publish']);
                $values['time_expire'] = strtotime($values['time_expire']);
                // Save values
                if (!empty($values['id'])) {
                    $row = $this->getModel('propaganda')->find($values['id']);
                } else {
                    $row = $this->getModel('propaganda')->createRow();
                }
                $row->assign($values);
                $row->save();

                $message = __('Ads data saved successfully.');
                $url = array('action' => 'index');
                $this->jump($url, $message);
            }
        } else {
            if ($id) {
                $values = $this->getModel('propaganda')->find($values['id'])->toArray();
                $values['time_publish'] = date('Y-m-d', $values['time_publish']);
                $values['time_expire'] = date('Y-m-d', $values['time_expire']);
                $form->setData($values);
            }  
        }    
        // Set view
        $message = __('Ads for send from website to mobile app, it send JSON array than included type and ad info, you can set 0 1 or 2 for type on module setting and on you add you can set if type is 2 show website app or use online service by set it to 1 or set 0 for off ads system on mobile. you can use this link for set on mobile app : %s');
        $message = sprintf($message, Pi::url($this->url('ads', array('action' => 'view'))));
        $this->view()->setTemplate('ads_add');
        $this->view()->assign('form', $form);
        $this->view()->assign('title', __('Add a Ads for mobile'));
        $this->view()->assign('message', $message);
    }
}