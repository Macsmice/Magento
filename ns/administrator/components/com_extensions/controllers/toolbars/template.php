<?php
/**
 * @version     $Id: template.php 2156 2011-07-11 12:06:35Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Extensions
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Templates Toolbar Class
 *
 * @author      Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Extensions
 */
class ComExtentionsControllerToolbarTemplate extends ComDefaultControllerToolbarDefault
{
    public function getCommands()
    {
        $this->addSeparator()
             ->addPreview();

        return parent::getCommands();
    }
   
    protected function _commandPreview(KControllerToolbarCommand $command)
    {
        $state = $this->getController()->getModel()->getState();
        
        $template = $state->name;
        $base     = $state->application == 'site' ? JURI::root() : JURI::base();
        
        $command->append(array(
            'width'   => '640',
            'height'  => '480',
        ))->append(array(
            'attribs' => array(
                'href' 	 =>  $base.'index.php?tp=1&template='.$template,
                'target' => 'preview'
            )
        ));
    }
}