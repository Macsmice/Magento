<?php
/**
 * @version     $Id: articles.php 2346 2011-07-21 14:00:16Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Articles Toolbar Class
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 */
class ComArticlesControllerToolbarArticles extends ComDefaultControllerToolbarDefault
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
                 ->addArchive()
                 ->addUnarchive();
        }    
        else 
        {
            $this->reset()
                 ->addDelete()
                 ->addRestore(); 
        }
        
        return parent::getCommands();
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
    
    protected function _commandArchive(KControllerToolbarCommand $command)
    {
        $command->append(array(
            'attribs'  => array(
                'data-action' => 'edit',
                'data-data'   => '{state:-1}'
            )
        )); 
    }
    
    protected function _commandUnarchive(KControllerToolbarCommand $command)
    {
        $command->append(array(
            'attribs'  => array(
                'data-action' => 'edit',
                'data-data'   => '{state:0}'
            )
        )); 
    }
}