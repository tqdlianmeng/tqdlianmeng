<?php
namespace Admin\Controller;
use Think\Controller;
class VideoController extends CommonController {
    
    public function index() {
        if (IS_AJAX) {
            $m_act = M('video');
            $requestData= $_REQUEST;
            $columns = array( 
                0 => 'title', 
                1 => 'type',
                2 => 'cover',
                3 => 'is_online',
                4 => 'mod_ts'
            );

            // 获取所有记录数
            $sql = "SELECT id ";
            $sql.=" FROM video";
            $total = count($m_act->query($sql));
            $totalFiltered = $total;

            // 获取搜索
            $sql = "SELECT title, type, cover, is_online, mod_ts, id ";
            $sql.=" FROM video";
            if( !empty($requestData['search']['value']) ) {  
                $sql.=" WHERE title LIKE '%".$requestData['search']['value']."%' ";    
            }
            $totalFiltered = count($m_act->query($sql));
            $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
            $res = $m_act->query($sql);

            $types = array('宣传视频', '教学视频', '格斗视频');
            $online = array('F' => '否', 'T' => '是');
            $data = array();
            foreach( $res as $k => $v ) {
                $tmp=array();
                $id = $v['id'];
                $tmp[] = $v["title"];
                $tmp[] = $types[$v["type"]];
                $tmp[] = "<img style='width:100px;' src='".$v['cover']."'>";
                $tmp[] = $online[$v["is_online"]];
                $tmp[] = $v["mod_ts"];
                $tmp[] = "<a class='btn btn-success tip-left view' style='margin-right:15px;' href='javascript:;' data-id='{$id}' title='查看'>查看</a>".
                         "<a class='btn btn-info tip-left edit' href='javascript:;' style='margin-right:15px;' data-id='{$id}' title='编辑'>编辑</a>".
                         "<a class='btn btn-danger tip-left del' href='javascript:;' data-id='{$id}' title='删除'>删除</a>";
                $data[] = $tmp;
            }

            $json_data = array(
                "draw"            => intval( $requestData['draw'] ), 
                "recordsTotal"    => intval( $total ),
                "recordsFiltered" => intval( $totalFiltered ), 
                "data"            => $data
            );

            echo json_encode($json_data);
            
        } else {
            $this->display();
        }       
    }

    //点击查看
    public function view() {
        
        $id = I('get.id');
        if (empty($id)) {
            $this->redirect('Video/index');
        }
        $m_event = M('Video');
        $data = $m_event->where('id='.$id)->select();

        $this->assign('data', $data[0]);
        $this->display();
    }


    //活动资讯添加
    public function add(){

    	$Video = M('Video');
        
        if (IS_POST) {
            // echo "<pre>";
            // var_dump($_POST);
            // var_dump($_FILES);
            // echo  "</pre>";
            // exit;
            $test = $Video -> where(array('title'=>$_POST['title'])) -> select();

            if($test){
                $this -> error("介个视频标题都添加过了，不信你瞅瞅");
            }
            
            $url = 'http://'.$_SERVER['HTTP_HOST'];
            $data = array(
                'title'     => $_POST['title'],
                'video_url' => $url.$_POST['path'],             
                'crt_ts'    => time()        
            );
            
            if(empty($data['title'])){
                $this -> error("标题不能为空");
            }
            
            $data['is_online'] = $_POST['is_online'];
            $data['type']      = $_POST['type'];
            
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置封面上传大小
            $upload->exts     = array('jpg', 'png', 'jpeg');// 设置封面上传类型
            $upload->rootPath = './Public/Uploads/'; // 设置封面上传根目录
            $upload->savePath = 'video/'; // 设置附件上传（子）目录


            // 上传文件 
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
                if(!empty($info['cover']['savename'])) {
                    $data['cover'] = $url.'/Public/Uploads/'.$info['cover']['savepath'].$info['cover']['savename'];
                }
            }

        	$res = $Video -> add($data);

        	if($res){
        		$this -> success("视频添加成功", U('Admin/Video/index'));
        	}else{
        		$this -> error("视频添加失败");
        	}

        } else {
            $this->display();
        }
    }

    public function del(){

    	$Act = M('Video');

    	$id = $_POST['id'];
        $delDir = $Act -> field('cover, video_url') -> where('id='.intval($id)) -> find();
        if($delDir){
            $videoName = basename($delDir['video_url']);
            $coverName = basename($delDir['cover']);
            $coverDatePath = substr(dirname($delDir['cover']), -10);
            $coverDir = MY_ROOT.'/Public/Uploads/video/'.$coverDatePath;
            $path_arr = array(
                        "0" => MY_ROOT.'/Public/Uploads/Video_uploads/'.$videoName,
                        "1" => $coverDir.'/'.$coverName
                        );
            $int = 0;
            for($x=0; $x<count($path_arr); $x++){
                if(unlink($path_arr[$x])){
                    $int += 1;                    
                }else{
                    $result = array('is_ok' => false);
                }
            }

            $dirAllFile = count(scandir($coverDir))-2;
            if($dirAllFile == 0){
                if(is_dir($coverDir)){
                    rmdir($coverDir);                   
                }
            }
            
            if($int == 2){
                $res = $Act->where('id='.intval($id))->delete();
                if ($res) {
                    $result = array('is_ok' => true);            
                } else {
                    $result = array('is_ok' => false);            
                }
            }
            $this->ajaxReturn($result);
        }
    }

    
    public function edit(){
        $M = M("Video");
        $video = $M->where("id=" . (int)$_GET['id'])->find();
        
        if ($video['id'] == '') {
            $this->error("该视频不存在");
        }

        $this->assign("res", $video);
        
        $this->display();
    }


    public function update(){
        // echo "<pre>";
        // var_dump($_POST);
        // var_dump($_FILES);
        // echo  "</pre>";die;
        if (IS_POST) {
            $list = M("Video");
            $data = array(
                'title'     => $_POST['title']                  
            );
            
            if(empty($data['title'])){
                $this -> error("必填选项不能为空");
            }
            

            if(!empty($_FILES['cover']['name'])){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize  = 3145728 ;// 设置附件上传大小
                $upload->exts     = array('jpg', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
                $upload->savePath = 'activity/'; // 设置附件上传（子）目录
                
            // 上传文件 
                $info = $upload->upload();
            
                $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);

                if(!empty($info['cover'])) {
                    $data['cover'] = $url.'/Public/Uploads/'.$info['cover']['savepath'].$info['cover']['savename'];
                }      
            }
            $data['is_online'] = $_POST['is_online'];
            $data['type']      = $_POST['type'];
            $res = $list->where('id='.(int)$_POST['video_id'])->save($data);
        
            if($res){
                $this -> success("修改成功", U('Admin/Video/index'));
            }else{
                $this -> error("修改失败");
            }
        }
    }

    

}