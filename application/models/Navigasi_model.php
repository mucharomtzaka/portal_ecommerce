
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Navigasi_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	 public function menubar_backend($token){
     $hasil  = $this->db->query('SELECT id as menu_item_id,menu_backend_parent as menu_parent_id, menu_backend_title as menu_item_name,concat("",menu_url_title) as url,menu_backend_icon as icon ,menu_backend_status as status_ FROM menu_backend')->result_array();
    $refs = array();
    $list = array();
    foreach ($hasil as $data) {
    	# code...
	    	 	$thisref = &$refs[ $data['menu_item_id'] ];
	    	 	$thisref['menu_id'] = $data['menu_item_id'] ;
		        $thisref['menu_parent_id'] = $data['menu_parent_id'];
		        $thisref['menu_item_name'] = $data['menu_item_name'];
		        $thisref['url'] = $data['url'];
		        $thisref['icon'] = $data['icon'];
		        $thisref['status'] = $data['status_'];
		        $thisref['token']  = $token;
        if ($data['menu_parent_id'] == 0){
            $list[ $data['menu_item_id'] ] = &$thisref;
        }else{
            $refs[ $data['menu_parent_id'] ]['children'][ $data['menu_item_id'] ] = &$thisref;
        }
    }
    	return $list;
    }

    public function menubar_frontend($token){
     $hasil  = $this->db->query('SELECT id as menu_item_id,menu_frontend_parent as menu_parent_id, menu_frontend_title as menu_item_name,concat("",menu_url_title) as url,menu_frontend_icon as icon ,menu_frontend_status as status_ FROM menu_frontend')->result_array();
    $refs = array();
    $list = array();
    foreach ($hasil as $data) {
    	# code...
	    	 	$thisref = &$refs[ $data['menu_item_id'] ];
	    	 	$thisref['menu_id'] = $data['menu_item_id'] ;
		        $thisref['menu_parent_id'] = $data['menu_parent_id'];
		        $thisref['menu_item_name'] = $data['menu_item_name'];
		        $thisref['url'] = $data['url'];
		        $thisref['icon'] = $data['icon'];
		        $thisref['status'] = $data['status_'];
		         $thisref['token']  = $token;
        if ($data['menu_parent_id'] == 0){
            $list[ $data['menu_item_id'] ] = &$thisref;
        }else{
            $refs[ $data['menu_parent_id'] ]['children'][ $data['menu_item_id'] ] = &$thisref;
        }
    }
    	return $list;
    }

    public function create_list_top($arr,$urutan)
    {
        if($urutan==0){
             $html = "\n<ul class='nav navbar-nav'>\n";
        }else{
             $html = "\n<ul class='dropdown-menu' role='menu'>\n";
        }
        foreach ($arr as $key=>$v){
        	if (array_key_exists('children', $v)){
	               if($v['status'] == 1){
	               	    $html .= "<li class='dropdown '>\n";
		                $html .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                                 <i class="'.$v['icon'].'"></i> <span>'.$v['menu_item_name'].'</span>
							            <span class="pull-right-container">
							              <i class="fa fa-angle-left pull-right"></i>
							            </span>

		                            </a>';
		                $html .= $this->create_list_top($v['children'],1);
		                $html .= "</li>\n";
	               }else{
	               	    $html .= "<li class='dropdown ' style='display:none'>\n";
		                $html .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                                 <i class="'.$v['icon'].'"></i> <span>'.$v['menu_item_name'].'</span>
							            <span class="pull-right-container">
							              <i class="fa fa-angle-left pull-right"></i>
							            </span>

		                            </a>';
		 
		                $html .= $this->create_list_top($v['children'],1);
		                $html .= "</li>\n";
	               }
	            }else{
	            	 if($v['status'] == 1){
	            	 	$html .= '<li class="dropdown"><a href="'.base_url().''.$v['url'].'?menu_id='.$v['menu_id'].'&token='.$v['token'].'">';
		            	 if($urutan==0){
		                        $html .= '<i class="'.$v['icon'].'"></i>';
		                    }
	                    if($urutan==1)
	                    {
	                        $html .=    '<i class="fa fa-angle-double-right"></i>';
	                    }
	                  $html .= "<span>".$v['menu_item_name']."</span></a></li>\n";
	            	 }else{
	            	 	$html .= '<li style="display:none"><a href="'.base_url().''.$v['url'].'">';
		            	 if($urutan==0){
		                        $html .= '<i class="'.$v['icon'].'"></i>';
		                    }
	                    if($urutan==1)
	                    {
	                        $html .=    '<i class="fa fa-angle-double-right"></i>';
	                    }
	                  $html .= "<span>".$v['menu_item_name']."</span></a></li>\n";
	            	 }
	              }
	            }
	            $html .= "</ul>\n";
	            return $html;
    }

    public function create_list_sidebar($arr,$urutan)
    {
        if($urutan==0){
             $html = "\n<ul class='sidebar-menu'>\n";
             
        }else{
             $html = "\n<ul class='treeview-menu'>\n";
        }

        foreach ($arr as $key=>$v){
        	if (array_key_exists('children', $v)){

	               if($v['status'] ==1){
	               		 $html .= "<li class='treeview '>\n";
		                $html .= '<a href="#">
		                                 <i class="'.$v['icon'].'"></i> <span>'.$v['menu_item_name'].'</span>
							            <span class="pull-right-container">
							              <i class="fa fa-angle-left pull-right"></i>
							            </span>

		                            </a>';
		 
		                $html .= $this->create_list_sidebar($v['children'],1);
		                $html .= "</li>\n";
	               }else{

	               		 	$html .= "<li class='treeview ' style='display:none'>\n";
			                $html .= '<a href="#">
			                                 <i class="'.$v['icon'].'"></i> <span>'.$v['menu_item_name'].'</span>
								            <span class="pull-right-container">
								              <i class="fa fa-angle-left pull-right"></i>
								            </span>

			                            </a>';
			 
			                $html .= $this->create_list_sidebar($v['children'],1);
			                $html .= "</li>\n";
	               }
	            }else{
	            		 if($v['status'] ==1){
	            		 	$html .= '<li class="treeview"><a href="'.base_url().''.$v['url'].'?menu_id='.$v['menu_id'].'&token='.$v['token'].'">';
			            	 if($urutan==0){
			                        $html .= '<i class="'.$v['icon'].'"></i>';
			                    }
		                    if($urutan==1)
		                    {
		                        $html .=    '<i class="fa fa-angle-double-right"></i>';
		                    }
		                  $html .= "<span>".$v['menu_item_name']."</span></a></li>\n";
	            		 }else{
			            		 $html .= '<li class="treeview" style="display:none"><a href="'.base_url().''.$v['url'].'">';
				            	 if($urutan==0){
				                        $html .= '<i class="'.$v['icon'].'"></i>';
				                    }
			                    if($urutan==1)
			                    {
			                        $html .=    '<i class="fa fa-angle-double-right"></i>';
			                    }
			                  $html .= "<span>".$v['menu_item_name']."</span></a></li>\n";
			              }
	            	 
	              }
	            }
	            $html .= "</ul>\n";
	            return $html;
    }

}


				