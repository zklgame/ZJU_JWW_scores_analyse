<?php
namespace Home\Controller;
use Think\Controller;
class GpaController extends BaseController {
    public function calculator(){
        $key = $_GET['key'];
        $scores_info = $this->get_scores_list_by_key($key);
        $res = array();
        $now_credits = 0;
        $now_points = 0;
        $valid_credits = 0;
        foreach ($scores_info as $val) {
            $val['type'] = $this->course_type_mod->get_type($val['type'], $val['type2']);
            $val['year'] = $val['year'] . '-' . ($val['year'] + 1);
            $val['semester'] = $this->semesters_mod->get_type($val['semester'], $val['semester2']);
            $res[] = $val;
            $now_credits += $val['credit'];
            $now_points += $val['credit'] * $val['point'];
            if ($val['point'] > 0 || $val['comment']) {
                $valid_credits += $val['credit'];
            }
        }
        $avg_point = $now_points / $now_credits;
        
        $this->assign('scores_list', $res);
        $this->assign('akey', 'a' . $key);
        $this->assign('another_key', $key);        
        $this->assign('now_credits', $now_credits);
        $this->assign('valid_credits', $valid_credits);
        $this->assign('avg_point', $avg_point);

        $this->display();
    }

    public function edit_score() {
        $id = $_GET['id'];
        $key = $_GET['key'];
        $score_info = $this->scores_mod->get_info_by_id($id);
        $course_info = $this->courses_mod->get_info_by_id($score_info['course_id']);

        $semester2 = $this->semesters_mod->get_semester2_by_semester($score_info['semester']);
        $course_type2 = $this->course_type_mod->get_type2_by_type($course_info['type']);  
        $now_semester_type = $score_info['semester2'] ? $score_info['semester2'] : $score_info['semester'];
        $now_course_type =  $course_info['type2'] ? $course_info['type2'] : $course_info['type'];

        $this->assign('id', $id);
        $this->assign('keyss', $key);
        $this->assign('course_name', $course_info['name']);
        $this->assign('course_type', $course_type2);
        $this->assign('semester_type', $semester2);
        $this->assign('now_semester_type', $now_semester_type);
        $this->assign('now_course_type', $now_course_type);

        $this->display();
    }

    public function edit_score2() {
        $id = $_POST['id'];
        $key = $_POST['key'];        
        $course_type_id = $_POST['course_type_id'];
        $semester_type_id = $_POST['semester_type_id'];
        $score_info = $this->scores_mod->get_info_by_id($id);
        $course_info = $this->courses_mod->get_info_by_id($score_info['course_id']);
        $score_info['semester2'] = $semester_type_id;
        $course_info['type2'] = $course_type_id;
        $this->scores_mod->save($score_info);
        $this->courses_mod->save($course_info);
        redirect(U('Gpa/calculator', array('key' => $key)));
    }

    public function scores_list_upload() {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('txt');// 设置附件上传类型
        $upload->savePath  =      './Scores_list'; // 设置附件上传目录
        // 上传文件 
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            foreach($info as $file){
                $file_path = $upload->rootPath . $file['savepath'] . $file['savename'];
                $fp = fopen($file_path, 'r');
                if($fp) {
                    while (!feof($fp)) {
                        $line = fgets($fp);
                        $res = explode(" ", $line);
                        $res2 = array();
                        foreach ($res as $val) {
                            if ($val) {
                                $res2[] = $val;
                            }
                        } 
                        $res2[0] = explode("-", str_replace(")", "", $res2[0]));

                        $course = array();
                        $score = array();
                        
                        $course['id'] = $res2[0][3];
                        $course['name'] = $res2[1];
                        $course['credit'] = $res2[3];
                        $course['type2'] = $this->get_id_by_course_id($course['id']);
                        $course['type'] = $course['type2'] - $course['type2'] % 100000;
                                
                        $score['course_id'] = $course['id'];                       
                        $score['year'] = $res2[0][1] - 1;
                        $score['semester'] = $res2[0][2]; 
                        if(is_numeric($res2[4])) {
                            $score['point'] = $res2[4];
                        } else {
                            $score['point'] = 0; 
                            $score['comment'] = $res2[4];
                        }
                        if (0 != $score['point']) {
                            $score['score'] = $this->get_score_by_point($score['point']);
                            if(95 == $score['score']) {
                                $score['score'] = $res2[2];
                            }
                        } else {
                            if(is_numeric($res2[2])) {
                                $score['score'] = $res2[2];
                            } else {
                                $score['score'] = 59;                            
                            }
                        }                       
                        $score['re_time'] = 0;
                        
                        $res = $this->courses_mod->where("id = '" . $course['id'] . "'")->find();
                        if (!$res) {
                            $this->courses_mod->add($course);
                        }
                        $count = $this->scores_mod->where("course_id = '" . $score['course_id'] . "'")->count();
                        $score['re_time'] = $count;                        
                        $this->scores_mod->add($score);
                    }
                }
                fclose($fp);
            }
            $this->success('上传成功！');
        }   
    }

    private function get_done_credits() {
        $res = $this->scores_mod->get_valid_scores();
        $done_credits = 0;
        foreach ($res as $val) {
            $course_info = $this->courses_mod->get_info_by_id($val['course_id']);
            $done_credits += $course_info['credit'];
        }
        return $done_credits;
    }

    private function get_done_points() {
        $res = $this->scores_mod->get_valid_scores();
        $done_points = 0;
        foreach ($res as $val) {
            $course_info = $this->courses_mod->get_info_by_id($val['course_id']);
            $done_points += $course_info['credit'] * $val['point'];
        }
        return $done_points;
    }
    
    private function get_score_by_point($point) {
        $score = 95 - (5 - $point) * 10;
        return $score;    
    }
    
    private function get_point_by_score($score) {
        $point = 5;
        if ($score < 95) {
            $point = 5 - (95 - $score) / 10;
        }
        return $point;    
    }
    
    private function get_id_by_course_id($course_id) {
        $type = 100000;
        $key = substr($course_id, 3, 1);
        switch ($key) {
            case 'A':
                $type = 300100; break;
            case 'B':
                $type = 300200; break;
            case 'C':
                $type = 300300; break;
            case 'E':
                $type = 200100; break;
            case 'F':
                $type = 200200; break;
            case 'G':
                $type = 200300; break;
            case 'H':
                $type = 200400; break;
            case 'I':
                $type = 200500; break;
            case 'J':
                $type = 200600; break;
            case 'K':
                $type = 200700; break;
            case 'L':
                $type = 200800; break;
            case 'M':
                $type = 200900; break;
            case 'S':
                $type = 201000; break;
            case 'X':
                $type = 201100; break;
            default:
                if ($key >= 'A' && $key <= 'Z') {
                    $type = 300000;
                }
                break;
        }    
        return $type;
    }

    private function get_scores_list_by_key($key) {
        $scores_info = "";
        $key = 100 * $key;
        if(999900 == $key) {
            $scores_info = $this->courses_mod->get_hil_scores();
        } else {
            $scores_info = $this->courses_mod->get_specific_scores($key);
        } 
        return $scores_info;
    }

}