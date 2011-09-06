<?php
/**
 * @version     $Id: form_modules.php 2629 2011-09-01 03:04:20Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Pages
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

defined('KOOWA') or die('Restricted access') ?>
<?= @helper('behavior.modal'); ?>

<? $modules_available	= KFactory::get('com://admin/extensions.model.modules')->limit(0)->getList() ?>
<? $modules_assigned	= KFactory::get('com://admin/pages.model.pages')->getAssignedModules() ?>

<?= @helper('tabs.startPanel', array('title' => 'Modules')) ?>
<section>
	<fieldset>
		<? foreach($modules_available as $module) : ?>
			<input type="checkbox" <?= in_array($module->id, $modules_assigned) ? 'checked="checked"' : '' ?> />
			<a class="modal" href="<?= @route('option=com_extensions&view=module&id='.$module->id.'&layout=modal&tmpl=modal'); ?>" rel="{handler: 'iframe', size: {x: 800, y: 400}}"><label><?= $module->title ?></label></a><br />
		<? endforeach ?>
	</fieldset>
</section>
<?= @helper('tabs.endPanel') ?>