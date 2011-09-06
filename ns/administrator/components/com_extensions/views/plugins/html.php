<?php
/**
 * @version     $Id: html.php 2627 2011-09-01 03:03:49Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Extensions
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Plugins HTML View class
 *
 * @author      Stian Didriksen <http://nooku.assembla.com/profile/stiandidriksen>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Extensions    
 */
class ComExtensionsViewPluginsHtml extends ComDefaultViewHtml
{
	public function display()
	{
        $this->types = array_unique(KFactory::get('com://admin/extensions.model.plugins')->getList()->getColumn('type'));
   
		return parent::display();
	}
}