<?php
/**
 * @version     $Id: html.php 2621 2011-09-01 03:02:18Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Cache
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Items HTML View class
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Cache    
 */
class ComCacheViewItemsHtml extends ComDefaultViewHtml
{
	public function display()
	{
        $group = $this->getModel()->getState()->group;
        
	    $this->groups = KFactory::get('com://admin/cache.model.groups')->getList();
	    $this->size   = !empty($group) ? $this->groups->find($group)->size : $this->groups->size;
        $this->count  = !empty($group)? $this->groups->find($group)->count : $this->groups->count;
        
		return parent::display();
	}
}