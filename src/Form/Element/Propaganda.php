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

namespace Module\Ads\Form\Element;

use Pi;
use Zend\Form\Element\Select;

class Propaganda extends Select
{
    /**
* @return array
*/
    public function getValueOptions()
    {
        if (empty($this->valueOptions)) {
            $where = array('device' => 'web', 'status' => 1, 'time_publish < ?' => time(), 'time_expire > ?' => time());
            $select = Pi::model('propaganda', 'ads')->select()->columns(array('id', 'title'))->where($where);
            $rowset = Pi::model('propaganda', 'ads')->selectWith($select);
            foreach ($rowset as $row) {
                $list[$row->id] = $row->toArray();
                $options[$row->id] = $list[$row->id]['title'];
            }
            $this->valueOptions = $options;
        }
        return $this->valueOptions;
    }
}