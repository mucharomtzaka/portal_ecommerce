<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
Trefast Development
Trefast Development merupakan Start up Bussiness di bidang 
jasa pengembangan produk teknologi informasi  web development
*/
/*
@author: Mucharom
@Email :mucharomtzaka@yahoo.co.id / mucharomtzaka@gmail.com
@Alamat: Jl.Pagersari-Patean , Kendal 51354 Jawa Tengah
@HP/Whatapps:+6289692412261
@https://github.com/mucharomtzaka
@fanspage : https://www.facebook.com/trefast.teknik.indonesia 
homepage coming soon 
*/
class Auth extends FrontendController {
public function __construct(){
	parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->load->model(array('ion_auth_model'));
		$this->lang->load('auth');
}
public function index($message=''){
		if($this->ion_auth->logged_in())redirect('auth/dashboard/status', 'refresh');
		$this->data['has_notife'] = 'has-feedback';
		if($message =='error'? $message:''){
					$this->data['notif'] = $message;
				}else{
					$this->data['notif'] = '';
		}
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->template->render_frontend('login',$this->data);
	}

	public function dashboard($param=''){
		
			if($this->ion_auth->is_admin()){
				if($param =='status'){
					$notif='<div class="span4 offset4 alert 
				   alert-info text-center"><button type="button" class="close" data-dismiss="alert">
				   <i class="fa fa-times"></i></button>Your is login status</div>';
				}else{
					$notif='<div class="span4 offset4 alert 
				  alert-warning text-center"><button type="button" class="close" data-dismiss="alert">
				  <i class="fa fa-times"></i></button>successful your login</div>';
				} 
				$this->session->set_flashdata('message',$notif);
				redirect('home?user_id='.md5($this->session->userdata('user_id')).'&mode=administrator&token='. md5($this->security->get_csrf_hash()).'', 'refresh');
			}elseif ($this->ion_auth->is_programmer()) {
				redirect('home?user_id='.md5($this->session->userdata('user_id')).'&mode=programmerr&token='.md5($this->security->get_csrf_hash()).'', 'refresh');
			}else{
				if($param =='status'){
					$notif='<div class="span4 offset4 alert 
				   alert-info text-center"><button type="button" class="close" data-dismiss="alert">
				   <i class="fa fa-times"></i></button>Your is login status</div>';
				   $this->session->set_flashdata('message',$notif);
				}
				redirect('/', 'refresh');
			}	
	}

	public function forget_password()
	{
		// setting validation rules by checking whether identity is username or email
		if($this->config->item('identity', 'ion_auth') != 'email' )
		{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() == false)
		{
			$this->data['type'] = $this->config->item('identity','ion_auth');
			// setup the input
			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity','class'=>'form-control'
			);

			if ( $this->config->item('identity', 'ion_auth') != 'email' ){
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->template->render_frontend('forgot_password', array_merge($this->data));
		}
		else
		{
			$identity_column = $this->config->item('identity','ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if(empty($identity)) {

	            		if($this->config->item('identity', 'ion_auth') != 'email')
		            	{
		            		$this->ion_auth->set_error('forgot_password_identity_not_found');
		            	}
		            	else
		            	{
		            	   $this->ion_auth->set_error('forgot_password_email_not_found');
		            	}

		                $this->session->set_flashdata('message', $this->ion_auth->errors());
                		redirect("auth/forget_password?token=".md5($this->security->get_csrf_hash())."", 'refresh');
            		}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth?token=".md5($this->security->get_csrf_hash())."", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forget_password?token=".md5($this->security->get_csrf_hash())."", 'refresh');
			}
		}
	}

	public function postgetAuth(){
		$this->data['title'] = $this->lang->line('login_heading');
		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page

				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->dashboard();
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/index/error?token='.md5($this->security->get_csrf_hash()).'', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);
			$this->data['has_notife'] = 'has-error';
			$this->data['notif'] ='';
			$this->template->render_frontend('login',$this->data);
		}
	}

	public function logout($param=null,$notif=null)
	{
		$this->data['title'] = "Logout";
		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		if($param=='timeout'){
			$notif.='<div class="span4 offset4 alert 
			alert-warning text-center"><button type="button" class="close" data-dismiss="alert">
			<i class="fa fa-times"></i></button>Waktu Session Telah Habis Silahkan login kembali</div>';
			$this->session->set_flashdata('message',$notif);
			redirect('auth/index/login/timeout?user=logout&token='. md5($this->security->get_csrf_hash()).'', 'refresh');
		}else{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
		}
		redirect('auth/index?user=logout&token='. md5($this->security->get_csrf_hash()).'', 'refresh');
	}

	public function redirect_alt(){
        $this->data['notice'] = $this->session->flashdata('notice');
        $this->template->render_backend('notaccess',$this->data);
    }

    public  function register(){
		 $this->data['title'] = 'Register New User';
        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        if($identity_column!=='email')
        {
            $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        }
        else
        {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
      /*  $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');*/
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true)
        {
            $email    = strtolower($this->input->post('email'));
            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                //'company'    => $this->input->post('company'),
                'phone'      => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data))
        {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth/register", 'refresh');
        }
        else
        {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'class' =>'form-control',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                 'class' =>'form-control',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['identity'] = array(
                'name'  => 'identity',
                'id'    => 'identity',
                'type'  => 'text',
                 'class' =>'form-control',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                 'class' =>'form-control',
                'value' => $this->form_validation->set_value('email'),
            );
            /*$this->data['company'] = array(
                'name'  => 'company',
                'id'    => 'company',
                'type'  => 'text',
                 'class' =>'form-control',
                'value' => $this->form_validation->set_value('company'),
            );*/
            $this->data['phone'] = array(
                'name'  => 'phone',
                'id'    => 'phone',
                'type'  => 'text',
                 'class' =>'form-control',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                 'class' =>'form-control',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                 'class' =>'form-control',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->template->render_frontend('register',array_merge($this->data));
        }
 	}

 	public function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
				'class' =>'form-control',
				'size' =>5
			);
			$this->data['new_password'] = array(
				'name'    => 'new',
				'id'      => 'new',
				'type'    => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				'class' =>'form-control',
				'size' =>5
			);
			$this->data['new_password_confirm'] = array(
				'name'    => 'new_confirm',
				'id'      => 'new_confirm',
				'type'    => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				'class' =>'form-control',
				'size' =>5
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
				'class' =>'form-control',
				'size' =>5
			);

			// render
			$this->template->render_frontend('change_password', array_merge($this->data));
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('auth');
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

}