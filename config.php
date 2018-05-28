<?php die; ?>a:5:{s:4:"user";s:0:"";s:4:"pass";s:0:"";s:2:"up";s:35:"https://img.52ecy.cn/home/Interface";s:2:"th";s:1:"7";s:8:"callback";s:286:"var str = '<a href="'+sina_skep[numb]+'" target="_blank"><img src="{{href}}" alt="" title="点击查看原图" /></a><br />';
KindEditor.insertHtml('#content',
	str.replace("{{href}}",
		sina_skep[numb].replace(sina_skep[numb].match(/\/(.{5,10})\//)[1],sina_size[sina_thumb])
	)
);";}