<?php
namespace Home\Model;
use Think\Model;
class SemestersApiModel extends Model {
    protected $mod;
    protected $tableName = 'semesters'; 
    
    public function _initialize() {
        parent::_initialize();
        $this->mod = D($this->tableName);
    }
    
    public function get_type($semester, $semester2) {
        if ($semester2) {
            return $this->get_type_by_id($semester2);
        }
        return $this->get_type_by_id($semester);
    }
    
    public function get_type_by_id($id) {
        $res = $this->mod->where('id = ' . $id)->find();
        return $res['type'];
    }

    public function get_info_by_id($id) {
        $res = $this->mod->where('id = ' . $id)->find();
        return $res;
    }

    public function get_semester2_by_semester($semester) {
        $min = intval($semester) * 10;
        $max = intval($semester + 1) * 10;
        $res = $this->mod->where('id between ' . $min . ' and ' . $max . ' or id = ' . $semester)->select();
        return $res;
    }

}
?>