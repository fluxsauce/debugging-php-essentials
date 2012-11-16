<?php
/**
 * @file
 * Simple HTML Template; sets up debugging tools, if enabled.
 */

// Enable or disable debugging tools.
$tools = array(
  'chromephp' => FALSE,
  'firephp' => FALSE,
  'firebuglite' => FALSE,
  'phpdebug' => FALSE,
);

// ChromePHP.
if ($tools['chromephp']) {
  require_once 'chromephp/ChromePhp.php';
}

// FirePHP.
if ($tools['firephp']) {
  // See http://www.firephp.org/HQ/Learn.htm for more details.
  require_once 'FirePHPCore/FirePHP.class.php';
  ob_start();
}

// PHP_Debug.
if ($tools['phpdebug']) {
  // Set paths.
  $php_debug_options = array(
    'HTML_DIV_images_path' => 'images',
    'HTML_DIV_css_path' => 'css',
    'HTML_DIV_js_path' => 'js',
  );
  // Include file; if it's not in PHP, you'll have to refactor.
  require_once 'PHP/Debug.php';
  $PHP_Debug = new PHP_Debug($php_debug_options);
}

?><!doctype html>
  <!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
  <!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
  <!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
  <!--[if gt IE 8]><!--> <html class="no-js" lang="en"><!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Debugging PHP Essentials</title>
    <meta name="description" content="Debug your PHP code efficiently a variety of client and server-side tools.">
    <meta name="author" content="Jon Peck">
    <meta name="viewport" content="width=device-width">
    <?php
      // PHP_Debug.
      if ($tools['phpdebug']): ?>
      <script type="text/javascript" src="<?php echo $php_debug_options['HTML_DIV_js_path']; ?>/html_div.js"></script>
      <link rel="stylesheet" href="<?php echo $php_debug_options['HTML_DIV_css_path']; ?>/html_div.css"/>
    <?php endif; ?>
    <?php
      // Firebug Lite.
      if ($tools['firebuglite']): ?>
      <script type="text/javascript" src="https://getfirebug.com/firebug-lite.js">
      {
        startOpened: true
      }
      </script>
    <?php endif; ?>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div id="header-container">
      <header class="wrapper clearfix">
        <h1 id="title">Debugging PHP Essentials</h1>
      </header>
    </div>
    <div id="main-container">
      <div id="main" class="wrapper clearfix">
        <article><?php require_once 'demo.php'; ?></article>
      </div> <!-- #main -->
    </div> <!-- #main-container -->
    <div id="footer-container">
      <footer class="wrapper">
        <h3></h3>
      </footer>
    </div>
    <?php if ($tools['phpdebug']) $PHP_Debug->display(); ?>
  </body>
</html>
