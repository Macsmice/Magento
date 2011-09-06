<?php
/**
 * @version     $Id: html.php 2620 2011-09-01 03:01:54Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Article Html View Class
 *
 * @author      Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 */

class ComArticlesViewArticleHtml extends ComDefaultViewHtml
{
    public function display()
    {
        $this->assign('user', KFactory::get('joomla:user'));
        return parent::display();
    }
}