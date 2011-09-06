<?php
/**
 * @version     $Id: mappings.php 2639 2011-09-01 03:06:25Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Factory Mappings
 *
 * @author      Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 */

KFactory::map('com://site/users.controller.default'   , 'com://admin/users.controller.default');
KFactory::map('com://site/users.model.users'          , 'com://admin/users.model.users');
KFactory::map('com://site/users.database.row.user'    , 'com://admin/users.database.row.user');
KFactory::map('com://site/users.database.table.groups', 'com://admin/users.database.table.groups');
KFactory::map('com://site/users.database.table.users' , 'com://admin/users.database.table.users');
KFactory::map('com://site/users.helper.password'      , 'com://admin/users.helper.password');