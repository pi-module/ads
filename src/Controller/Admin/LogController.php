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

use Pi;
use Pi\Mvc\Controller\ActionController;
use Pi\Paginator\Paginator;
use Laminas\Db\Sql\Predicate\Expression;

class LogController extends ActionController
{
    public function viewAction()
    {
        // Get page
        $page   = $this->params('page', 1);
        $module = $this->params('module');
        // Get info
        $list   = [];
        $order  = ['id DESC', 'time_create DESC'];
        $offset = (int)($page - 1) * $this->config('admin_perpage');
        $limit  = intval($this->config('admin_perpage'));
        $select = $this->getModel('view_log')->select()->order($order)->offset($offset)->limit($limit);
        $rowset = $this->getModel('view_log')->selectWith($select);
        // Make list
        foreach ($rowset as $row) {
            $list[$row->id]                = $row->toArray();
            $list[$row->id]['time_create'] = _date($list[$row->id]['time_create']);
        }
        // Set paginator
        $count     = ['count' => new Expression('count(*)')];
        $select    = $this->getModel('view_log')->select()->columns($count);
        $count     = $this->getModel('view_log')->selectWith($select)->current()->count;
        $paginator = Paginator::factory(intval($count));
        $paginator->setItemCountPerPage($this->config('admin_perpage'));
        $paginator->setCurrentPageNumber($page);
        $paginator->setUrlOptions([
            'router' => $this->getEvent()->getRouter(),
            'route'  => $this->getEvent()->getRouteMatch()->getMatchedRouteName(),
            'params' => array_filter([
                'module'     => $this->getModule(),
                'controller' => 'log',
                'action'     => 'view',
            ]),
        ]);
        // Set view
        $this->view()->setTemplate('log-view');
        $this->view()->assign('list', $list);
        $this->view()->assign('paginator', $paginator);
    }

    public function clickAction()
    {
        // Get page
        $page   = $this->params('page', 1);
        $module = $this->params('module');
        // Get info
        $list   = [];
        $order  = ['id DESC', 'time_create DESC'];
        $offset = (int)($page - 1) * $this->config('admin_perpage');
        $limit  = intval($this->config('admin_perpage'));
        $select = $this->getModel('click_log')->select()->order($order)->offset($offset)->limit($limit);
        $rowset = $this->getModel('click_log')->selectWith($select);
        // Make list
        foreach ($rowset as $row) {
            $list[$row->id]                = $row->toArray();
            $list[$row->id]['time_create'] = _date($list[$row->id]['time_create']);
        }
        // Set paginator
        $count     = ['count' => new Expression('count(*)')];
        $select    = $this->getModel('click_log')->select()->columns($count);
        $count     = $this->getModel('click_log')->selectWith($select)->current()->count;
        $paginator = Paginator::factory(intval($count));
        $paginator->setItemCountPerPage($this->config('admin_perpage'));
        $paginator->setCurrentPageNumber($page);
        $paginator->setUrlOptions([
            'router' => $this->getEvent()->getRouter(),
            'route'  => $this->getEvent()->getRouteMatch()->getMatchedRouteName(),
            'params' => array_filter([
                'module'     => $this->getModule(),
                'controller' => 'log',
                'action'     => 'click',
            ]),
        ]);
        // Set view
        $this->view()->setTemplate('log-click');
        $this->view()->assign('list', $list);
        $this->view()->assign('paginator', $paginator);
    }
}