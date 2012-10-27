<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	'Manage',
);

$this->menu=array(
        array('label'=>'Меню', 'itemOptions'=>array('class'=>'nav-header')),
        array('label'=>'Список новостей', 'url'=>array('index')),
        array('label'=>'Создать новость', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('news-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Менеджер новостей</h1>

<p>
Управляем новостями
</p>

<?php echo CHtml::link('Быстрый поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php

$gridColumns = array(
    array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
    array('name'=>'title', 'header'=>'Название'),
    array('name'=>'text', 'header'=>'Текст'),
    array('name'=>'created_date', 'header'=>'Дата создания'),
    array('name'=>'author.username', 'header'=>'Автор'),
    array('name'=>'url', 'header'=>'Алиас'),
    array('name'=>'teaser', 'header'=>'Анонс'),
    array('name'=>'status', 'header'=>'Статус'),
    array(
        'htmlOptions' => array('nowrap'=>'nowrap'),
        'class'=>'bootstrap.widgets.TbButtonColumn',
        'viewButtonUrl'=>'Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey))',
        'updateButtonUrl'=>'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey))',
        'deleteButtonUrl'=>'Yii::app()->controller->createUrl("delete",array("id"=>$data->primaryKey))',
    )
);

$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$model,
    'fixedHeader' => true,
    'headerOffset' => 40,
    'type'=>'striped bordered',
    'dataProvider' =>$model->search(),
    'template' => "{items}{pager}",
    'columns' => $gridColumns,
));

?>
