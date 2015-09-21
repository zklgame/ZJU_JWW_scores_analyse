<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    
    //定义数据表模型
    public $course_type_mod;
    public $courses_mod;
    public $scores_mod;
    public $semesters_mod;

    public function _initialize() {
        $this->BOOTSTRAP = "./Application/Home/Bootstrap_dist";
        $this->PUBLIC_DIR = "./Public";

        $this->course_type_mod = D('CourseTypeApi');
        $this->courses_mod = D('CoursesApi');
        $this->scores_mod = D('ScoresApi');
        $this->semesters_mod = D('SemestersApi');
        
    }
    
}
?>

