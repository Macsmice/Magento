<?php
/**
 * @version     $Id: instantiatable.php 3905 2011-09-01 16:22:28Z johanjanssens $
 * @category    Koowa
 * @package     Koowa_Factory
 * @copyright   Copyright (C) 2007 - 2010 Johan Janssens. All rights reserved.
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */

/**
 * Object Instantiatable Interface
 *
 * @author      Johan Janssens <johan@nooku.org>
 * @category    Koowa
 * @package     Koowa_Factory
 */
interface KObjectInstantiatable
{
    /**
     * Get the object identifier
     * 
     * @return  KIdentifier 
     */
    public static function getInstance($config = array());
}