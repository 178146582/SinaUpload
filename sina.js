function sina_cpick() {
	var pic_obj = document.getElementById("sina_pick").files;
	if (!pic_obj.length || pic_obj[0].size > 5242880) {
		console.log("没有数据或文件过大！");
		return
	}
	sina_pool = [];
	sina_skep = [];
	Array.prototype.push.apply(sina_pool, document.getElementById("sina_pick").files);
	document.getElementById("sina_push").disabled = false;
	document.getElementById("sina_list").innerHTML = "";
	for (var numb = 0; numb < sina_pool.length; numb++) {
		document.getElementById("sina_list").innerHTML += '<div class="sina_pic" id="sina_pic' + numb + '"><div class="sina_act" id="sina_act' + numb + '"><a>' + sina_pool[numb].name.substr(0, 18) + "...</a></div></div>"
	}
}
function sina_cpush() {
	if (!sina_user || !sina_pass) {
		alert("用户名或密码不能为空！");
		return
	}
	if (!sina_pool.length) {
		alert("没有文件");
		return
	}
	document.getElementById("sina_push").disabled = true;
	sina_cpost(0)
}
function sina_cpost(numb) {
	if (numb >= sina_pool.length) {
		alert("任务结束");
		return
	}
	var xhr = new XMLHttpRequest();
	var form = new FormData();
	form.append("username", sina_user);
	form.append("password", sina_pass);
	form.append("file", sina_pool[numb]);
	xhr.open("POST", sina_upurl, true);
	// xhr.upload.onprogress = function(e) {
	// 	//进度关闭 如果自行搭建接口可启用
	// 	if (e.lengthComputable) {
	// 		document.getElementById("sina_act" + numb).innerHTML = "<a>" + parseInt(100 * e.loaded / e.total) + "%</a>"
	// 	}
	// };
	xhr.send(form);
	document.getElementById("sina_act" + numb).innerHTML = "<a>上传中...</a>";
	xhr.onerror = function(e) {
		alert("任务执行中断");
		return
	};
	xhr.onreadystatechange = function(e) {
		if (xhr.readyState === 4 && xhr.status === 200) {
			var Text = JSON.parse(xhr.responseText);
			if (Text.code == "0000") {
				sina_skep[numb] = Text.msg;
				document.getElementById("sina_act" + numb).innerHTML = '<a href="javascript:void(0);" onclick="sina_cpone(' + numb + ",'');\">上传成功</a>";
				document.getElementById("sina_pic" + numb).setAttribute("style", "background:url(" + sina_skep[numb] + ") no-repeat center;background-size:cover;")
			} else {
				document.getElementById("sina_act" + numb).innerHTML = '<a href="javascript:void(0);">上传失败：' + Text.msg + "</a>"
			}
			sina_cpost(numb + 1)
		}
	}
}
var sina_pool = [],
	sina_skep = [];