<?php
/*-----------------------------------------------------------------------------------*/
/*	   eliteempresarial-child // Functions @BooWeb Last edition: 13/6/17
/*-----------------------------------------------------------------------------------*/

/**
 * Disable the auto generated email sent to the admin after a core update
 */
 apply_filters( 'auto_core_update_send_email', false, $type, $core_update, $result );


// utility function to dynamically create cache-buster, based on file's last modified date
// adapted from: http://www.particletree.com/notebook/automatically-version-your-css-and-javascript-files/
if ( !function_exists( 'atg_create_cache_buster' ) ) {
  function atg_create_cache_buster( $url ){
    return filemtime( $url );
  }
}

// utility function to dynamically add cache-buster to file name
// adapted from: http://www.particletree.com/notebook/automatically-version-your-css-and-javascript-files/
if ( !function_exists( 'atg_add_cache_buster' ) ) {
  function atg_add_cache_buster( $url, $buster ){
    $path = pathinfo( $url );
    $ver = '.' . $buster . '.';
    return $path['dirname'] . '/' . str_replace( '.', $ver, $path['basename'] );
  }
}

// add the critical CSS in the <head>
if ( ! function_exists( 'atg_add_css' ) ) :
  function atg_add_css() {

    // name of css file
    $cssfile = '/style-min.css';

    // file path for the css file
    $csspath = get_stylesheet_directory() . $cssfile;

    // get cache-buster
    $cachebuster = (string) atg_create_cache_buster( $csspath );

    // url for the css file
    $cssurl = atg_add_cache_buster( get_stylesheet_directory_uri() . $cssfile, $cachebuster );

    // check if they need the critical CSS
    if ( $_COOKIE['atg-csscached'] == $cachebuster ) {

      // if they have the cookie, then they have the CSS file cached, so simply enqueue it
        wp_enqueue_style( 'atg-style', $cssurl );

    } else {

      // write the critical CSS into the page
      echo '<style>';
        include( get_stylesheet_directory() . '/critical-min.css' );
      echo '</style>'.PHP_EOL;

      // add loadCSS to the page; note the PHP variables mixed in for the cookie setting
      echo "<script>!function(e,t){'use strict';function s(s){function n(){var t,s;for(s=0;s-1&&(t=!0);t?r.media='all':e.setTimeout(n)}var r=t.createElement('link'),i=t.getElementsByTagName('script')[0],a=t.styleSheets;return r.rel='stylesheet',r.href=s,r.media='only x',i.parentNode.insertBefore(r,i),n(),r}s('".$cssurl."'),t.cookie='atg-csscached=".$cachebuster.";expires=\"".date("D, j M Y h:i:s e", strtotime("+1 week"))."\";path=/'}(this,this.document);</script>".PHP_EOL;

      // add the full CSS file inside of a noscript, just in case
      echo '<noscript><link rel="stylesheet" href="'.$cssurl.'"></noscript>'.PHP_EOL;
    }

  } // atg_add_css
endif; // function_exists

?>