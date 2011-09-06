<?php
/**
 * @version     $Id: pages.php 2544 2011-08-23 14:34:49Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Pages
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Pages Toolbar Class
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Pages
 */

class ComPagesControllerToolbarPages extends ComDefaultControllerToolbarDefault
{
    public function getCommands()
    {
        $state = $this->getController()->getModel()->getState();
        
        if($state->deleted != true) 
        {
            $this->addSeparator()
                 ->addPublish()
                 ->addUnpublish()
                 ->addSeparator()
                 ->addSeparator()
                 ->addDefault();
        }    
        else 
        {
            $this->reset()
                 ->addDelete()
                 ->addRestore(); 
        }
            
        return parent::getCommands();
    }
     
    protected function _commandDefault(KControllerToolbarCommand $command)
    {
        $command->label = JText::_('Make Default');
        
        $command->append(array(
        	'attribs' => array(
                'data-action' => 'edit',
                'data-data'   => '{home:1}'
            )
        ));
    }
    
    protected function _commandRestore(KControllerToolbarCommand $command)
    {
        $command->append(array(
            'attribs' => array(
                'data-action' => 'edit',
            )
        ));
    }
    
    protected function _commandPublish(KControllerToolbarCommand $command)
    {
        $command->append(array(
            'attribs'  => array(
                'data-action' => 'edit',
                'data-data'   => '{state:1}'
            )
        )); 
    }
    
    protected function _commandUnpublish(KControllerToolbarCommand $command)
    {
        $command->append(array(
            'attribs'  => array(
                'data-action' => 'edit',
                'data-data'   => '{state:0}'
            )
        )); 
    }
}