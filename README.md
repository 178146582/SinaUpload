# emlog博客系统新浪图床上传插件
emlog后台写文章新浪上传图片插件
第一次写emlog插件，参考了七牛图床的写法(对，就是后台那个)
插件下载后直接上传到emlog后台即可，无需解压
具体使用方法在插件设置界面有写，下载地址在文章底部
哪位好心人有emlog的开发者账号，可以帮我提交到emlog应用中心里

插件仅限emlog博客系统使用，其他博客系统无法使用
以下是公开接口，可自行编写其他系统插件


接口地址：
---------------------
> https://img.52ecy.cn/home/Interface


请求参数说明：
---------------------
|    名称    |       说明      
|:-------:|:------------- |
|   username  |     幻想领域账号  |
|   password  |     幻想领域密码  |
|   multipart(可选)  |     false/true，使用本地上传还是远程上传，默认本地上传(true)    |   
|   url(可选)  |    需要转存的图片地址，当multipart为false，url必须传    |   


返回标准json数据
---------------------
```javascript
{
    "code":"0000",  #状态码
    "msg":"http://www.52ecy.cn/randbg.png" #图片地址
}
```
> 成功返回000状态码和图片地址，失败返回状态码和原因

![](https://ws1.sinaimg.cn/large/0072Vf1pgy1fqkhhzq5raj30zv0kf124.jpg?a=1)
