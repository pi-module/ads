<?php
/**
 * Pi Engine (http://pialog.org)
 *
 * @link            http://code.pialog.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://pialog.org
 * @license         http://pialog.org/license.txt BSD 3-Clause License
 */

/**
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */
namespace Module\Ads\Model;

use Pi\Application\Model\Model;

class Propaganda extends Model
{
    /**
     * {@inheritDoc}
     */
    protected $columns = array(
        'id',
        'title',
        'category',
        'url',
        'status',
        'time_create',
        'time_publish',
        'time_expire',
        'view',
        'click',
        'device',
        'type',
        'image_web',
        'image_mobile_1',
        'image_mobile_2',
        'image_mobile_3',
        'html',
        'script',
    );
}