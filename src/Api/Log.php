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
use Pi\Application\Api\AbstractApi;

/*
 * Pi::api('log', 'ads')->view($propaganda, $device);
 * Pi::api('log', 'ads')->click($propaganda, $device);
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
        $row->uid = Pi::user()->getId();
        $row->ip = Pi::user()->getIp();
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
        $row->uid = Pi::user()->getId();
        $row->ip = Pi::user()->getIp();
        $row->save();
    }
}	