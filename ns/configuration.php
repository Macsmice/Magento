<?php
class JConfig
{
	/* Site Settings */
	var $offline = '0';
	var $offline_message = 'This site is down for maintenance.<br /> Please check back again soon.';
	var $sitename = 'Nooku Server';
	var $editor = 'tinymce';
	var $list_limit = '20';
	/* Debug Settings */
	var $debug = '0';
	var $debug_lang = '0';
	/* Database Settings */
	var $dbtype = 'mysqli';
	var $host = 'localhost';
	var $user = 'root';
	var $password = 'babbeltmp456';
	var $db = 'nooku_server';
	var $dbprefix = 'jos_';
	/* Server Settings */
	var $live_site = '';
	var $secret = 'cVsOgL0uktxc4ABT';
	var $gzip = '0';
	var $error_reporting = '-1';
	var $ftp_host = '127.0.0.1';
	var $ftp_port = '';
	var $ftp_user = '';
	var $ftp_pass = '';
	var $ftp_root = '';
	var $ftp_enable = '0';
	var $force_ssl = '0';
	/* Locale Settings */
	var $offset = '0';
	var $offset_user = '0';
	/* Mail Settings */
	var $mailer = 'mail';
	var $mailfrom = 'babsgosgens@gmail.com';
	var $fromname = 'Nooku Server';
	var $sendmail = '/usr/sbin/sendmail';
	var $smtpauth = '0';
	var $smtpsecure = 'none';
	var $smtpport = '25';
	var $smtpuser = '';
	var $smtppass = '';
	var $smtphost = 'localhost';
	/* Cache Settings */
	var $caching = '0';
	var $cachetime = '15';
	var $cache_handler = 'file';
	/* SEO Settings */
	var $sef           = '1';
	var $sef_rewrite   = '0';
	var $sef_suffix    = '1';
	/* Feed Settings */
	var $feed_limit   = '10';
	var $log_path = '/Users/babsgosgens/Sites/nookuserver/logs';
	var $tmp_path = '/Users/babsgosgens/Sites/nookuserver/tmp';
	/* Session Setting */
	var $lifetime = '15';
	var $session_handler = 'database';
}