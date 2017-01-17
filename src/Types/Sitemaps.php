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

class Sitemaps extends AbstractSitemap
{
    public function __construct()
    {
        parent::init();
        $this->setConfig('type','sitemaps');
    }

}