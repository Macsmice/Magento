<?php
/**
 * @version     $Id: categories.php 2626 2011-09-01 03:03:23Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Categories
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Categories Database Table Class
 *
 * @author      John Bell <http://nooku.assembla.com/profile/johnbell>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Categories
 */
class ComCategoriesDatabaseTableCategories extends KDatabaseTableDefault
{
    public function  _initialize(KConfig $config)
    {
        $config->identity_column = 'id';
        $orderable = $this->getBehavior('com://admin/categories.database.behavior.orderable', array('parent_column' => 'section_id'));

        $config->append(array(
            'name'       => 'categories',
            'behaviors'  => array('lockable',$orderable, 'sluggable', 'cascadable'),
            'column_map' => array(
                'enabled'      => 'published',
                'locked_on'    => 'checked_out_time',
                'locked_by'    => 'checked_out',
                'slug'         => 'alias',
                'section_id'   => 'section'
                ),
            ));

        parent::_initialize($config);
    }
}
