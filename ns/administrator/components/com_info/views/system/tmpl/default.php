<?php
/**
 * @version     $Id: default.php 2581 2011-08-23 21:53:08Z tomjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Info
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<form class="-koowa-grid">
<table class="adminlist">
    <thead>
        <tr>
            <th width="300">
                <?= @text('Setting') ?>
            </th>
            <th>
                <?= @text('Value') ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <? foreach($items as $item) : ?>
            <tr>
                <td>
                    <strong><?= $item->setting ?></strong>
                </td>
                <td>
                    <?= @escape($item->value) ?>
                </td>
            </tr>
        <?  endforeach ?>
    </tbody>
</table>
</form>