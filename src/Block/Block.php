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
use Laminas\Db\Sql\Predicate\Expression;

class Block
{
    public static function random($options = [], $module = null)
    {
        // Set options
        $ads   = [];
        $block = [];
        $block = array_merge($block, $options);
        // Set info
        $order = [new Expression('RAND()')];
        $limit = intval($block['number']);
        $where = [
            'category'         => $block['category'],
            'status'           => 1,
            'device'           => 'web',
            'time_publish < ?' => time(),
            'time_expire > ?'  => time(),
        ];
        // Get random ads for mobile
        $select = Pi::model('propaganda', $module)->select()->where($where)->order($order)->limit($limit);
        $rowset = Pi::model('propaganda', $module)->selectWith($select);
        // Make list
        foreach ($rowset as $row) {
            // Make ads array
            $ads[$row->id]             = $row->toArray();
            $ads[$row->id]['back_url'] = Pi::url(Pi::service('url')->assemble('ads', [
                'module'     => $module,
                'controller' => 'index',
                'action'     => 'click',
                'id'         => $row->id,
                'device'     => $row->device,
            ]));
            // Update view
            Pi::model('propaganda', $module)->increment('view', ['id' => $row->id]);
            // Save log
            Pi::api('log', 'ads')->view($row->id, 'web');
        }
        // Set block array
        $block['resources'] = $ads;
        return $block;
    }

    public static function select($options = [], $module = null)
    {
        // Set options
        $ads   = [];
        $block = [];
        $block = array_merge($block, $options);
        // find ads
        if (!empty($block['propaganda'])) {
            $row = Pi::model('propaganda', $module)->find($block['propaganda'])->toArray();
            if (!empty($row) &&
                $row['device'] == 'web' &&
                $row['status'] == 1 &&
                $row['time_publish'] < time() &&
                $row['time_expire'] > time()
            ) {
                // Make ads array
                $ads             = $row;
                $ads['back_url'] = Pi::url(Pi::service('url')->assemble('ads', [
                    'module'     => $module,
                    'controller' => 'index',
                    'action'     => 'click',
                    'id'         => $row['id'],
                    'device'     => $row['device'],
                ]));
                // Update view
                Pi::model('propaganda', $module)->increment('view', ['id' => $ads['id']]);
                // Save log
                Pi::api('log', 'ads')->view($row['id'], 'web');
            }
            // Set block array
            $block['resources'] = $ads;
        }
        return $block;
    }
}