<?php
/**
 * @version     $Id: executable.php 2428 2011-08-04 14:29:58Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Cache
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Cache Controller Executable Behavior
 *
 * @author      Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Cache
 */
class ComCacheControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{  
    public function canAdd()
    {
        return false;
    }
    
    public function canEdit()
    {
        return false;
    }
}