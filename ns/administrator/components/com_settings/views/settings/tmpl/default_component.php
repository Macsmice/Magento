<?php
/**
 * @version     $Id: default_component.php 2582 2011-08-23 22:16:58Z tomjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Settings
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<?= @helper('tabs.startPanel', array('id' => $settings->getName(), 'title' => @text(ucfirst($settings->getName())))) ?>
	<h2><?=  @text(ucfirst($settings->getName())); ?></h2>
	<section>
		<h3><?=  @text(ucfirst($settings->getName())); ?></h3>
		<? 
		    $params = new JParameter( null, $settings->getPath() );
			$params->loadArray($settings->toArray());
			
			echo $params->render('settings['.$settings->getName().']');
		?>
	</section>
<?= @helper('tabs.endPanel') ?>