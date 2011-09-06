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
 * Modules HTML View Class
 *   
 * @author    	Stian Didriksen <http://nooku.assembla.com/profile/stiandidriksen>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Extensions
 */
class ComExtensionsViewModulesHtml extends ComDefaultViewHtml
{
	public function display()
	{
		//Load language files for each module
	    if($this->getLayout() == 'list') 
		{
		    foreach($this->getModel()->getList() as $module) 
		    {
		       if($module->application == 'site') {
	                KFactory::get('joomla:language')->load($module->type, JPATH_SITE );
	            } else {
		            KFactory::get('joomla:language')->load($module->type);
	            }
		    }
		} 

		return parent::display();
	}
}