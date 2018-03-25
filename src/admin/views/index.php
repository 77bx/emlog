<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div id="admindex">
<?php if (ROLE == ROLE_ADMIN):?>
<div class="clear"></div>
<div style="margin-top: 20px;">
<div id="admindex_servinfo">
<h3>站点信息</h3>
<ul>
	<li>有<b><?php echo $sta_cache['lognum'];?></b>篇文章，<b><?php echo $sta_cache['comnum_all'];?></b>条评论，<b><?php echo $sta_cache['twnum'];?></b>条微语</li>
	<li>数据库表前缀：<?php echo DB_PREFIX; ?></li>
    <li>PHP版本：<?php echo $php_ver; ?>，MySQL版本：<?php echo $mysql_ver; ?></li>
	<li>服务器环境：<?php echo $serverapp; ?></li>
	<li>GD图形处理库：<?php echo $gd_ver; ?></li>
	<li>服务器空间允许上传最大文件：<?php echo $uploadfile_maxsize; ?></li>
	<li><a href="index.php?action=phpinfo">更多信息&raquo;</a></li>
</ul>
</div>
<div id="admindex_msg">
<h3>官方消息</h3>
<ul></ul>
</div>
<div class="clear"></div>
<div id="about">
    您正在使用emlog <?php echo Option::EMLOG_VERSION; ?>
</div>
</div>
</div>
<script>
$(document).ready(function(){
	$("#admindex_msg ul").html("<span class=\"ajax_remind_1\">正在读取...</span>");
	$.getJSON("<?php echo OFFICIAL_SERVICE_HOST;?>services/messenger.php?v=<?php echo Option::EMLOG_VERSION; ?>&callback=?",
	function(data){
		$("#admindex_msg ul").html("");
		$.each(data.items, function(i,item){
			var image = '';
			if (item.image != ''){
				image = "<a href=\""+item.url+"\" target=\"_blank\" title=\""+item.title+"\"><img src=\""+item.image+"\"></a><br />";
			}
			$("#admindex_msg ul").append("<li class=\"msg_type_"+item.type+"\">"+image+"<span>"+item.date+"</span><a href=\""+item.url+"\" target=\"_blank\">"+item.title+"</a></li>");
		});
	});
});
</script>
<script>

</script>
<?php else:?>
<div id="admindex_main">
<div id="about"><a href="blogger.php"><?php echo $name; ?></a> （<b><?php echo $sta_cache[UID]['lognum'];?></b>篇文章，<b><?php echo $sta_cache[UID]['commentnum'];?></b>条评论）</div>
</div>
<div class="clear"></div>
<?php endif; ?>
