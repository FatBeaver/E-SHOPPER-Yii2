<?php 

namespace common\components;

use Yii;
use yii\base\Widget;
use frontend\models\Category;

class MenuWidget extends Widget
{   
    public $template;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if ($this->template === null)
        {
            $this->template = 'menu';
        }
        $this->template .= '.php';
    }

    public function run()
    {   
        //get cache
        $menu = Yii::$app->cache->get('menu');
        if($menu != false) {
            return $menu;
        }
        //print_r($menu);exit;
        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        //print_r($this->menuHtml);exit;
        //set cache

        Yii::$app->cache->set('menu', $this->menuHtml, 60);
    }

    protected function getTree()
    {
        $tree = [];
        foreach($this->data as $id=>&$node)
        {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree)
    {
        $str = '';
        foreach($tree as $category)
        {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category)
    {
        include __DIR__ . '/menu_template/' . $this->template;    
    }
}