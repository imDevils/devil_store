<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="/ThinkPHP/chuwei/Public/css/css.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/ThinkPHP/chuwei/Public/js/sdmenu.js"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>
<style type=text/css>
html{ SCROLLBAR-FACE-COLOR: #538ec6; SCROLLBAR-HIGHLIGHT-COLOR: #dce5f0; SCROLLBAR-SHADOW-COLOR: #2c6daa; SCROLLBAR-3DLIGHT-COLOR: #dce5f0; SCROLLBAR-ARROW-COLOR: #2c6daa;  SCROLLBAR-TRACK-COLOR: #dce5f0;  SCROLLBAR-DARKSHADOW-COLOR: #dce5f0; overflow-x:hidden;}
body{overflow-x:hidden; background:url(images/main/leftbg.jpg) left top repeat-y #f2f0f5; width:194px;}
</style>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
	<div><img src="/ThinkPHP/chuwei/Public/images/main/member.gif" width="44" height="44" /></div>
    <span>用户：<?php echo ($username); ?><br>角色：<?php echo ($identity); ?></span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
      <div class="collapsed">
        <span>用户管理</span>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main.html" target="mainFrame" onFocus="this.blur()">后台首页</a>
		<a href="/ThinkPHP/chuwei/admin.php/Index/personal.html" target="mainFrame" onFocus="this.blur()">个人信息</a>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main_list.html" target="mainFrame" onFocus="this.blur()">管理员列表</a>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main_info.html" target="mainFrame" onFocus="this.blur()">添加管理员</a>
      </div>
      <div>
        <span>关于九牧</span>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main.html" target="mainFrame" onFocus="this.blur()">九牧简介</a>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main_list.html" target="mainFrame" onFocus="this.blur()">发展历程</a>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main_info.html" target="mainFrame" onFocus="this.blur()">公益活动</a>
      </div>
      <div>
        <span>新闻管理</span>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main.html" target="mainFrame" onFocus="this.blur()">公司动态</a>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main.html" target="mainFrame" onFocus="this.blur()">行业动态</a>
      </div>
      <div>
        <span>产品管理</span>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main.html" target="mainFrame" onFocus="this.blur()">浴室柜</a>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main.html" target="mainFrame" onFocus="this.blur()">洗脸盆</a>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main.html" target="mainFrame" onFocus="this.blur()">淋浴房</a>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main.html" target="mainFrame" onFocus="this.blur()">浴缸</a>
      </div>
	  <div>
        <span>联系我们</span>
        <a href="/ThinkPHP/chuwei/admin.php/Index/main_message.html" target="mainFrame" onFocus="this.blur()">留言管理</a>
      </div>
    </div>
</body>
</html>