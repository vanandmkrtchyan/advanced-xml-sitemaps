<?php
/**
 * Created by PhpStorm.
 * User: Comp
 * Date: 10/16/2016
 * Time: 1:49 PM
 */

namespace Sitemaps;


use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class Sitemap
{
    protected $config;
    protected $urlset = [];
    protected $sitemaps = [];

    public function __construct($config = null)
    {
        if ($config)
            $this->setupConfig($config);
        $this->init();
    }

    public function init()
    {
        if(! $this->config)
            $this->config = new \stdClass();

        $this->config->root = Config::get('app.url');
        $this->config->lastmod = Carbon::now()->toDateString();
        $this->config->type = 'xml';

        $this->setUrl([
            'loc' => $this->getConfig('root'),
            'lastmod' => $this->getConfig('lastmod'),
            'changefreq' => 'weekly',
            'priority' => 1,
        ]);

        return $this;
    }

    private function setupConfig($config)
    {
        $this->config = new \stdClass();
        foreach ($config as $key => $conf){
            $this->config->{$key} = $conf;
        };
    }

    public function getConfig($key){
        return $this->config->{$key};
    }

    public function setConfig($key,$value)
    {
        $this->config->{$key} = $value;

        return $this;
    }

    public function setUrl($urlset)
    {
        if (is_array($urlset)){
            $_url = [];
            foreach ( $urlset as $key => $url){
                if (is_array($url)){
                    $this->setUrl($url);
                } else {
                    $_url[$key] = $url;
                }
            }

            if (!empty($_url))
                $this->urlset[] = $_url;
        }

        return $this;
    }

    public function setSitemap($sitemap)
    {
        if (is_array($sitemap)){
            $_sitemap = [];
            foreach ($sitemap as $key => $map){
                if (is_array($map)){
                    $this->setSitemap($map);
                } else {
                    $_sitemap[$key] = $map;
                }
            }

            if (!empty($_sitemap))
                $this->sitemaps[] = $_sitemap;
        }

        return $this;
    }

    public function generate()
    {
        return view('sitemap::xml');
    }
    
}