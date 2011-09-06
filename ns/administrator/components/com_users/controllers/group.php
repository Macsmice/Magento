<?php
/**
 * @version     $Id: group.php 2630 2011-09-01 03:04:40Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Group Controller Class
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Users    
 */
class ComUsersControllerGroup extends ComDefaultControllerDefault
{ 
    protected function _actionGet(KCommandContext $context)
    {
        $view    = $this->getView();
        $package = KInflector::pluralize($this->_identifier->name);
        
        if($view instanceof KViewTemplate) 
	    {     
	        //Set the layout identifier
	        $layout = clone $view->getIdentifier();
	        $layout->package  = $package;
	        $layout->name     = $view->getLayout();
	        $layout->filepath = ''; 
 
	        $view->setLayout($layout);
	        
	        //Set the template identifier
	        $template = $view->getTemplate()->getIdentifier();
	        $template->package = $package;
	    }
	    
	    //Set the toolbar
	    if($this->isCommandable()) {
	        $this->setToolbar('com://admin/'.$package.'.controller.toolbar.'.$view->getName());
	    }
	    
        return parent::_actionGet($context);
    }
    
    public function setModel($model)
    {
        $model = parent::setModel($model);
        $model->package = KInflector::pluralize($this->_identifier->name);
        
        return $model; 
    }
}