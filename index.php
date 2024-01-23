<html>
  <head>
    <title>Cookie Permissions Demo</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="main.js"></script>
    <link rel="stylesheet" href="styles.css" type="text/css" media="all">
  </head>
  <body>

  <?php
    // this segment of code can go higher in the document (typically the footer)

    // Establishing default value for $cookieLink
    $cookieLink = 'http://www.allaboutcookies.org/';

    // Detecting current site language (connected to wordpress WPML plugin)
    global $sitepress;
    $page_lang = $sitepress->get_current_language();

    // if the pages language in 'es' or 'de', change value of $cookieLink
    if ($page_lang == 'es') {
        $cookieLink = 'http://www.allaboutcookies.org/es/';
    } elseif ($page_lang == 'de') {
        $cookieLink = 'http://www.allaboutcookies.org/ge/';
    }
  ?>
  <?php if(!isset($_COOKIE["europePopupShown"])) { // if europePopupShown cookie hasn't been set, show contents ?>
      <?php // The display none will get changed to display block once the script is ready ?>
      <div class="cookie_popup" style="display: none;">
          <div>
              <?php // The surrounding __('Of text strings') is to allow for string translations in WPML ?>
              <p><?php echo __('Destination BC uses "cookies" to enhance the usability of its websites and provide you with a more personal experience. By using this website, you agree to our use of cookies as explained in our <a href="/legal-privacy-policy/" target="_blank" title="Privacy Policy">Privacy Policy</a>') ?></p>

              <ul class="list-unstyled">
                  <li class="cookies"><a href="<?php echo $cookieLink ?>" title="<?php echo __('Learn more about Cookies') ?>" rel="nofollow" target="_blank"><?php echo __('Learn more about Cookies') ?></a></li>
                  <li><button class="btn btn-teal" id="popup_agree" name="popup_agree" type="button" value="I agree"><?php echo __('I Understand') ?></button></li>
              </ul>

          </div>
      </div>
  <?php } ?>

  </body>
</html>
