<?php
/**
 * @version     $Id: categories.php 2457 2011-08-08 17:52:17Z JohnBell $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Categories
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Categories Toolbar Class
 *
 * @author      John Bell <http://nooku.assembla.com/profile/johnbell>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Categories   
 */
class ComCategoriesControllerToolbarCategories extends ComDefaultControllerToolbarDefault
{
    public function getCommands()
    {
        $this->addSeparator()    
			 ->addEnable(array('label' => 'publish'))
			 ->addDisable(array('label' => 'unpublish'));
	    
        return parent::getCommands();
    }
    
    protected function _commandNew(KControllerToolbarCommand $command)
    {
        $option  = $this->_identifier->package;
		$view	 = KInflector::singularize($this->_identifier->name);
		$section = $this->getController()->getModel()->get('section');
		
        $command->attribs->href = JRoute::_('index.php?option=com_'.$option.'&view='.$view.'&section='.$section ); 
    }
}