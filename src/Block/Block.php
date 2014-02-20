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
namespace Module\Ads\Block;

use Pi;
use Zend\Db\Sql\Predicate\Expression;

class Block
{ 
    public static function random($options = array(), $module = null)
    {
        // Set options
        $ads = array();
        $block = array();
        $block = array_merge($block, $options);
        // Set info
        $order = array(new Expression('RAND()'));
        $where = array('category' => intval($block['category']), 'status' => 1, 'device' => 'web', 'time_publish < ?' => time(), 'time_expire > ?' => time());
        // Get random ads for mobile
        $select = Pi::model('propaganda', $module)->select()->where($where)->order($order)->limit(1);
        $row = Pi::model('propaganda', $module)->selectWith($select)->current()->toArray();
        if (!empty($row)) {
            // Make ads array
            $ads['title'] = $row['title'];
            $ads['image_url'] = $row['image_web'];
            $ads['back_url'] = Pi::url(Pi::service('url')->assemble('ads', array(
                'module'        => $module,
                'controller'    => 'index',
                'action'        => 'click',
                'id'            => $row['id'],
                'device'        => $row['device'],
            )));
            // Update view
            Pi::model('propaganda', $module)->update(array('view' => $row['view'] + 1), array('id' => $row['id']));
            // Save log
            Pi::api('log', 'ads')->view($row['id'], 'web');
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
        if (!empty(intval($block['propaganda']))) {
            $row = Pi::model('propaganda', $module)->find(intval($block['propaganda']))->toArray();
            if (!empty($row) && 
                $row['device'] == 'web' && 
                $row['status'] == 1 && 
                $row['time_publish'] < time() && 
                $row['time_expire'] > time()
            ) {
                // Make ads array
                $ads['title'] = $row['title'];
                $ads['image_url'] = $row['image_web'];
                $ads['back_url'] = Pi::url(Pi::service('url')->assemble('ads', array(
                    'module'        => $module,
                    'controller'    => 'index',
                    'action'        => 'click',
                    'id'            => $row['id'],
                    'device'        => $row['device'],
                )));
                // Update view
                Pi::model('propaganda', $module)->update(array('view' => $row['view'] + 1), array('id' => $row['id']));
                // Save log
                Pi::api('log', 'ads')->view($row['id'], 'web');
            }
            // Set block array
            $block['resources'] = $ads;
        }
        return $block;
    }
}