<?php
namespace Home\Model;
use Think\Model;
class CoursesApiModel extends Model {  
    protected $mod;
    protected $tableName = 'courses';
    public function _initialize() {
        parent::_initialize();
        $this->mod = D($this->tableName);
    }
    
    public function get_info_by_id($id) {
        $res = $this->mod->where("id = '" . $id . "'")->find();
        return $res;
    }

    public function get_specific_scores($key) {
        $res = $this->mod->join('scores ON courses.id = scores.course_id')->order('year, semester, type, type2')->select();
        if (0 != $key) {
            $mod = $key % 100000;
            if ($mod) {
                $res = $this->mod->join('scores ON courses.id = scores.course_id')->where('type2 = ' . $key)->order('year, semester, type2')->select();
            } else {
                $res = $this->mod->join('scores ON courses.id = scores.course_id')->where('type = ' . $key)->order('year, semester, type, type2')->select();
            }
        }
        return $res;
    }

    public function get_hil_scores() {
        $res = $this->mod->join('scores ON courses.id = scores.course_id')->where('type2 = 200400 or type2 = 200500 or type2 = 200800')->order('year, semester, type2')->select();
        return $res;
    }
    
}
?>