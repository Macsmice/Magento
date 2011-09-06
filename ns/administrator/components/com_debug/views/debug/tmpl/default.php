<?php
/**
 * @version     $Id: default.php 835 2011-07-29 19:38:31Z stiandidriksen $
 * @category	Nooku
 * @package     Nooku_Components
 * @subpackage  Debug
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<style src="media://com_debug/css/debug-default.css" />
<script src="media://com_debug/js/debug.js" />

<div id="debug" class="profiler">
<a class="close" title="<?= @text("press 'd' to bring the debug bar back up") ?>"></a>
<?=	@helper('tabs.startPane', array('id' => 'debug')); ?>

<?= @helper('tabs.startPanel', array('title' => 'Overview', 'attribs' => array( 'class' => 'icon icon-32-profiles'))); ?>
    <?= @template('default_overview'); ?>	
<?= @helper('tabs.endPanel'); ?>

<?= @helper('tabs.startPanel', array('title' => 'Profiles', 'attribs' => array( 'class' => 'icon icon-32-timeline'))); ?>
	<?= @template('default_profiles'); ?>
<?= @helper('tabs.endPanel'); ?>

<?= @helper('tabs.startPanel', array('title' => 'Queries', 'attribs' => array( 'class' => 'icon icon-32-storage'))); ?>
	<?= @template('default_queries'); ?>
<?= @helper('tabs.endPanel'); ?>

<?= @helper('tabs.startPanel', array('title' => 'Resources', 'attribs' => array( 'class' => 'icon icon-32-resources'))); ?>
	<?= @template('default_resources'); ?>
<?= @helper('tabs.endPanel'); ?>

<?= @helper('tabs.startPanel', array('title' => 'Strings', 'attribs' => array( 'class' => 'icon icon-32-audits'))); ?>
	<?= @template('default_strings'); ?>
<?= @helper('tabs.endPanel'); ?>

<?= @helper('tabs.endPane'); ?>
</div>