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
namespace Module\Ads\Controller\Front;

use Pi;
use Pi\Mvc\Controller\ActionController;
use Zend\Json\Json;
use Zend\Db\Sql\Expression;

class IndexController extends ActionController
{
    /**
     * view action
     */
    public function viewAction()
    {
        // Set view
        $this->view()->setTemplate(false)->setLayout('layout-content');
        // Get ads and make output
        $type = $this->config('mobile_ads_type');
        // Set when type is 3
        if ($type == 3) {
            switch ($this->config('mobile_random')) {
                case '1-9':
                    $number = rand(1,10);
                    if ($number == 2) {
                        $type = 2;
                    } else {
                        $type = 1;
                    }
                    break;

                case '2-8':
                    $number = rand(1,5);
                    if ($number == 2) {
                        $type = 2;
                    } else {
                        $type = 1;
                    }
                    break;

                case '3-7':
                    $number = rand(1,4);
                    if ($number == 2) {
                        $type = 2;
                    } else {
                        $type = 1;
                    }
                    break;

                case '4-6':
                    $number = rand(1,3);
                    if ($number == 2) {
                        $type = 2;
                    } else {
                        $type = 1;
                    }
                    break;

                default:
                case '5-5':
                    $number = rand(1,2);
                    if ($number == 2) {
                        $type = 2;
                    } else {
                        $type = 1;
                    }
                    break;

                case '6-4':
                    $number = rand(1,3);
                    if ($number == 1) {
                        $type = 1;
                    } else {
                        $type = 2;
                    }
                    break;

                case '7-3':
                    $number = rand(1,4);
                    if ($number == 1) {
                        $type = 1;
                    } else {
                        $type = 2;
                    }
                    break;

                case '8-2':
                    $number = rand(1,5);
                    if ($number == 1) {
                        $type = 1;
                    } else {
                        $type = 2;
                    }
                    break;

                case '9-1':
                    $number = rand(1,10);
                    if ($number == 1) {
                        $type = 1;
                    } else {
                        $type = 2;
                    }
                    break;
            }
        }
        // Make action
        switch ($type) {
            case '0':
                $ads = array();
                break;

            case '1':
                $ads = array();
                break;   

            case '2':
                // Set info
                $ads = array();
                $order = array(new Expression('RAND()'));
                $where = array('device' => 'mobile', 'status' => 1, 'time_publish < ?' => time(), 'time_expire > ?' => time());
                // Get random ads for mobile
                $select = $this->getModel('propaganda')->select()->where($where)->order($order)->limit(1);
                $row = $this->getModel('propaganda')->selectWith($select)->current();
                if (!empty($row)) {
                    $row = $row->toArray();
                    $ads = array(
                        'id' => $row['id'],
                        'image_1' => $row['image_mobile_1'],
                        'image_2' => $row['image_mobile_2'],
                        'image_3' => $row['image_mobile_3'],
                        'back_url' => Pi::url($this->url('ads', array(
                            'controller'  => 'index', 
                            'action'      => 'click', 
                            'id'          => $row['id'], 
                            'device'      => 'mobile'))),
                    );
                    // Update view
                    $this->getModel('propaganda')->increment('view', array('id' => $row['id']));
                    // Save log
                    Pi::api('log', 'ads')->view($row['id'], 'mobile');
                } else {
                    $ads = array();
                }
                break;
        }
        // Set output
        $output = array(
            'type' => $type,
            'ads' => $ads,
        );
        // echo json
        echo Json::encode($output);
        exit;
    }

    /**
     * Ads action
     */
    public function clickAction()
    {
        // Set view
        $this->view()->setTemplate(false)->setLayout('layout-content');
        // Get ID and device
        $id = $this->params('id');
        $device = $this->params('device', 'web');
        // Check id and device
        if ($id && in_array($device, array('mobile', 'web'))) {
            // find ads
            $item = $this->getModel('propaganda')->find($id)->toArray();
            // Update view
            $this->getModel('propaganda')->increment('click', array('id' => $item['id']));
            // Save log
            Pi::api('log', 'ads')->click($item['id'], $device);
            // Set view
            $this->view()->setTemplate('open')->setLayout('layout-content');
            $this->view()->assign('url', $item['url']);
        } else {
            $this->view()->setTemplate(false)->setLayout('layout-content');
            return $this->redirect()->toRoute('home');
        }
    }
}	