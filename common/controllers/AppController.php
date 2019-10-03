<?php 

namespace common\controllers;

use yii\base\Controller;

class AppController extends Controller 
{
    public $layout = '@frontend/views/layouts/eshoper.php';

    public function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }
}