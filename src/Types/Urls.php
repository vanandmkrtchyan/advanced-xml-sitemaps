<?php
/**
 * Created by PhpStorm.
 * User: Comp
 * Date: 10/16/2016
 * Time: 1:49 PM
 */

namespace Sitemaps\Types;

use Illuminate\Database\Eloquent\Model;
use ReviewsBee\Support\BaseModel;
use Sitemaps\Abstracts\AbstractSitemap;

class Urls extends AbstractSitemap
{
    public function __construct()
    {
        parent::init();
        $this->setConfig('type','urls');
    }


    public function renderModel($modelClass){
        $model = new $modelClass;
        $name = null;
        if ($model instanceof BaseModel) {
            $name = $model->getLink();
        } elseif ($model instanceof Model) {
            $name = $model->getTable();
        }
        if ($name){
            foreach ($model->all() as $item){
                $this->setLocations([
                    'loc' => $this->getConfig('root') . '/' . $item->slug
                ]);
            }
        }
    }
}