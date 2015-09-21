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
    <div class="container">
        <div class="edit_header">
            <ul class="nav nav-pills pull-right" role="tablist">
                <button type="button" class="btn btn-primary"><a class="a-red" href="<?php echo U('Gpa/calculator', array('key' => $keyss));?>">返回</a></button>
            </ul>
            <h3 class="text-muted">课程信息修改</h3>
        </div>
            <form action="<?php echo U('Gpa/edit_score2');?>" method='post'>
                <h2><?php echo ($course_name); ?></h2>
                <div class="col-lg-6">
                    <ul type="none" class="form-edit-left">
                        <li>
                            <span class="label label-success">课程类型</span>
                        </li>
                        <li>
                            <span class="label label-success">学期</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul type="none" class="form-edit-right">
                        <li>
                            <select name='course_type_id'>
                                <?php if(is_array($course_type)): $i = 0; $__LIST__ = $course_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if($now_course_type == $val['id']): ?><option value="<?php echo ($val["id"]); ?>" selected="true"><?php echo ($val["type"]); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo ($val["id"]); ?>"><?php echo ($val["type"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </li>
                        <li>
                            <select name='semester_type_id'>
                                <?php if(is_array($semester_type)): $i = 0; $__LIST__ = $semester_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if($now_semester_type == $val['id']): ?><option value="<?php echo ($val["id"]); ?>" selected="true"><?php echo ($val["type"]); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo ($val["id"]); ?>"><?php echo ($val["type"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>                     
                        </li>
                    </ul>
                </div>
                <input name='id' value='<?php echo ($id); ?>' hidden />
                <input name='key' value='<?php echo ($keyss); ?>' hidden />                
                <button class="btn  btn-primary btn-block form-edit-btn" type="submit">确认修改</button>
            </form>
        <div>
            
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