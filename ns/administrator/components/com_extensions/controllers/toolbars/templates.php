<?php
/**
 * @version     $Id: templates.php 2156 2011-07-11 12:06:35Z johanjanssens $
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
class ComExtensionsControllerToolbarTemplates extends ComDefaultControllerToolbarDefault
{
    public function getCommands()
    {
        $this->addDefault();
        
        return parent::getCommands();
    }
     
    protected function _commandDefault(KControllerToolbarCommand $command)
    {
        $command->label = JText::_('Make Default');
        
        $command->append(array(
        	'attribs' => array(
                'data-action' => 'edit',
                'data-data'   => '{default:1}'
            )
        ));
    }
}