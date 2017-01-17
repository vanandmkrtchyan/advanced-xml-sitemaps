<?php
/**
 * Created by PhpStorm.
 * User: Comp
 * Date: 10/17/2016
 * Time: 3:37 PM
 */

namespace Sitemaps;



use Sitemaps\Types\Sitemaps;
use Sitemaps\Types\Urls;

class Sitemap
{
    public static function make($type = 'urls')
    {
        if ( $type == 'urls' )
            return new Urls();
        elseif ( $type == 'sitemaps' )
            return new Sitemaps();
        return false;
    }
}