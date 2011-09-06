<?php
/**
 * @version     $Id: html.php 2231 2011-07-15 14:47:50Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Info
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Default HTML View Class
 *
 * @author      John Bell <http://nooku.assembla.com/profile/johnbell>
 * @category     Nooku
 * @package     Nooku_Server
 * @subpackage  Info
 */
class ComInfoViewHtml extends ComDefaultViewHtml
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
         	'layout'      => 'default'
        ));

        parent::_initialize($config);
    }
    
	public function getName()
	{
		return 'items';
	}
}