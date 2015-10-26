<?php

App::uses('Helper', 'View');
class VimeoHelper extends Helper
{
    /**
     * Creates Vimeo Embed Code from a given Vimeo Video.
     *
     *    @param String $vimeo_id URL or ID of Video on Vimeo.com
     *    @param Array $usr_options VimeoHelper Options Array (see below)
     *    @return String HTML output.
    */
    function getEmbedCode($vimeo_id, $usr_options = array())
    {
        // Default options.
        $options = array
        (
            'width' => 630,
            'height' => 354,
            'title' => 0,
            'byline' => 0,
            'portrait' => 0,
        	'color' => '00adef',
        	'frameborder' => 1,
        	'autoplay' => 1,
        	'loop' => 1,
        	'mozallowfullscreen' =>"",
        	'webkitallowfullscreen' =>"",
            
        );
        $options = array_merge($options, $usr_options);
        
        // Extract Vimeo.id from URL.
        if (substr($vimeo_id, 0, 21) == 'http://www.vimeo.com/') {
            $vimeo_id = substr($vimeo_id, 21);
        }

        $output = array();
        $output[] = sprintf('<object width="%s" height="%s">', $options['width'], $options['height']);
        $output[] = ' <param name="allowfullscreen" value="false" />';
        $output[] =    ' <param name="allowscriptaccess" value="always" />';
        $output[] =    sprintf(' <param name="movie" value="http://www.vimeo.com/moogaloop.swf?clip_id=%s&server=www.vimeo.com&title=%s&byline=%s&portrait=%s&color=%s&autoplay=1&fullscreen=0" />', $vimeo_id, $options['title'], $options['byline'], $options['portrait'], $options['color'],$options['autoplay']);
        $output[] = sprintf(' <embed src="http://www.vimeo.com/moogaloop.swf?clip_id=%s&server=www.vimeo.com&title=%s&byline=%s&portrait=%s&color=%s&autoplay=1&fullscreen=0" type="application/x-shockwave-flash" allowfullscreen="false" allowscriptaccess="" width="%s" height="%s"></embed>', $vimeo_id, $options['title'], $options['byline'], $options['portrait'], $options['color'], $options['width'], $options['height'],$options['autoplay']);
        $output[] = '</object>';
        
        return $this->output(implode($output, "\n"));
    }
    
    
function getEmbedThumbnilCode($vimeo_id, $usr_options = array())
    {
        // Default options.
        $options = array
        (
            'width' => 100,
            'height' => 56,
            'title' => 0,
            'byline' => 0,
            'portrait' => 0,
        	'color' => '00adef',
        	'frameborder' => 0,
        	'mozallowfullscreen' =>"",
        	'webkitallowfullscreen' =>"",
            
        );
        $options = array_merge($options, $usr_options);
        
        // Extract Vimeo.id from URL.
        if (substr($vimeo_id, 0, 21) == 'http://www.vimeo.com/') {
            $vimeo_id = substr($vimeo_id, 21);
        }

        $output = array();
        $output[] = sprintf('<object width="%s" height="%s">', $options['width'], $options['height']);
        $output[] = ' <param name="allowfullscreen" value="false" />';
        $output[] =    ' <param name="allowscriptaccess" value="always" />';
        $output[] =    sprintf(' <param name="movie" value="http://www.vimeo.com/moogaloop.swf?clip_id=%s&server=www.vimeo.com&title=%s&byline=%s&portrait=%s&color=%s&fullscreen=0" />', $vimeo_id, $options['title'], $options['byline'], $options['portrait'], $options['color']);
        $output[] = sprintf(' <embed src="http://www.vimeo.com/moogaloop.swf?clip_id=%s&server=www.vimeo.com&title=%s&byline=%s&portrait=%s&color=%s&fullscreen=0" type="application/x-shockwave-flash" allowfullscreen="false" allowscriptaccess="" width="%s" height="%s"></embed>', $vimeo_id, $options['title'], $options['byline'], $options['portrait'], $options['color'], $options['width'], $options['height']);
        $output[] = '</object>';
        
        return $this->output(implode($output, "\n"));
    }
}
?> 