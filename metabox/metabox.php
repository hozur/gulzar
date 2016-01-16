<?php
//自定义面板类的实例化
/**********title*************/
$options_1 = array();


//page参数为在页面和文章中都添加面板
//context参数为面板在后台的位置，比如side则显示在侧栏
$boxinfo = array('title' => 'Soft Information', 'id'=>'doghapbox', 'page'=>array('page','post'), 'context'=>'normal', 'priority'=>'low', 'callback'=>'');


$options_1[] = array(
			"name" => "Description : ",
			"desc" => "",
			"id" => "description",
			"size"=>"80",
			"std" => "",
			"width"=>"90",
			"height"=>"5",
			//"dir"=>"rtl",
			"type" => "textarea"
			);


$options_1[] = array(
			"name" => "slider_1 image Address : ",
			"desc" => "",
			"id" => "slider_1",
			"size"=>"80",
			"std" => "",
			"dir"=>"ltr",
			"type" => "text"
			);

$options_1[] = array(
			"name" => "slider_2 image Address : ",
			"desc" => "",
			"id" => "slider_2",
			"size"=>"80",
			"std" => "",
			"dir"=>"ltr",
			"type" => "text"
			);

$options_1[] = array(
			"name" => "slider_3 image Address : ",
			"desc" => "",
			"id" => "slider_3",
			"size"=>"80",
			"std" => "",
			"dir"=>"ltr",
			"type" => "text"
			);
			
$new_box = new menzil_meta_box($options_1, $boxinfo);

?>