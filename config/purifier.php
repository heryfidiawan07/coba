<?php
/**
 * Ok, glad you are here
 * first we get a config instance, and set the settings
 * $config = HTMLPurifier_Config::createDefault();
 * $config->set('Core.Encoding', $this->config->get('purifier.encoding'));
 * $config->set('Cache.SerializerPath', $this->config->get('purifier.cachePath'));
 * if ( ! $this->config->get('purifier.finalize')) {
 *     $config->autoFinalize = false;
 * }
 * $config->loadArray($this->getConfig());
 *
 * You must NOT delete the default settings
 * anything in settings should be compacted with params that needed to instance HTMLPurifier_Config.
 *
 * @link http://htmlpurifier.org/live/configdoc/plain.html
 */

return [
    'encoding'      => 'UTF-8',
    'finalize'      => true,
    'preload'       => false,
    'cachePath'     => storage_path('app/purifier'),
    'cacheFileMode' => 0755,
    'settings'      => [
        'default' => [
            'HTML.Doctype'             => 'XHTML 1.0 Strict',
            'HTML.Allowed'             => 'h3[class],h4[class],h5[class],h6[class],div[class],b,strong,i,em,a[href|title|class],ul,ol,li,p[style|class],br,span[style|class],img[width|height|alt|src|class]', 
            'CSS.AllowedProperties'    => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
            'AutoFormat.AutoParagraph' => false,
            'AutoFormat.RemoveEmpty'   => true,
        ],
        'test'    => [
            'Attr.EnableID' => true,
            'Attr.AllowedClasses' => true,
        ],
        "youtube" => [
            "HTML.SafeIframe"      => 'true',
            "URI.SafeIframeRegexp" => "%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%",
        ],
    ],

];
