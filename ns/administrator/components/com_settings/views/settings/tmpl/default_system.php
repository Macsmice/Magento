<?php
/**
 * @version     $Id: default_system.php 2343 2011-07-21 13:26:34Z tomjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Settings
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<?= @helper('tabs.startPanel', array('id' => 'system', 'title' => @text('General'))) ?>
    <h2><?= @text('General') ?></h2>
    <?= @template('default_path'); ?>
    <?= @template('default_server'); ?>
    <?= @template('default_debug'); ?> 
    <?= @template('default_cache'); ?> 
    <?= @template('default_session'); ?>
    <?= @template('default_locale'); ?> 
<?= @helper('tabs.endPanel') ?>
	
<?= @helper('tabs.startPanel', array('id' => 'site', 'title' => @text('Frontend'))) ?>
	<h2><?= @text('Frontend') ?></h2>
	<?= @template('default_site'); ?>
	<?= @template('default_seo'); ?>
<?= @helper('tabs.endPanel') ?>
	
<?= @helper('tabs.startPanel', array('id' => 'mail', 'title' => @text('Mail'))) ?>
    <h2><?= @text('Mail') ?></h2>
   	<?= @template('default_mail'); ?>  
<?= @helper('tabs.endPanel') ?>
 	
<?= @helper('tabs.startPanel', array('id' => 'ftp', 'title' => @text('FTP'))) ?>
	<h2><?= @text('FTP') ?></h2>
	<?= @template('default_ftp'); ?> 
 <?= @helper('tabs.endPanel') ?>
 	
 <?= @helper('tabs.startPanel', array('id' => 'database', 'title' => @text('Database'))) ?>
 	<h2><?= @text('Database') ?></h2>
	<?= @template('default_database'); ?> 
 <?= @helper('tabs.endPanel') ?>