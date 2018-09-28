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

namespace Module\Ads\Form\Element;

use Pi;
use Zend\Form\Element\Select;

class Category extends Select
{
    /**
     * @return array
     */
    public function getValueOptions()
    {
        if (empty($this->valueOptions)) {
            $select = Pi::model('category', 'ads')->select()->columns(['id', 'title']);
            $rowset = Pi::model('category', 'ads')->selectWith($select);
            foreach ($rowset as $row) {
                $list[$row->id]    = $row->toArray();
                $options[$row->id] = $list[$row->id]['title'];
            }
            $this->valueOptions = $options;
        }
        return $this->valueOptions;
    }
}