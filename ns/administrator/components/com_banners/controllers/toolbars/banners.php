<?php
/**
 * @version     $Id: banners.php 2346 2011-07-21 14:00:16Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Banners
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Banners Toolbar Class
 *
 * @author      Cristiano Cucco <http://nooku.assembla.com/profile/cristiano.cucco>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Banners    
 */
class ComBannersControllerToolbarBanners extends ComDefaultControllerToolbarDefault
{
    public function getCommands()
    {
        $this->addSeparator()
              ->addEnable()
              ->addDisable();
         
        return parent::getCommands();
    }
}