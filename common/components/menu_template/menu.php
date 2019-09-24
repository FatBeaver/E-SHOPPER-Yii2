<?php 

use yii\helpers\Url;

?>
<?php if(isset($category['childs'])): ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordian" href="#<?= strtolower($category['name'])?>">
                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
            </a>
            <a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>"><?= $category['name'] ?></a>
        </h4>
    </div>
    <div id="<?= strtolower($category['name'])?>" class="panel-collapse collapse">
        <div class="panel-body">
            <ul>
                <?php foreach($category['childs'] as $child): ?>
                    <li><a href="<?= Url::to(['category/view', 'id' => $child['id']]) ?>"><?= $child['name'] ?></a></li>
                <?php endforeach;?>    
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(!isset($category['childs'])): ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordian" href="#<?= strtolower($category['name'])?>">
            </a>
            <a href="<?= Url::to(['category/view', 'id' => $category['id']]) ?>"><?= $category['name'] ?></a>
        </h4>
    </div>
</div>
<?php endif; ?>