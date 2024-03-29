<?php
/**
 * @version     $Id: modules.php 2156 2011-07-11 12:06:35Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Modules
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Modules Toolbar Class
 *
 * @author      Stian Didriksen <http://nooku.assembla.com/profile/stiandidriksen>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Modules
 */
class ComExtensionsControllerToolbarModules extends ComDefaultControllerToolbarDefault
{
    public function getCommands()
    {
        $this->addSeparator()
			 ->addEnable()
			 ->addDisable();
        
        return parent::getCommands();
    }
    
    protected function _commandNew(KControllerToolbarCommand $command)
    {
        $command->attribs = array(
            'class' => array('modal'),
            'rel'   => '{handler: \'url\', ajaxOptions:{method:\'get\'}}',
            'href'	=> JRoute::_('index.php?option=com_extensions&view=modules&layout=list&installed=1&tmpl=component')
        );
    }
}