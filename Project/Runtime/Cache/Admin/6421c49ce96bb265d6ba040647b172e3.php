<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache"/>
<meta http-equiv="cache-control" content="no-cache, must-revalidate"/>
<meta http-equiv="expires" content="0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>铁路车辆检修互动实训系统</title>

<link href="__PUBLIC__/dwz/themes/default/style.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/dwz/themes/css/core.css" rel="stylesheet" type="text/css" />
<!--[if IE]>
<link href="__PUBLIC__/dwz/themes/css/ieHack.css" rel="stylesheet" type="text/css" />
<![endif]-->

<style type="text/css">
    #header{height:85px}
    #leftside, #container, #splitBar, #splitBarProxy{top:90px}
</style>


<script src="__PUBLIC__/dwz/js/speedup.js" type="text/javascript"></script>
<script src="__PUBLIC__/dwz/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/dwz/js/jquery.cookie.js" type="text/javascript"></script>
<script src="__PUBLIC__/dwz/js/jquery.validate.js" type="text/javascript"></script>
<script src="__PUBLIC__/dwz/js/jquery.bgiframe.js" type="text/javascript"></script>

<script src="__PUBLIC__/dwz/js/dwz.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/dwz/js/dwz.util.date.js" type="text/javascript"></script>
<script src="__PUBLIC__/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>
<script src="__PUBLIC__/dwz/js/dwz.ajax.js" type="text/javascript"></script>

<script src="__PUBLIC__/Js/org/ajaxfileupload.js" type="text/javascript"></script>



<script type="text/javascript">
$(function(){
	DWZ.init("__PUBLIC__/dwz/dwz.frag.xml", {
		loginUrl:"<?php echo U('page/index/showAdminLogin');?>",	//跳到登录页面
		statusCode:{ok:200, error:300, timeout:301}, //【可选】
		pageInfo:{pageNum:"currentPage", numPerPage:"pageSize", orderField:"_order", orderDirection:"_sort"}, //【可选】
		debug:false,	// 调试模式 【true|false】
		callback:function(){
			initEnv();
			//navTab.openTab('main', "http://www.baidu.com", {title:'首页',fresh:false, data:{} } ); //在main里面打开
			//navTab.openTab('navTab', "http://www.laiyouxi.com", {title:'首页',fresh:false, data:{} } ); //新标签打开
			//navTab.open("main","http://www.laiyouxi.com"),
			//$("#themeList").theme({themeBase:"__PUBLIC__/dwz/themes"});
		}
	});
});
</script>
<style>
	#header .logo{ text-indent:8px; font-size: 15px; line-height: 50px; color: #b9ccda; text-decoration: none;}
</style>
</head>

<body scroll="no">
	<div id="layout">
		<div id="header">
			<div class="headerNav">
				<a class="logo" href="__APP__">铁路车辆检修互动实训系统</a>
				<ul class="nav">
				    <li style="background:none;"><a href="javascript:void(0)">欢迎您:<?php echo ($_SESSION['manager']['trueName']); ?></a></li>
				    <li><a href="javascript:void(0)">您的角色:<?php echo ($_SESSION['manager']['roleName']); ?></a></li>
					<li><a href="<?php echo U('admin/index/checkUserLogout');?>">退出</a></li>
				</ul>
			</div>
			<div id="navMenu"><ul>

<?php if(is_array($navMenu)): foreach($navMenu as $key=>$navItem): if($key == 0): ?><li class="selected"><?php else: ?><li><?php endif; ?>
       <a href="<?php echo U('admin/index/changeSidebar', array('groupId'=>$navItem['id']));?>"><span><?php echo ($navItem['title']); ?></span></a></li><?php endforeach; endif; ?>
</ul>		
</div>
		</div>

		<div id="leftside">
			<div id="sidebar_s">
				<div class="collapse">
					<div class="toggleCollapse"><div></div></div>
				</div>
			</div>
			<div id="sidebar">
                 <div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div><!-- toggleCollapse end -->
                   <div  class="accordion"  fillSpace="sidebar">
<?php if(is_array($sidebar)): foreach($sidebar as $key=>$po): ?><div class="accordionHeader">
  <h2><span>Folder</span><?php echo ($po['title']); ?></h2>
</div>
<div class="accordionContent">
		<ul class="tree treeFolder">
			<?php if(is_array($po['items'])): foreach($po['items'] as $key=>$actionItem): ?><li>
		        <a href="<?php echo U($po['groupName'].'/'.$po['name'].'/'.$actionItem['name']);?>" target="navTab"  rel="<?php echo ($actionItem['name']); ?>">
		              <?php echo ($actionItem['title']); ?>
		        </a> 
			</li><?php endforeach; endif; ?>	
		</ul>
</div><?php endforeach; endif; ?>
 </div>
             </div><!-- sidebar end -->
		</div>

		<div id="container">
			<div id="navTab" class="tabsPage">
				<div class="tabsPageHeader">
					<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
						<ul class="navTab-tab">
							<li tabid="main" class="main"><a href="javascript:void(0)"><span><span class="home_icon">我的主页</span></span></a></li>
						</ul>
					</div>
					<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
					<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
					<div class="tabsMore">more</div>
				</div>
				<ul class="tabsMoreList">
					<li><a href="javascript:void(0)">我的主页</a></li>
				</ul>
				<div class="navTab-panel tabsPageContent layoutBox">
                    <div class="page unitBox" style="height:700px;">
                        <div class="pageFormContent" >
                            <!--<div style="width:100%;height:100%;text-align:center;margin:0 auto;padding-top:100px;font-size:20px;line-height:30px;">
                                高铁后台管理系统<br/>
                                学员注册地址：<?php echo $_SERVER['HTTP_HOST'];?>__ROOT__/register.html<br/>
                                学员找回密码地址：<?php echo $_SERVER['HTTP_HOST'];?>__ROOT__/fogetpassword.html<br/>
                                -->
                                <!-- 
                                成绩查询地址：__ROOT__/result/考试时间/学员id.html  如：__ROOT__/result/111/111.html
                                 -->
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>

	</div>

	<div id="footer">铁路车辆检修互动实训系统 </div>

</body>
</html>