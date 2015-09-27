<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  
  <!-- Bootstrap -->
  <link href="<?php print base_path().  path_to_theme(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php print base_path().  path_to_theme(); ?>/assets/css/bootstrap-theme.css" rel="stylesheet">
  <link href="<?php print base_path().  path_to_theme(); ?>/css/style.css" rel="stylesheet">
  <?php $path = base_path() . drupal_get_path('module', 'system'); ?>
  <link href="<?php print $path; ?>/system.messages.css" rel="stylesheet">
    
  <link href="<?php print base_path().  path_to_theme(); ?>/css/custom.css" rel="stylesheet">
  <link href="<?php print base_path().  path_to_theme(); ?>/css/custom2.css" rel="stylesheet">
  <link href="<?php print base_path().  path_to_theme(); ?>/font/font-awesome-4.4.0/css/font-awesome.css" rel="stylesheet">
  <!-- Owl Carousel Assets -->
  <link href="<?php print base_path().  path_to_theme(); ?>/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?php print base_path().  path_to_theme(); ?>/owl-carousel/owl.theme.css" rel="stylesheet">
    
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <?php
    if(isset($_SESSION['paid_user']) && $_SESSION['paid_user'] == 1) {
  ?>
  <!-- Facebook Conversion Code for Registrations SpringUp -->
    <script>(function() {
      var _fbq = window._fbq || (window._fbq = []);
      if (!_fbq.loaded) {
        var fbds = document.createElement('script');
        fbds.async = true;
        fbds.src = '//connect.facebook.net/en_US/fbds.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(fbds, s);
        _fbq.loaded = true;
      }
    })();
    window._fbq = window._fbq || [];
    window._fbq.push(['track', '6029529298271', {'value':'0.00','currency':'USD'}]);
    </script>
    <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6029529298271&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
  <?php
    }  
  ?>
    <?php if(drupal_is_front_page()) { ?>
    <script>
     
    jQuery(document).ready(function() {
      jQuery('a[href*=#]').each(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
        && location.hostname == this.hostname
        && this.hash.replace(/#/,'') ) {
          var $targetId = jQuery(this.hash), $targetAnchor = jQuery('[name=' + this.hash.slice(1) +']');
          var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
           if ($target) {
             var targetOffset = $target.offset().top;

             
             jQuery(this).click(function() {
                jQuery("#nav li a").removeClass("active");
                jQuery(this).addClass('active');
                jQuery('html, body').animate({scrollTop: targetOffset}, 1000);
               return false;
             });
          }
        }
      });

    });
    </script>
    <?php } ?>  
</head>
<body class="<?php print $classes; ?> grey lighten-2" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php print base_path().  path_to_theme(); ?>/assets/js/bootstrap.min.js"></script>
  <script src="<?php print base_path().  path_to_theme(); ?>/assets/js/init.js"></script>
  <!--OwlCrousel js-->
  <script src="<?php print base_path().  path_to_theme(); ?>/owl-carousel/owl.carousel.js"></script>
  <!--//OwlCrousel js-->
  <script src="<?php print base_path().  path_to_theme(); ?>/js/springup.js"></script>
  <?php if(arg(0) == 'user' && arg(2) == '' && is_author(arg(1))) { ?>
    <script src="<?php print base_path().  path_to_theme(); ?>/assets/js/jquery-ui.js"></script>
  <?php } ?>
    
  <script type="text/javascript">
    var clicky_site_ids = clicky_site_ids || [];
    clicky_site_ids.push(100873458);
    (function() {
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = '//static.getclicky.com/js';
      ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( s );
    })();
 </script>
 <noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/100873458ns.gif" /></p></noscript>


</body>
</html>
