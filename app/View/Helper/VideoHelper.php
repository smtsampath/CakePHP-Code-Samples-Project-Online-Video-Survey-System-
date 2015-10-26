<?php
/**
* Author: Tomas Pavlatka [tomas.pavlatka@gmail.com]
* Created: Sep 8, 2011
*/

class VideoHelper extends Helper {
    /*
     * Options (Private).
     * 
     * holds options for helper
     */
    var $_options = array(
        'width'             => 624,          // Sets player width
        'height'            => 369,          // Sets player height
    	'type'              => 'application/x-shockwave-flash',
        'class'             => 'youtube',        
        'allowfullscreen'   => 'false',       // Gives script access to fullscreen (This is required for the fs player setting to work)
        'allowscriptaccess' => 'always',
   		 'frameborder' 		=> 0,
        'wmode'             => 'transparent' ,// Ensures player stays under overlays such as lightbox/fancybox 
        'video_id'  => null);

    /*
     * Player Vars (Private).
     * 
     * holds parameters for embedded player
     * @see http://code.google.com/apis/youtube/player_parameters.html?playerVersion=HTML5
     */
     var $_playerVars = array(         
     
      		'fs'        => true,   // Enables / Disables fullscreen playback
            'hd'        => true,   // Enables / Disables HD playback (Chromeless player does not support this setting)
            'egm'       => false,  // Enables / Disables advanced context (Right-Click) menu
            'rel'       => false,  // Enables / Disables related videos at the end of the video
            'loop'      => false,  // Loops video once its finished
            'start'     => 0,      // Start the video at X seconds
            'version'   => 3,      // For chromeless player set version to 3
            'autoplay'  => true,  // Automatically starts video when page is loaded
            'autohide'  => false,  // Automatically hides controls once the video begins
            'controls'  => false,   // Enables / Disables player controls (Chromeless Only)
            'showinfo'  => false,  // Enables / Disables information like the title before the video starts playing
            'disablekb' => false,  // Enables / Disables keyboard controls
            'theme'     => 'dark'); // Dark / Light style themes 

     /*
      * iFrame Code.
      * 
      * holds code for iFrame Player
      */
     var $_frameCode = null;

     /**
      * Init.
      * 
      * inits helper
      * @param array $options - option for helper
      * @param array $playerVars - parameters for embedded player
      */
     function init(array $options = array(),array $playerVars = array()) {
          $this->_options = am($this->_options,$options);
          $this->_playerVars = am($this->_playerVars,$playerVars);
     }

    /**
     * iFrame Player.
     * 
     * creates script for iframe player and returns it back
     * @param string url - url of youtube video
     * @param string divId - id of div element
     */
    function iframePlayer($url,$divId) {
        // Get video id.
        $this->_parseVideoId($url);

        // Validation.
        if(empty($this->_options['video_id'])) {
            $this->_iframeCode = __('Video id cannot be left blank. Check url of youtube video.',true);
        } else if(!is_numeric($this->_options['width']) || $this->_options['width'] < 1) {
            $this->_iframeCode = __('Width of video player must be numeric and greather than 1.',true);
        } else if(!is_numeric($this->_options['height']) || $this->_options['height'] < 1) {
            $this->_iframeCode = __('Height of video player must be numeric and greather than 1.',true);
        } else {
            // Build code.
            $this->_loadIframePlayer();
            $this->_createIframePlayer($divId);
            $this->_closeIframePlayer();
        }

        // Return code.
        return $this->_iframeCode;
    }

    /**
     * Close iFrame Player (Private)
     * 
     * closes iframe player.
     */
    function _closeIframePlayer() {
        $this->_iframeCode  .= '</script>';
    }

    /**
     * Create iFrame Player.
     * 
     * creates iframe player.
     * @param string divId - id of div element
     */
    function _createIframePlayer($divId) {

        // Build player params.
        $params = null;
        foreach($this->_playerVars as $key => $value) {
            if(is_numeric($value) || !empty($value)) {
                 $params .= "'{$key}': ";
 
                 if(is_numeric($value)) {
                  $params .= $value;
                 } else {
                      $params .= "'{$value}'";
                 }

                 $params .= ',';
            }    
        }

        // Build JS code.
        $this->_iframeCode .= 'var player;'."\r\n";
        $this->_iframeCode .= 'function onYouTubePlayerAPIReady() {'."\r\n";
        $this->_iframeCode .= 'player = new YT.Player("'.$divId.'", {'."\r\n";
        $this->_iframeCode .= 'height: "'.(int)$this->_options['height'].'",'."\r\n";
        $this->_iframeCode .= 'width:  "'.(int)$this->_options['width'].'",'."\r\n";
        $this->_iframeCode .= 'videoId: "'.$this->_options['video_id'].'",'."\r\n";
        if(!empty($params)) {
            $this->_iframeCode .= 'playerVars: {'.substr($params,0,-1).'},'."\r\n";
        }
        $this->_iframeCode .= '});'."\r\n";
        $this->_iframeCode .= '}'."\r\n\r\n";    
    }

    /**
     * Load iFrame Player (Private).
     * 
     * starts building iframe player code.
     */
    function _loadIframePlayer() {
        $this->_iframeCode  = '<script type="text/javascript">'."\r\n";
        $this->_iframeCode .= 'var tag = document.createElement("script");'."\r\n";
        $this->_iframeCode .= 'tag.src = "http://www.youtube.com/player_api"'."\r\n";
        $this->_iframeCode .= 'var firstScriptTag = document.getElementsByTagName("script")[0]'."\r\n";
        $this->_iframeCode .= 'firstScriptTag.parentNode.insertBefore(tag, firstScriptTag)'."\r\n\r\n";
    }

    /**
     * Parse Video Id (Private).
     * 
     * parses video id from url
     * @param string $url - url from youtube
     */
    function _parseVideoId($url) {
        //http://www.youtube.com/watch?v=UF6wdrRAZug&feature=relmfu    

        $urlQuery = parse_url($url,PHP_URL_QUERY);
        if(!empty($urlQuery)) {
            $parseArray = explode('&',$urlQuery);
            foreach($parseArray as $key => $value) {
                $explodeArray = explode('=',$value);
                if($explodeArray[0] == 'v' && isset($explodeArray[1])) {
                    $this->_options['video_id'] = (string)$explodeArray[1];
                    break;
                }
            }
        }
    }
} 