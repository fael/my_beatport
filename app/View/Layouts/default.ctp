<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo Configure::read('Application.name') ?> - <?php echo !empty($title_for_layout) ? $title_for_layout : ''; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <style>
  body {
    padding-top: 60px;
    padding-bottom: 40px;
  }
  </style>
  <?php echo $this->Html->css('normalize.css') ?>
  <?php echo $this->Html->css('bootstrap-'.Configure::read('Layout.theme').'.min', null, array('data-extra' => 'theme')) ?>
  <?php echo $this->Html->css('bootstrap-responsive.min') ?>
  <?php echo $this->Html->css('style') ?>

  <?php
  if (is_file(WWW_ROOT . 'css' . DS . $this->params->controller . '.css')) {
  echo $this->Html->css($this->params->controller);
  }
  if (is_file(WWW_ROOT . 'css' . DS . $this->params->controller . DS . $this->params->action . '.css')) {
  echo $this->Html->css($this->params->controller . '/' . $this->params->action);
  }
  ?>

  <?php echo $this->Html->script('lib/modernizr') ?>
  
</head>
<body>
  <!--[if lt IE 7]>
      <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
      <![endif]-->

    <?php echo $this->element('header'); ?>
            

                  <div class="container-fluid" role="main" id="main">

                    <?php echo $this->Session->flash();?>
                    <?php echo $this->fetch('content'); ?>
                
                    <br class="clear"/>
                    <hr />

                    <footer>
                      <p>&copy; <?php echo Configure::read('Application.name') ?> 2012</p>
                    </footer>

                  </div> <!-- /container -->

                  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
                  <script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>

                  <?php
                  if (is_file(WWW_ROOT . 'js' . DS . $this->params->controller . '.js')) {
                  echo $this->Html->script($this->params->controller);
                  }
                  if (is_file(WWW_ROOT . 'js' . DS . $this->params->controller . DS . $this->params->action . '.js')) {
                  echo $this->Html->script($this->params->controller . '/' . $this->params->action);
                  }
                  ?>
                  
                 
                  
                  <?php echo $this->Html->script(
                    array(
                      'lib/bootstrap.min',
                      'src/scripts.js',
                      'app'
                      ));
                      ?>

                      <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
                      <script>
                      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                        s.parentNode.insertBefore(g,s)}(document,'script'));
                      </script>
                      
                      <script type="text/javascript">App.init();</script>
                    </body>
                    </html>