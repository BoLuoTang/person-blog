<!DOCTYPE html >
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="看云专注于文档的在线创作、协作、分享和托管服务，致力于提供最佳的在线创作和阅读体验，让企业和个人可以更方便地发布和管理自己的文档。"/>
    <meta name="keywords" content="文档托管,在线创作,文档在线管理,在线知识管理,文档托管平台,在线写书,文档在线转换,在线编辑,在线阅读,开发手册,api手册,文档在线学习,技术文档在线阅读,在线文档编辑"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    
	<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=4059002824" type="text/javascript" charset="utf-8"></script>
	
    <script type="text/javascript" async src="public/index/js/client.js"></script>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="public/index/css/style1.css">
    <link rel="stylesheet" href="public/index/css/app.min.css">
        
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
</head>
<body>
    <!--[if lte IE 8]>
        <div class="m-browsehappy">
            <div class="browsehappy-inner">
                <h3 class="title">对不起！<br>您的浏览器版本太低，请升级你的浏览器</h3>
                <p class="suggest">建议使用：</p>
                <p class="brower">
                    <span class="item">
                        <a class="ie image" href="https://www.microsoft.com/en-us/download/internet-explorer.aspx" target="_blank" title="下载Internet Explorer浏览器"></a>
                        <b class="text">ie9+</b>
                    </span>
                    <span class="item">
                        <a class="chrome image" href="http://www.google.cn/intl/zh-CN/chrome/browser/?spm=1.7274553.0.0.benzR1" target="_blank" title="下载Chrome浏览器"></a>
                        <b class="text">chrome</b>
                    </span>
                </p>
                <p class="from">来自看云官方</p>
                <b class="browsehappy-arrow"></b>
            </div>
        </div>
        <script>
            window.nonsupportIE = true;
        </script>
    <![endif]-->

<div class="m-wrap">
    <div class="m-page page-chancel ">
        <div class="page-head">
            <div class="container">
                <div class="left">
                    <a class="e-brand" href="/">
                        <img height="30" src="public/index/picture/15.png" alt="看云">
                    </a>
                    <ul class="m-navg">
    <!-- <li class="navg-item">
        <a class="navg-link" href="#">广场</a>
    </li>
    <li class="navg-item">
        <a class="navg-link" href="#">价格</a>
    </li>
    <li class="navg-item">
        <a class="navg-link" href="#">帮助</a>
    </li> -->
    <li class="navg-item">
        <a class="navg-link" href="index.php">博客</a>
    </li>
    
</ul>

                </div>
                <div class="right">
                    <span class="auth">
        <a class="link register" href="#">账号登陆</a>
    </span>
                    </div>
                <button type="button" class="m-navg-toggle collapsed">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
        <div class="page-body">
            
    <div class="m-auth auth-login">
        <div class="auth-slogan">用户登录</div>
        <div class="auth-form w-form">
            <form id="loginForm" action="index.php?m=index&c=user&a=doLogin" method="post" autocomplete="off" onsubmit="return true;">
                <div class="form-item">
                    <span class="w-text text-full text-x text-prefix">
                        <input class="text-input" type="text" name="account" placeholder="用户名/邮箱">
                        <i class="text-icon icon-head"></i>
                    </span>

                    <p class="w-fragment fragment-s fragment-tip"></p>
                </div>
                <div class="form-item">
                    <label class="w-text text-full text-x text-prefix">
                        <input class="text-input" type="password" name="password" placeholder="密码">
                        <i class="text-icon icon-lock"></i>
                    </label>

                    <p class="w-fragment fragment-s fragment-tip"></p>
                </div>
                <div class="form-item verity-code">
                    <label class="code-input w-text text-x text-prefix">
                        <input name="code" class="text-input" type="text" placeholder="验证码" maxlength="4">
                        <i class="text-icon icon-square-check"></i>
                    </label>
                    <img class="code-image" height="42" src="index.php?m=index&c=user&a=yzm" onclick="this.src='index.php?m=index&c=user&a=yzm&t='+(new Date()).getTime();" title="点击换一张">

                    <p class="w-fragment fragment-s fragment-tip"></p>
                </div>
                <div class="form-item">
                    <label class="w-checkbox">
                        <input class="checkbox-input" name="is_auto" type="checkbox" value="0"><span class="checkbox-text">保持登录</span>
                    </label>
                    <a class="w-link link-black fwb" href="/password/forgot">忘记密码？</a>
                </div>
                <div class="form-item">
                    <label class="w-btn btn-full btn-x btn-mild btn-success">
                        <button class="btn-input" type="submit">立即登录</button>
                    </label>
                </div>
            </form>
        </div>
		
		<!-- <wb:login-button type="3,2" onlogin="login" onlogout="logout">登录按钮</wb:login-button> -->
		
        <div class="auth-cooperate">
            <strong class="cooperate-title">使用第三方帐号登录</strong>
            <div class="cooperate-list">
                <!-- <a class="github icon-github" href="/login/connect/github" title="github登录"></a>
                <a class="weixin icon-weixin" href="/login/connect/weixin" title="微信登录"></a>
                <a class="qq icon-qq" href="/login/connect/qq" title="QQ登录"></a> -->
                <a class=" weibo icon-sina" href="http://sae.sina.com.cn" title="新浪微博登录"></a>
            </div>
        </div> 
        <div class="auth-other">
            <a class="w-link link-black" href="/register">没有帐号，点击注册</a>

        </div>
    </div>

        </div>
    </div>
</div>

    <div class="m-foot">
        
            <div class="container">
    <div class="m-copyright">
        <div class="left-copyright">
            <p>© 2015-2016 上海顶想信息科技有限公司</p>

            <p>
                <a href="#">关于我们</a>&nbsp;·&nbsp;
                <a href="#">联系我们</a>&nbsp;·&nbsp;
                <a href="#">合作伙伴</a>&nbsp;·&nbsp;
                <a href="#">加入我们</a>&nbsp;·&nbsp;
                <a href="#">反馈建议</a>
            </p>
        </div>
        <!-- <div class="right-copyright">
            <a class="e-brand" href="/">
                <img height="30" src="picture/15.png" alt="看云">
            </a>
        </div> -->
        <div class="clear"></div>
    </div>
</div>
        
    </div>

    <script src="js/sea.js"></script>
    <script>
    seajs.config({
        base: "//static.kancloud.cn/Static/",
        paths: {
            'home': 'home/script',
            'common': 'common/script',
            'document': 'document/script',
            'component': 'component'
        },
        preload : [
            'jquery'
        ],
        alias: {
            'jquery':'component/jquery',
            'config': 'common/module/config'
        },
        map: [
            [ /^(.*\.(?:css|js))(.*)$/i, '$1?v=20161121002']
        ],
        debug: true
    });
	

	
	
    </script>
    <script src="js/app.min.js"></script>    <script>
    seajs.use('config',function(config){
        //设置项目配置
        config.set({
            "ROOT"   : "", //当前网站地址
            "APP"    : "", //当前项目地址
            "STATIC"    : "//static.kancloud.cn/Static", //静态资源文件地址
            "PUBLIC" : "//static.kancloud.cn/Static", //home目录地址
            'isLogin' : false,
                "APP_DOMAIN": "www.kancloud.cn",
            'checkNotification':true,
            'userCoin' : "0"
        });
        seajs.use('home/globle',function(globle){
            globle === false || 
    seajs.use('config', function(config){
    //设置页面配置
    config.set({

    });
    //启动页面脚本
    seajs.use('home/auth/login');
    });
;
        });
    });
    </script>
    <script type="text/javascript" src="js/e4e06e0e6d0a4eb1b197df67424f62bb.js" charset="UTF-8"></script>

    
</body>
</html>

<!--此段可直接删除-开始-->
<!--此段可直接删除-结束-->