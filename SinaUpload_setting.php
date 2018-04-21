<?php
if(!defined('EMLOG_ROOT')){die('error');}
function plugin_setting_view(){
$sian_set=unserialize(ltrim(file_get_contents(dirname(__FILE__).'/config.php'),'<?php die; ?>'));
?>
<br>
<form method="post">
<p>账号：<input name="user" value="<?php echo $sian_set['user']; ?>" /></p>
<p>密码：<input name="pass" value="<?php echo $sian_set['pass']; ?>" /></p>
<p>上传接口：<input name="up" value="<?php echo $sian_set['up']; ?>" /></p>
<p>缩略图级别：<input name="th" value="<?php echo $sian_set['th']; ?>" /></p>
<p>回调函数：（不懂请勿修改）</p>
<textarea name="callback" style="width:400px;height:100px;"><?php echo $sian_set['callback']; ?></textarea><br />
<br />
<input type="submit" value="提交" />
</form>
<hr>
<h3>食用方法</h3>
<p>1、首先到<a href="http://img.52ecy.cn" target="_black">幻想领域</a>注册账号</p>
<p>2、把成功注册好的账号密码分别填入上方表单中</p>
<p>上传接口一般无需修改，当然你也可以自行搭建<a href="https://www.52ecy.cn/post-68.html" target="_black">幻想领域</a>图床系统 <a href="#">幻想领域是一套开源的轻量级微博图床系统</a></p>
<p>缩略图级别从0-7(数字越大缩略比越大)</p>
<p>回调函数，你可以在这里修改插入文章时的图片样式，不懂的请勿修改！</p>
<p>反馈交流群：<a href="http://shang.qq.com/wpa/qunwpa?idkey=826e8e5961b8acf3eb7bb4fd8595a59e38deb618deaee70912dd0c4cd9f97457" target="_black">712473912</a></p>
<br><br><p> Copyright &copy; 2018 <a target="_black" href="http://www.52ecy.cn/" title="阿珏Blog">阿珏博客</a><p>
<?php }
if(!empty($_POST)){
	$user=empty($_POST['user'])?'':trim($_POST['user']);
	$pass=empty($_POST['pass'])?'':trim($_POST['pass']);
	$up=empty($_POST['up'])?'':trim($_POST['up']);
	$th=empty($_POST['th'])?'':trim($_POST['th']);
	$callback=empty($_POST['callback'])?'':trim($_POST['callback']);
	if(get_magic_quotes_gpc()){
		$user=stripslashes($user);
		$pass=stripslashes($pass);
		$up=stripslashes($up);
		$th=stripslashes($th);
		$callback=stripslashes($callback);
	}
	file_put_contents(dirname(__FILE__).'/config.php','<?php die; ?>'.serialize(array(
	'user'=>$user,
	'pass'=>$pass,
	'up'=>$up,
	'th'=>$th,
	'callback'=>$callback,
	)));
	header('Location:./plugin.php?plugin=SinaUpload');
}
?>