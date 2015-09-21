<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="zklgame">
        <link rel="icon" href="">

        <title>GPA Calculator</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo ($BOOTSTRAP); ?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo ($BOOTSTRAP); ?>/more/css/dashboard.css" rel="stylesheet">
        <link href="<?php echo ($BOOTSTRAP); ?>/more/css/gpa.css" rel="stylesheet">
        <script src="<?php echo ($BOOTSTRAP); ?>/more/js/ie-emulation-modes-warning.js"></script>
        <script src="<?php echo ($BOOTSTRAP); ?>/more/js/gpa.js"></script>
        <script src="<?php echo ($BOOTSTRAP); ?>/more/js/jquery-1.7.2.min.js"></script>
        <style id="holderjs-style" type="text/css"></style>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!--button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button-->
                    <a class="navbar-brand" href="#">GPA Calculator</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" id="for_scores_list_upload">批量上传</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar" id="keys">
                    <ul class="nav nav-sidebar">
                        <li class="a0"><a href="<?php echo U('Gpa/calculator', array('key' => '0'));?>">已修课程</a></li>
                        <li class="a1000"><a href="<?php echo U('Gpa/calculator', array('key' => '1000'));?>">专业课</a></li>
                        <li class="a3000"><a href="<?php echo U('Gpa/calculator', array('key' => '3000'));?>">大类课</a></li>
                        <li class="a2000"><a href="<?php echo U('Gpa/calculator', array('key' => '2000'));?>">通识课</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li class="a1000"><a href="<?php echo U('Gpa/calculator', array('key' => '1000'));?>">专业课</a></li>
                    </ul>  
                    <ul class="nav nav-sidebar">
                        <li class="a3000"><a href="<?php echo U('Gpa/calculator', array('key' => '3000'));?>">大类课</a></li>
                        <li class="a3001"><a href="<?php echo U('Gpa/calculator', array('key' => '3001'));?>">大类A类</a></li>
                        <li class="a3002"><a href="<?php echo U('Gpa/calculator', array('key' => '3002'));?>">大类B类</a></li>
                        <li class="a3003"><a href="<?php echo U('Gpa/calculator', array('key' => '3003'));?>">大类C类</a></li>                        
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li class="a2000"><a href="<?php echo U('Gpa/calculator', array('key' => '2000'));?>">通识课</a></li>
                        <li class="a2001"><a href="<?php echo U('Gpa/calculator', array('key' => '2001'));?>">通识思政</a></li>
                        <li class="a2002"><a href="<?php echo U('Gpa/calculator', array('key' => '2002'));?>">通识外语</a></li>
                        <li class="a2003"><a href="<?php echo U('Gpa/calculator', array('key' => '2003'));?>">通识计算机</a></li>
                        <li class="a9999"><a href="<?php echo U('Gpa/calculator', array('key' => '9999'));?>">通识人文社科组</a></li>
                        <li class="a2004"><a href="<?php echo U('Gpa/calculator', array('key' => '2004'));?>">通识H类</a></li>
                        <li class="a2005"><a href="<?php echo U('Gpa/calculator', array('key' => '2005'));?>">通识I类</a></li>
                        <li class="a2006"><a href="<?php echo U('Gpa/calculator', array('key' => '2006'));?>">通识J类</a></li>
                        <li class="a2007"><a href="<?php echo U('Gpa/calculator', array('key' => '2007'));?>">通识K类</a></li>
                        <li class="a2008"><a href="<?php echo U('Gpa/calculator', array('key' => '2008'));?>">通识L类</a></li>
                        <li class="a2009"><a href="<?php echo U('Gpa/calculator', array('key' => '2009'));?>">通识M类</a></li>
                        <li class="a2010"><a href="<?php echo U('Gpa/calculator', array('key' => '2010'));?>">通识S类</a></li>
                        <li class="a2011"><a href="<?php echo U('Gpa/calculator', array('key' => '2011'));?>">通识X类</a></li>
                    </ul>        
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <!--h1 class="page-header">Dashboard</h1>
                    <div class="row placeholders">
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="200x200" src="">
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="200x200" src="">
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="200x200" src="">
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="200x200" src="">
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                    </div-->
<input id='akey' hidden value="<?php echo ($key); ?>" />

    <div>
        <span class="label label-primary">学分</span>
        <span class="label label-info"><?php echo ($now_credits); ?></span>
        <span class="label label-primary">绩点</span>
        <span class="label label-danger"><?php echo ($avg_point); ?></span>
        <span class="label label-primary">有效学分</span>
        <span class="label label-success"><?php echo ($valid_credits); ?></span>
    </div>
                    
    <h2 class="sub-header">课程列表</h2>
    <div class="table-responsive" id="table_div">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>课程代码</th>
                    <th>课程名称</th>
                    <th>课程类别</th>
                    <th>修读年份</th>
                    <th>修读学期</th>
                    <th>学分</th>
                    <th>成绩</th>
                    <th>绩点</th>
                    <th>修读次数</th>   
                    <th>备注</th>                                    
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($scores_list)): $i = 0; $__LIST__ = $scores_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                        <td><a href="<?php echo U('Gpa/edit_score', array('id' => $val['id'], 'key' => $another_key));?>"><?php echo ($val["course_id"]); ?></a></td>
                        <td><?php echo ($val["name"]); ?></td>
                        <td><?php echo ($val["type"]); ?></td>
                        <td><?php echo ($val["year"]); ?></td>
                        <td><?php echo ($val["semester"]); ?></td>                                        
                        <td><?php echo ($val["credit"]); ?></td>
                        <td><?php echo ($val["score"]); ?></td>
                        <td><?php echo ($val["point"]); ?></td>
                        <td><?php echo ($val["re_time"]); ?></td>                                                                                
                        <td><?php echo ($val["comment"]); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    
    <div id='scores_list_upload' class='gpa_box'>
        <div class="jumbotron">
            <h1>批量上传</h1>
            <p class="lead"><a href="<?php echo ($PUBLIC_DIR); ?>/scores.zip">上传文件示例</a></p>
            <form action="<?php echo U('Gpa/scores_list_upload');?>" enctype="multipart/form-data" method="post" >
                <input type="file" name="scores_list" class="gpa_align"/>
                <input type="submit" value="提交">
                <input id="cancle_scores_list_upload" type="button" value="取消">
            </form>
        </div>
    </div>

                </div>
            </div>
        </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo ($BOOTSTRAP); ?>/more/js/jquery.min.js"></script>
    <script src="<?php echo ($BOOTSTRAP); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo ($BOOTSTRAP); ?>/more/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo ($BOOTSTRAP); ?>/more/js/ie10-viewport-bug-workaround.js"></script>
    
    </body>
</html>