<!DOCTYPE html>
<html lang="zh-cmn-Hans" prefix="og: http://ogp.me/ns#" class="han-init">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>博客-首页</title>
    <link rel="stylesheet" href="public/index/css/primer.css">
    <link rel="stylesheet" href="public/index/css/user-content.min.css">
    <link rel="stylesheet" href="public/index/css/octicons.css">
    <link rel="stylesheet" href="public/index/css/collection.css">
    <link rel="stylesheet" href="public/index/css/repo-card.css">
    <link rel="stylesheet" href="public/index/css/repo-list.css">
    <link rel="stylesheet" href="public/index/css/mini-repo-list.css">
    <link rel="stylesheet" href="public/index/css/boxed-group.css">
    <link rel="stylesheet" href="public/index/css/common.css">
    <link rel="stylesheet" href="public/index/css/share.min.css">
    <link rel="stylesheet" href="public/index/css/responsive.css">
    <link rel="stylesheet" href="public/index/css/index.css">
    <link rel="stylesheet" href="public/index/css/prism.css">
</head>
<body class="home">
    <header class="site-header">
        <div class="container">
            <h1><a href="index.php">小鱼鱼的奋斗</a></h1>
            <nav class="site-header-nav" role="navigation">
                <?php if(empty($_SESSION['username'])):?>
                <a href="index.php?m=index&c=user&a=login" style="color:yellow;">登录</a>
                <a href="index.php?m=index&c=user&a=register" style="color:yellow;">注册</a>
                <?php elseif($_SESSION['type'] != 1):?>
                <a href="javascript:;" style="color:yellow;"><?=$_SESSION['username'];?></a>

                <a href="index.php?m=index&c=user&a=logout" style="color:yellow;">退出</a>
                <?php elseif($_SESSION['type'] == 1):?>
                <a href="javascript:;" style="color:yellow;"><?=$_SESSION['username'];?></a>

                <a href="index.php?m=index&c=artical&a=send" style="color:yellow;">发表博文</a>

                <a href="index.php?m=admin&c=index&a=index" style="color:yellow;">后台管理</a>
                
                <a href="index.php?m=index&c=user&a=logout" style="color:yellow;">退出</a>
                <?php endif;?>
            </nav>
        </div>
    </header>
    <!-- / header -->
    <section class="banner">
    <div class="collection-head">
        <div class="container">
            <div class="collection-title">
                <h1 class="collection-header">Code Artisan</h1>
                <div class="collection-info">
                    <span class="meta-info">
                        <span class="octicon octicon-location"></span>
                        China Beijing
                    </span>
                    <span class="tooltipped tooltipped-s tooltipped-multiline meta-info" aria-label="PHP, JavaScript, HTML+CSS, C/C++">
                        <span class="octicon octicon-code"></span>
                        Web development
                    </span>
                    <span class="meta-info">
                        <span class="octicon octicon-organization"></span>
                        <a href="javascript:;"></a>
                    </span>
                    <span class="meta-info last-updated">
                        <span class="octicon octicon-mark-github"></span>
                        <a href="javascript:;"></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.banner -->
<section class="container content">
    <div class="columns">
    <?php if(empty($data)):?>
        <div class="column two-thirds">
            <ol class="repo-list">
                <li class="repo-list-item">
                    <h3 class="repo-list-name">
                        <a href="javascript:;"></a>
                    </h3>
                    <p class="repo-list-description">
                            没有标题
                    </p>
                    <p class="repo-list-meta">
                        <span class="octicon octicon-calendar"></span> 没有时间
                    </p>
                </li>
            </ol>
        </div>
        <?php endif;?>
        <?php if(!empty($data)):?>
        <div class="column two-thirds">
            <ol class="repo-list">
                <li class="repo-list-item">总数:<?=$count;?></li>
                <?php foreach($data as $value):?>
                <li class="repo-list-item">
                    <h3 class="repo-list-name">
                        <a href="javascript:;"></a>
                    </h3>
                    <p class="repo-list-description">
                    <a href="index.php?m=index&c=artical&a=reply&id=<?=$value['id'];?>"><?=$value['title'];?></a>
                    </p>
                    <p class="repo-list-meta">
                        <span class="octicon octicon-calendar"></span> <?=date("Y-m-d H:i:s",($value['addtime']));?>
                    </p>
                </li>
                <?php endforeach;?>
            </ol>
        </div>
        <?php endif;?>
        <div class="column one-third">
            <h3>流行的库</h3>
            <div class="boxed-group flush" role="navigation">
                <h3>板块</h3>
                <ul class="boxed-group-inner mini-repo-list">
                    <?php foreach($dat as $val):?>
                    <li class="public source ">
                        <a href="index.php?m=index&c=index&a=index&cid=<?=$val['cid'];?>"  title="overtrue/wechat" class="mini-repo-list-item css-truncate">
                            <span class="repo-icon octicon octicon-repo"></span>
                            <span class="repo-and-owner css-truncate-target">
                                <?=$val['classname'];?>
                            </span>
                        </a>
                    </li>
                    <?php endforeach;?>
                    
                </ul>
            </div>

        </div>
    </div>
    <div class="pagination text-align">
      <div class="btn-group">
        
            <a href="<?=$page['pre'];?>" class="btn btn-outline">«</a>
            <?php for($i=1;$i<=$totalpage;$i++ ):?>
            <?php if(!empty($_GET['cid'])):?>
            <a href="index.php?m=index&c=index&cid=<?=$_GET['cid'];?>&page=<?=$i;?>" class="btn btn-outline"><?=$i;?></a>
            <?php elseif(empty($_GET['cid'])):?>
            <a href="index.php?m=index&c=index&page=<?=$i;?>" class="btn btn-outline"><?=$i;?></a>
            <?php endif;?>
            <?php endfor;?>
            <!-- <a href="javascript:;" class="active btn btn-outline">1</a>

              <a href="javascript:;" class="btn btn-outline">2</a>

              <a href="javascript:;" class="btn btn-outline">3</a> -->
            <a href="<?=$page['next'];?>" class="btn btn-outline">»</a>
        
        </div>
    </div>
    <!-- /pagination -->
</section>
<!-- /section.content -->
    <footer class="container">
        <div class="site-footer" role="contentinfo">
            <div class="copyright left mobile-block">
                    © 2015
                    <span title="overtrue.me">overtrue.me</span>
                    <a href="javascript:;"></a>
            </div>

            <ul class="site-footer-links right mobile-hidden">
                <li>
                    <a href="javascript:;"></a>
                </li>
            </ul>
            <a href="javascript:;" target="_blank" aria-label="view source code">
                <span class="mega-octicon octicon-mark-github" title="GitHub"></span>
            </a>
            <ul class="site-footer-links mobile-hidden">
                
                <li>
                    <a href="javascript:;"></a>
                </li>
                
                <li>
                    <a href="javascript:;"></a>
                </li>
                
                <li>
                    <a href="javascript:;"></a>
                </li>
                
                <li>
                    <a href="javascript:;"></a>
                </li>
                
                <li>
                    <a href="javascript:;"></a>
                </li>
                
                <li>
                    <a href="javascript:;"></a>
                </li>
                
            </ul>

        </div>
    </footer>
    <!-- / footer -->




</body></html>