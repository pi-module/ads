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

 namespace Module\Ads;

use Pi;

class Block
{ 
    public static function random($options = array(), $module = null)
    {
        // Set options
        $ads = array();
        $block = array();
        $block = array_merge($block, $options);
        // Set info
        $order = array(new \Zend\Db\Sql\Predicate\Expression('RAND()'));
        $where = array('device' => 'web', 'status' => 1, 'time_publish < ?' => time(), 'time_expire > ?' => time());
        // Get random ads for mobile
        $select = Pi::model('propaganda', $module)->select()->where($where)->order($order)->limit(1);
        $row = Pi::model('propaganda', $module)->selectWith($select)->toArray();
        $row = $row[0];
        if (!empty($row)) {
            // Make ads array
            $ads['title'] = $row['title'];
            $ads['back_url'] = Pi::url(sprintf('/ads/click/%s/%s', $row['id'], $row['device']));
            $ads['image_url'] = $row['image_web'];
            // Update view
            Pi::model('propaganda', $module)->update(array('view' => $row['view'] + 1), array('id' => $row['id']));
            // Save log
            Pi::service('api')->ads(array('Log', 'View'), $row['id'], 'web');
        }
        // Set block array
        $block['resources'] = $ads;
        return $block;
    }

    public static function select($options = array(), $module = null)
    {
        // Set options
        $ads = array();
        $block = array();
        $block = array_merge($block, $options);
        // find ads
        $row = Pi::model('propaganda', $module)->find($block['adsid'])->toArray();
        if (!empty($row) && 
            $row['device'] == 'web' && 
            $row['status'] == 1 && 
            $row['time_publish'] < time() && 
            $row['time_expire'] > time()
        ) {
            // Make ads array
            $ads['title'] = $row['title'];
            $ads['back_url'] = Pi::url(sprintf('/ads/click/%s/%s', $row['id'], $row['device']));
            $ads['image_url'] = $row['image_web'];
            // Update view
            Pi::model('propaganda', $module)->update(array('view' => $row['view'] + 1), array('id' => $row['id']));
            // Save log
            Pi::service('api')->ads(array('Log', 'View'), $row['id'], 'web');
        }
        // Set block array
        $block['resources'] = $ads;
        return $block;
    }
}