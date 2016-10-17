<?php
/**
 * Created by PhpStorm.
 * User: Comp
 * Date: 10/17/2016
 * Time: 3:46 PM
 */

namespace Sitemaps\Abstracts;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use ReviewsBee\Support\BaseModel;

class AbstractSitemap
{
    protected $locations = [];
    protected $config = [];

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        if(! $this->config)
            $this->config = new \stdClass();

        $this->config->root = Config::get('app.url');
        $this->config->lastmod = Carbon::now()->toDateString();
        $this->config->type = 'sitemaps';
        $this->config->extension = 'xml';
        $this->config->priority = 0.7;
        $this->config->changefreq = 'weekly';


        return $this;
    }
    
    public function setLocations($location)
    {
        if (is_array($location)){
            $_location = [];
            foreach ($location as $key => $value){
                if (is_array($value)){
                    $this->setLocations($value);
                } else {
                    $_location[$key] = $value;
                }
            }

            if (!empty($_location))
                $this->locations[] = (object)$_location;
        }

        return $this;
    }

    public function addModel($modelClass){

        if (is_array($modelClass)){
            foreach ($modelClass as $class) {
                $this->addModel($class);
            }
        } else {
            $this->renderModel($modelClass);
        }
    }

    public function renderModel($modelClass){
        $model = new $modelClass;
        if ($model instanceof BaseModel) {
            $name = $model->getLink();
        } elseif ($model instanceof Model) {
            $name = $model->getTable();
        }
    }

    public function getConfig($key){
        return $this->config->{$key};
    }

    public function setConfig($key,$value)
    {
        $this->config->{$key} = $value;

        return $this;
    }

    public function generate()
    {
        $content =  view('sitemap::'.$this->getConfig('extension').'.'.$this->getConfig('type'))->withLocations($this->locations)->withConfigs($this->config);
        return Response::make($content, '200')->header('Content-Type', 'text/xml');
    }
}