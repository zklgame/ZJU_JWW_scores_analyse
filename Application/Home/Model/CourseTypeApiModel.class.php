<?php
namespace Home\Model;
use Think\Model;
class CourseTypeApiModel extends Model {
    protected $mod;
    protected $trueTableName = 'course_type'; 
    
    public function _initialize() {
        parent::_initialize();
        $this->mod = D($this->trueTableName);
    }
    
    public function get_type($type, $type2) {
        if ($type2) {
            return $this->get_type_by_id($type2);
        }
        return $this->get_type_by_id($type);
    }

    public function get_type_by_id($id) {
        $res = $this->mod->where('id = ' . $id)->find();
        return $res['type'];
    }

    public function get_info_by_id($id) {
        $res = $this->mod->where('id = ' . $id)->find();
        return $res;
    }

    public function get_type2_by_type($type) {
        $max = $type + 100000 - 1;
        $res = $this->mod->where('id between ' . $type . " and " . $max)->select();
        return $res;
    }


    
    
}
?>