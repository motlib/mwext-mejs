<?php

/**
 * The Mejs extension embeds the MediaElement.js mediaplayer into
 * Mediawiki pages by using the <video> tag.
 *
 * @author Andreas Schroeder <andreas@a-netz.de>
 */
class MejsHooks {

    /**
     * Register parser hooks
     * See also http://www.mediawiki.org/wiki/Manual:Parser_functions
     */
    public static function onParserFirstCallInit( &$parser ) {
        // Add the following to a wiki page to see how it works:
        //  <dump>test</dump>
        //  <dump foo="bar" baz="quux">test content</dump>
        $parser->setHook( 'video', 'MejsHooks::parserTagVideo' );

        return true;
    }

    /**
     * Build html attribute string.
     */
    private static function getHtmlOpts($opts) {
        $result = '';
            
        foreach($opts as $opt => $val) {
            $result .= $opt . '="' . htmlspecialchars($val) . '" ';
        }
                
        return $result;
    }
    
    
    /**
     * Parser hook handler for <video>
     *
     * @param string $data: The content of the tag.
     * @param array $params: The attributes of the tag.
     * @param Parser $parser: Parser instance available to render
     *  wikitext into html, or parser methods.
     * @param PPFrame $frame: Can be used to see what template
     *  arguments ({{{1}}}) this hook was used with.
     *
     * @return string: HTML to insert in the page.
     */
    public static function parserTagVideo( $data, $attribs, $parser, $frame ) {

        // Very important to escape user data with htmlspecialchars() to prevent
        // an XSS security vulnerability.

        $def_opts = array('width' => 640, 'height' => 480);

        /* discard all options which are not in def_opts */
        //$opts = array_intersect_keys($def_opts, $attribs);
        $opts = array_merge($def_opts, $attribs);

        /* Parse data to support videos like [[Media:File.mp4]] */
        $data = $parser->recursiveTagParse( $data, $frame );
        $opts['src'] = $data;
        
        $html = '<video ' . MejsHooks::getHtmlOpts($opts) . '></video>';

        $parserOutput = $parser->getOutput();
        $parserOutput->addModules( 'ext.mejs' );
                
        return $html;
    }

};
