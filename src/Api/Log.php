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

namespace Module\Ads\Api;

use Pi;
use Pi\Application\AbstractApi;

/*
 * Pi::service('api')->ads(array('Log', 'View'), $propaganda, $device);
 * Pi::service('api')->ads(array('Log', 'Click'), $propaganda, $device);
 */
class Log extends AbstractApi
{
    /*
      * Save view log
      */
    public function View($propaganda, $device)
    {
    	$row = Pi::model('view_log', $this->getModule())->createRow();
        $row->propaganda = $propaganda;
        $row->device = $device;
        $row->time_create = time();
        $row->user = Pi::registry('user')->id;
        $row->hostname = getenv('REMOTE_ADDR');
        $row->save();
    }
    
    /*
      * Save click log
      */
    public function Click($propaganda, $device)
    {
    	$row = Pi::model('click_log', $this->getModule())->createRow();
        $row->propaganda = $propaganda;
        $row->device = $device;
        $row->time_create = time();
        $row->user = Pi::registry('user')->id;
        $row->hostname = getenv('REMOTE_ADDR');
        $row->save();
    }
}	