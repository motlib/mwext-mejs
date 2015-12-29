<?php
/* MediaElement Mediawiki extension */

$wgExtensionCredits['other'][] = array(
    'path' => __FILE__,

    // Name of your Extension:
    'name' => 'mejs',

    // Sometime other patches contributors and minor authors are not worth
    // mentionning, you can use the special case '...' to output a localised
    // message 'and others...'.
    'author' => array(
        'Andreas Schroeder',
    ),

    'version'  => '0.0.0',

    // The extension homepage. www.mediawiki.org will be happy to host
    // your extension homepage.
    'url' => 'n/a',


       # Key name of the message containing the description.
    'descriptionmsg' => 'mejs_msg',
);


/* Setup */

// Initialize an easy to use shortcut:
$dir = dirname( __FILE__ );
$dirbasename = basename( $dir );


// Register modules
// See also http://www.mediawiki.org/wiki/Manual:$wgResourceModules
// ResourceLoader modules are the de facto standard way to easily
// load JavaScript and CSS files to the client.
$wgResourceModules['ext.mwjs.player'] = array(
    'scripts' => array(
        'mejs/jquery.js',
        'mejs/mediaelement-and-player.min.js',
    ),
    'styles' => array(
        'mejs/mediaelementplayer.min.css',
    ),
    'messages' => array(
    ),
    'dependencies' => array(
    ),

    'localBasePath' => $dir,
    'remoteExtPath' => 'mejs',
);