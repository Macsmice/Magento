<?php
/**
 * @version     $Id: html.php 2634 2011-09-01 03:05:24Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Articles Module Html View Class
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 */
 
class ModLatestHtml extends ModDefaultHtml
{
    public function display()
    { 
        $this->articles = KFactory::get('com://admin/articles.model.articles')->sort('created')->direction('desc')->limit(10)->getList(); 
        return parent::display();
    }
} 