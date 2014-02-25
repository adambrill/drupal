<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
?>

<header class="site-header">
  <div>
    <?php if ($logo): ?>
      <span class="logo">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">Stream Energy | Ignite</a>
      </span>
    <?php endif; ?>
    
    <?php print render($page['header']); ?>

    <?php if ($secondary_menu): ?>
      <?php print theme('links__system_secondary_menu', array(
        'links' => $secondary_menu,
        'attributes' => array(
          'class' => array('utility'),
        ),
      )); ?>
    <?php endif; ?>
    <nav>
      <?php

      $main_menu_start = array_slice($main_menu, 0, ceil(count($main_menu) / 2));
      $main_menu_end = array_slice($main_menu, ceil(count($main_menu) / 2));
      ?>

      <?php if ($main_menu_start): ?>
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu_start,
        )); ?>
      <?php endif; ?>
      <?php if ($main_menu_end): ?>
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu_end,
        )); ?>
      <?php endif; ?>
    </nav>
  </div>
</header>

<div class="wrapper">

  <section class="main-banner">
    <div class="inner">
      
    </div>
  </section>
  
  <div class="center-content">
  

    
<!--
    <?php if ($main_menu): ?>
      <?php print theme('links__system_main_menu', array(
        'links' => $main_menu,
      )); ?>
    <?php endif; ?>
-->


    

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">

    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>

    <div id="content" class="column"><div class="section">
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title">
          <?php print $title; ?>
        </h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>

    </div></div> <!-- /.section, /#content -->

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_second']); ?>
      </div></div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>

  </div></div> <!-- /#main, /#main-wrapper -->

  <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
    <div id="triptych-wrapper"><div id="triptych" class="clearfix">
      <?php print render($page['triptych_first']); ?>
      <?php print render($page['triptych_middle']); ?>
      <?php print render($page['triptych_last']); ?>
    </div></div> <!-- /#triptych, /#triptych-wrapper -->
  <?php endif; ?>

  <div id="footer-wrapper"><div class="section">

    <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
      <div id="footer-columns" class="clearfix">
        <?php print render($page['footer_firstcolumn']); ?>
        <?php print render($page['footer_secondcolumn']); ?>
        <?php print render($page['footer_thirdcolumn']); ?>
        <?php print render($page['footer_fourthcolumn']); ?>
      </div> <!-- /#footer-columns -->
    <?php endif; ?>

    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->




  </div>
</div>

<footer class="site-footer">
    <div class="inner">
      <div class="grid three">
        <div class="col">
          <ul>
            <li><a href="#"><img src="/themes/streamenergy/assets/i/img-footer-get-free-energy.png" alt="Get Free Energy" width="159" height="44" /></a></li>
            <li><a href="#"><img src="/themes/streamenergy/assets/i/img-footer-renew-my-contract.png" alt="Renew My Contract" width="120" height="45" /></a></li>
            <li><a href="#"><img src="/themes/streamenergy/assets/i/img-footer-powercenter.png" alt="Login to view your PowerCenter" width="184" height="33" /></a></li>
          </ul>
        </div>
        <div class="col quick-links">
          <h3 class="icon-quicklinks text">Quick Links</h3>
          
          <ul>
            <li><a href="#">Rates</a></li>
            <li><a href="#">Press</a></li>
            <li><a href="#">Pay My Bill</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Philanthropy</a></li>
          </ul>
        </div>
        <div class="col social">
          <h3 class="icon-social text">Social</h3>
          
          <ul>
            <li><a class="icon-facebook text" href="#">Facebook</a></li>
            <li><a class="icon-twitter text" href="#">Twitter</a></li>
            <li><a class="icon-youtube text" href="#">YouTube</a></li>
            <li><a class="icon-pinterest text" href="#">Pinterest</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="copyright">
      <div class="inner">
        <p>© 2005-2013 SGE IP Holdco, LLC. All rights reserved. Licensed in TX, GA, PA, MD, NJ, NY, &amp; DC<br />
        (TX #10104, GA #GM-38, NJ #ESL-0109 &amp; GSL-0120, PA #A-2010-2181867 &amp; A-2012-2308991, MD #IR-2072 &amp; IR-2742, NY #STRM, DC EA11-11)</p>
        <ul>
          <li><img src="/themes/streamenergy/assets/i/img-bbb-logo.png" alt="BBB" /></li>
          <li><img src="/themes/streamenergy/assets/i/img-dsa-member-logo.png" alt="DSA Member" /></li>
        </ul>
      </div>
    </div>
  </footer>
