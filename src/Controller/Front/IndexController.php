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
        switch ($type) {
            case '0':
                $ads = array();
                break;

            case '1':
                $ads = array();
                break;   

            case '2':
                // Set info
                $order = array(new \Zend\Db\Sql\Predicate\Expression('RAND()'));
                $where = array('device' => 'mobile', 'status' => 1, 'time_publish < ?' => time(), 'time_expire > ?' => time());
                // Get random ads for mobile
                $select = $this->getModel('propaganda')->select()->where($where)->order($order)->limit(1);
                $row = $this->getModel('propaganda')->selectWith($select)->toArray();
                $ads = array(
                    'id' => $row[0]['id'],
                    'image_1' => $row[0]['image_mobile_1'],
                    'image_2' => $row[0]['image_mobile_2'],
                    'image_3' => $row[0]['image_mobile_3'],
                    'back_url' => Pi::url($this->url('.ads', array('controller' => 'index', 
                                                                   'action' => 'click', 
                                                                   'id' => $row[0]['id'], 
                                                                   'device' => 'mobile'))),
                );
                // Update view
                $this->getModel('propaganda')->update(array('view' => $row[0]['view'] + 1), array('id' => $row[0]['id']));
                // Save log
                Pi::service('api')->ads(array('Log', 'View'), $row[0]['id'], 'mobile');
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
        if ($id) {
            // find ads
            $item = $this->getModel('propaganda')->find($id)->toArray();
            // Update view
            $this->getModel('propaganda')->update(array('click' => $item['click'] + 1), array('id' => $item['id']));
            // Save log
            Pi::service('api')->ads(array('Log', 'Click'), $item['id'], $device);
            // redirect
            return $this->redirect()->toUrl($item['url']);
        }
    }	
}	