<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->library('session');

		if (!$this->session->userdata('userid')) {
			redirect('User_Login');
		}
	}
	public function index()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Dashboard';
		$this->load->view('admin/head', $data);
		$userid = $this->session->userdata('userid');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		$this->load->view('admin/toprightnav', $data);
		$this->load->view('admin/leftmenu');
		//$this->load->view('admin/dashboard', $data);

		if ($usertype == '1') {
			// $data['ul'] = $this->Admin->factory_list();
			// $data['pl'] = $this->Admin->machine_purpose_list();
			$data['ul'] = $this->Admin->machine_status();
			$this->load->view('admin/dashboard', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->factory_wise_machine_status($factoryid);
			$this->load->view('admin/ie_dashboard', $data);
		} elseif ($usertype == '3') {
			$data['ul'] = $this->Admin->factory_wise_machine_status($factoryid);
			$this->load->view('admin/maintenance_dashboard', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}
		$this->load->view('admin/footer');
	}



	// CONFIGURATION



	public function factory_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/configuration/factory_type_insert_form', $data);
		$this->load->view('admin/footer');
	}
	public function fac_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$ftype = $this->form_validation->set_rules('ftype', 'Factory Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->factory_type_insert_form();
			} else {
				$ftype = $this->input->post('ftype');
				$ins = $this->Admin->fac_type_insert($ftype);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/factory_type_insert_form', 'refresh');
			}
		}
	}
	public function factory_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_type_list();
		$this->load->view('admin/configuration/factory_type_list', $data);
		$this->load->view('admin/footer');
	}
	public function factory_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->factory_type_list();
		$this->load->view('admin/configuration/factory_insert_form', $data);
		$this->load->view('admin/footer');
	}
	public function fac_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$ftypeid = $this->form_validation->set_rules('ftypeid', 'Factory Type', 'required');
			$facid = $this->form_validation->set_rules('facid', 'Factory ID', 'required');
			$facname = $this->form_validation->set_rules('facname', 'Factory Name', 'required');
			$fac_address = $this->form_validation->set_rules('fac_address', 'Factory Address', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->factory_insert_form();
			} else {
				$ftypeid = $this->input->post('ftypeid');
				$facid = $this->input->post('facid');
				$facname = $this->input->post('facname');
				$fac_address = $this->input->post('fac_address');
				$ins = $this->Admin->fac_insert($ftypeid, $facid, $facname, $fac_address);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/factory_insert_form', 'refresh');
			}
		}
	}
	public function factory_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$this->load->view('admin/configuration/factory_list', $data);
	}
	public function factory_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory Info Update';
		$facid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['flup'] = $this->Admin->factory_list_up($facid);
		$this->load->view('admin/configuration/factory_list_up', $data);
	}
	public function flup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fid = $this->input->post('fid');
			$facid = $this->input->post('facid');
			$factoryname = $this->input->post('factoryname');
			$factory_address = $this->input->post('factory_address');

			$ins = $this->Admin->flup($fid, $facid, $factoryname, $factory_address);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/factory_list', 'refresh');
		}
	}
	public function department_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/configuration/department_insert_form', $data);
	}
	public function department_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$department = $this->form_validation->set_rules('department', 'Department Name', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->department_insert_form();
			} else {
				$department = $this->input->post('department');
				$ins = $this->Admin->department_insert($department);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/department_insert_form', 'refresh');
			}
		}
	}
	public function department_list()
	{

		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->department_list();
		$this->load->view('admin/configuration/department_list', $data);
	}
	public function department_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department Info Update';
		$deptid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup'] = $this->Admin->department_list_up($deptid);
		$this->load->view('admin/configuration/department_list_up', $data);
	}
	public function departmentlup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$deptid = $this->input->post('deptid');
			$departmentname = $this->input->post('departmentname');

			$ins = $this->Admin->departmentlup($deptid, $departmentname);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/department_list', 'refresh');
		}
	}
	public function designation_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Designation Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/configuration/designation_insert_form', $data);
	}
	public function designation_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$designation = $this->form_validation->set_rules('designation', 'Designation', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->designation_insert_form();
			} else {
				$designation = $this->input->post('designation');
				$ins = $this->Admin->designation_insert($designation);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/designation_insert_form', 'refresh');
			}
		}
	}
	public function designation_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Designation List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->designation_list();
		$this->load->view('admin/configuration/designation_list', $data);
	}
	public function designation_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Designation Update';
		$designationid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup'] = $this->Admin->designation_list_up($designationid);
		$this->load->view('admin/configuration/designation_list_up', $data);
	}
	public function designationlup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$designation = $this->input->post('edesignation');
			$ins = $this->Admin->parentdesignationlup($designationid, $designation);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/designation_list', 'refresh');
		}
	}
	public function usertype_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/configuration/usertype_insert_form', $data);
	}
	public function usertype_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$usertype = $this->form_validation->set_rules('usertype', 'User type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->usertype_insert_form();
			} else {
				$usertype = $this->input->post('usertype');
				$ins = $this->Admin->usertype_insert($usertype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/usertype_insert_form', 'refresh');
			}
		}
	}
	public function usertype_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->usertype_list();
		$this->load->view('admin/configuration/usertype_list', $data);
	}
	public function usertype_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Type Update';
		$usertypeid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');

		$data['dlup'] = $this->Admin->usertype_list_up($usertypeid);
		$this->load->view('admin/configuration/usertype_list_up', $data);
	}
	public function usertypelup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$usertypeid = $this->input->post('usertypeid');
			$usertype = $this->input->post('usertype');

			$ins = $this->Admin->usertypelup($usertypeid, $usertype);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/usertype_list', 'refresh');
		}
	}
	public function userstatus_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Status Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/configuration/userstatus_insert_form', $data);
	}
	public function userstatus_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$userstatus = $this->form_validation->set_rules('userstatus', 'User Status', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->userstatus_insert_form();
			} else {
				$userstatus = $this->input->post('userstatus');

				$ins = $this->Admin->userstatus_insert($userstatus);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/userstatus_insert_form', 'refresh');
			}
		}
	}
	public function userstatus_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Status List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->userstatus_list();
		$this->load->view('admin/configuration/userstatus_list', $data);
	}
	public function userstatus_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Status Info Update';
		$userstatusid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup'] = $this->Admin->userstatus_list_up($userstatusid);
		$this->load->view('admin/configuration/userstatus_list_up', $data);
	}
	public function userstatuslup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$userstatusid = $this->input->post('userstatusid');
			$userstatus = $this->input->post('userstatus');

			$ins = $this->Admin->userstatuslup($userstatusid, $userstatus);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/userstatus_list', 'refresh');
		}
	}
	public function user_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Info Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->factory_list();
		$data['ul1'] = $this->Admin->department_list();
		$data['ul2'] = $this->Admin->designation_list();
		$data['ul3'] = $this->Admin->usertype_list();
		$this->load->view('admin/configuration/user_insert_form', $data);
	}
	public function user_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$factoryid = $this->input->post('factoryid');
			$departmentid = $this->input->post('departmentid');
			$name = $this->input->post('name');
			$designationid = $this->input->post('designationid');
			$oemail = $this->input->post('oemail');
			$pmobile = $this->input->post('pmobile');
			$usertypeid = $this->input->post('usertypeid');
			$userid = $this->input->post('userid');
			$password = $this->input->post('password');
			$config['upload_path']          = APPPATH . '../assets/uploads/users';
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['max_size']             = 10000;
			$this->load->library('upload', $config);
			$this->upload->do_upload('pic_file');
			$upload_data = $this->upload->data();
			$pic_file = $upload_data['file_name'];
			$pic_file =  str_replace(' ', '_', $pic_file);
			$ins = $this->Admin->user_insert($factoryid, $departmentid, $designationid, $name, $oemail, $pmobile, $usertypeid, $userid, $password, $pic_file);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Inserted');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Inserted');
			}
			redirect('Dashboard/user_insert_form', 'refresh');
		}
	}
	public function user_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$this->load->view('admin/configuration/user_list', $data);
	}
	public function factorywise_user_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User List';
		$factoryid = $this->input->post('factoryid');
		$data['ul'] = $this->Admin->factorywise_user_list($factoryid);
		$this->load->view('admin/configuration/factorywise_user_list', $data);
	}
	public function user_imglist_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Info Update';
		$urid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['elup'] = $this->Admin->user_list_up($urid);
		$this->load->view('admin/configuration/user_imglist_up', $data);
	}
	public function eimglup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$urid = $this->input->post('urid');
			$config['upload_path']          = APPPATH . '../assets/uploads/users';
			$config['allowed_types']        = 'jpg|jpeg|png|bmp';
			$config['max_size']             = 10000;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('pic_file')) {
				$error = array('error' => $this->upload->display_errors());
				//$this->load->view('upload_form', $error);
			}
			$upload_data = $this->upload->data();
			$pic_file = $upload_data['file_name'];
			$ins = $this->Admin->eimglup($urid, $pic_file);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/user_list', 'refresh');
		}
	}
	public function user_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Info Update';
		$userid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->factory_list();
		$data['ul1'] = $this->Admin->department_list();
		$data['ul2'] = $this->Admin->designation_list();
		$data['ul3'] = $this->Admin->usertype_list();
		$data['ul4'] = $this->Admin->userstatus_list();
		$data['ulup'] = $this->Admin->user_list_up($userid);
		$this->load->view('admin/configuration/user_list_up', $data);
	}
	public function ulup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$factoryid = $this->input->post('factoryid');
			$departmentid = $this->input->post('departmentid');
			$name = $this->input->post('name');
			$designationid = $this->input->post('designationid');
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$usertypeid = $this->input->post('usertypeid');
			$userstatusid = $this->input->post('userstatusid');
			$userid = $this->input->post('userid');
			$password = $this->input->post('password');
			$indate = $this->input->post('indate');
			$userid = $this->input->post('userid');


			$ins = $this->Admin->ulup($factoryid, $departmentid, $designationid, $name, $email, $mobile, $usertypeid, $userstatusid, $userid, $password, $indate);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/user_list', 'refresh');
		}
	}





	// MASTER DATA

	public function machine_purpose_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Purpose Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/master_data/machine_purpose_insert_form', $data);
		$this->load->view('admin/footer');
	}
	public function machine_purpose_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$mpid = $this->form_validation->set_rules('mpid', 'Machine Purpose ID', 'required');
			$mps = $this->form_validation->set_rules('mps', 'Machine Purpose', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->machine_purpose_insert_form();
			} else {
				$mpid = $this->input->post('mpid');
				$mps = $this->input->post('mps');
				$ins = $this->Admin->machine_purpose_insert($mpid, $mps);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/machine_purpose_insert_form', 'refresh');
			}
		}
	}
	public function machine_purpose_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Purpose List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->machine_purpose_list();
		$this->load->view('admin/master_data/machine_purpose_list', $data);
	}

	public function brand_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Brand Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/master_data/brand_insert_form', $data);
	}
	public function brand_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$brand = $this->form_validation->set_rules('brand', 'Brand', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->brand_insert_form();
			} else {
				$brand = $this->input->post('brand');
				$ins = $this->Admin->brand_insert($brand);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/brand_insert_form', 'refresh');
			}
		}
	}
	public function brand_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Brand List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->brand_list();
		$this->load->view('admin/master_data/brand_list', $data);
		$this->load->view('admin/footer');
	}
	public function product_uom_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Product UOM Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/master_data/product_uom_insert_form', $data);
	}

	public function product_uom_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$puom = $this->form_validation->set_rules('puom', 'Product UOM', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->product_uom_insert_form();
			} else {
				$puom = $this->input->post('puom');
				$ins = $this->Admin->product_uom_insert($puom);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/product_uom_insert_form', 'refresh');
			}
		}
	}
	public function supplier_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Supplier Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/master_data/supplier_insert_form', $data);
		$this->load->view('admin/footer');
	}
	public function supplier_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$supplier = $this->form_validation->set_rules('supplier', 'Supplier', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->supplier_insert_form();
			} else {
				$supplier = $this->input->post('supplier');
				$ins = $this->Admin->supplier_insert($supplier);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/supplier_insert_form', 'refresh');
			}
		}
	}
	public function supplier_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Supplier List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->supplier_list();
		$this->load->view('admin/master_data/supplier_list', $data);
		$this->load->view('admin/footer');
	}
	public function product_uom_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Product UOM List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->product_uom_list();
		$this->load->view('admin/master_data/product_uom_list', $data);
	}
	public function product_uom_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Product UOM Update';
		$puomid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['plup'] = $this->Admin->product_uom_list_up($puomid);
		$this->load->view('admin/product_uom_list_up', $data);
	}
	public function productuomlup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$puomid = $this->input->post('puomid');
			$puom = $this->input->post('puom');

			$ins = $this->Admin->productuomlup($puomid, $puom);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/product_uom_list', 'refresh');
		}
	}
	public function machine_name_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Name Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->machine_purpose_list();
		$this->load->view('admin/master_data/machine_name_insert_form', $data);
		$this->load->view('admin/footer');
	}
	public function machine_name_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$mpid = $this->form_validation->set_rules('mpid', 'Machine Purpose', 'required');
			$mcode = $this->form_validation->set_rules('mcode', 'Machine Code', 'required|max_length[5]');
			$mname = $this->form_validation->set_rules('mname', 'Machine Name', 'required|max_length[100]');
			if ($this->form_validation->run() == FALSE) {
				$this->machine_name_insert_form();
			} else {
				$mpid = $this->input->post('mpid');
				$mcode = $this->input->post('mcode');
				$mname = $this->input->post('mname');
				$minfo = $this->input->post('minfo');
				$ins = $this->Admin->machine_name_insert($mpid, $mcode, $mname, $minfo);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/machine_name_insert_form', 'refresh');
			}
		}
	}
	public function machine_name_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Name List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->machine_name_list();
		$this->load->view('admin/master_data/machine_name_list', $data);
		$this->load->view('admin/footer');
	}
	public function model_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Model Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		// $data['ul'] = $this->Admin->machine_name_list();
		$data['ul'] = $this->Admin->machine_purpose_list();
		$this->load->view('admin/master_data/model_insert_form', $data);
		$this->load->view('admin/footer');
	}
	public function model_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$mnid = $this->form_validation->set_rules('mnid', 'Machine Name', 'required');
			$model = $this->form_validation->set_rules('model', 'Model', 'required|max_length[50]');
			if ($this->form_validation->run() == FALSE) {
				$this->model_insert_form();
			} else {
				$mnid = $this->input->post('mnid');
				$model = $this->input->post('model');
				$ins = $this->Admin->model_insert($mnid, $model);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/model_insert_form', 'refresh');
			}
		}
	}
	public function model_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Model List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->model_list();
		$this->load->view('admin/master_data/model_list', $data);
		$this->load->view('admin/footer');
	}
	public function machine_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/master_data/machine_type_insert_form', $data);
		$this->load->view('admin/footer');
	}
	public function machine_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$mtid = $this->form_validation->set_rules('mtid', 'Machine Type ID', 'required');
			$mtype = $this->form_validation->set_rules('mtype', 'Machine Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->machine_type_insert_form();
			} else {
				$mtid = $this->input->post('mtid');
				$mtype = $this->input->post('mtype');
				$ins = $this->Admin->machine_type_insert($mtid, $mtype);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/machine_type_insert_form', 'refresh');
			}
		}
	}
	public function machine_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->machine_type_list();
		$this->load->view('admin/master_data/machine_type_list', $data);
		$this->load->view('admin/footer');
	}
	public function machine_inventory_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Inventory Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');
		//$factoryid = $this->session->userdata('factoryid');
		$data['fl'] = $this->Admin->factory_list();
		$data['ul'] = $this->Admin->machine_purpose_list();
		$data['tl'] = $this->Admin->machine_type_list();
		$data['bl'] = $this->Admin->brand_list();
		$data['sl'] = $this->Admin->supplier_list();

		if ($usertype == '1') {
			$this->load->view('admin/master_data/machine_inventory_insert_form', $data);
		} elseif ($usertype == '2') {
			$this->load->view('admin/master_data/factory_wise_machine_inventory_insert_form', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}

		$this->load->view('admin/footer');
	}
	public function show_machinename()
	{
		$this->load->database();
		$this->load->model('Admin');
		$mpid = $this->input->get('mpid');
		$data = $this->Admin->show_machinename($mpid);
		echo json_encode($data);
	}
	public function show_modelname()
	{
		$this->load->database();
		$this->load->model('Admin');
		$mcode = $this->input->get('mcode');
		$data = $this->Admin->show_modelname($mcode);
		echo json_encode($data);
	}

	public function machine_inventory_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$factoryid = $this->form_validation->set_rules('factoryid', 'Factory', 'required');
			$mpid = $this->form_validation->set_rules('mpid', 'Machine Purpose', 'required');
			$mcode = $this->form_validation->set_rules('mcode', 'Machine Name', 'required');
			$monid = $this->form_validation->set_rules('monid', 'Model', 'required');
			$mtid = $this->form_validation->set_rules('mtid', 'Machine Type', 'required');
			$brandid = $this->form_validation->set_rules('brandid', 'Brandid', 'required');
			$supplierid = $this->form_validation->set_rules('supplierid', 'Supplier', 'required');
			$price = $this->form_validation->set_rules('price', 'Price', 'required');
			$pqty = $this->form_validation->set_rules('pqty', 'Purchase', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->machine_inventory_insert_form();
			} else {
				$factoryid = $this->input->post('factoryid');
				$mpid = $this->input->post('mpid');
				$mcode = $this->input->post('mcode');
				$monid = $this->input->post('monid');
				$mtid = $this->input->post('mtid');
				$brandid = $this->input->post('brandid');
				$supplierid = $this->input->post('supplierid');
				$pdate = $this->input->post('pdate');
				$price = $this->input->post('price');
				$wr = $this->input->post('wr');
				$pqty = $this->input->post('pqty');
				$description = $this->input->post('description');
				$ins = $this->Admin->machine_inventory_insert($factoryid, $mpid, $mcode, $monid, $mtid, $brandid, $supplierid, $price, $wr, $pdate, $pqty, $description);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/machine_inventory_insert_form', 'refresh');
			}
		}
	}
	public function machine_inventory_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		$data['title'] = 'Machine Inventory List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');


		if ($usertype == '1') {
			$data['ul'] = $this->Admin->machine_inventory_list();
			$this->load->view('admin/master_data/machine_inventory_list', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->factory_wise_machine_inventory_list($factoryid);
			$this->load->view('admin/master_data/factory_wise_machine_inventory_list', $data);
		} elseif ($usertype == '3') {
			$data['ul'] = $this->Admin->factory_wise_machine_inventory_list($factoryid);
			$this->load->view('admin/master_data/factory_wise_machine_inventory_list', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}
		$this->load->view('admin/footer');
	}
	public function machine_rent_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Rent Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$minvid = $this->uri->segment(3);
		$macode = $this->uri->segment(4);
		$rminvid = $this->uri->segment(5);
		$cfactoryid = $this->uri->segment(6);
		$data['minvid'] = $minvid;
		$data['macode'] = $macode;
		$data['rminvid'] = $rminvid;
		$data['cfactoryid'] = $cfactoryid;
		$data['ul'] = $this->Admin->factory_list();
		$this->load->view('admin/master_data/machine_rent_insert_form', $data);
		$this->load->view('admin/footer');
	}
	public function machine_rent_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$dfid = $this->form_validation->set_rules('dfid', 'Factory', 'required');
			$rd = $this->form_validation->set_rules('rd', 'Rent Days', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->machine_rent_insert_form();
			} else {
				$minvid = $this->input->post('minvid');
				$macode = $this->input->post('macode');
				$rminvid = $this->input->post('rminvid');
				$cfactoryid = $this->input->post('cfactoryid');
				$dfid = $this->input->post('dfid');
				$rd = $this->input->post('rd');
				$rp = $this->input->post('rp');
				$rentdate = $this->input->post('rentdate');
				$remarks = $this->input->post('remarks');
				$ins = $this->Admin->machine_rent_insert($minvid, $macode, $cfactoryid, $dfid, $rd, $rp, $rentdate, $remarks, $rminvid);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/machine_inventory_list', 'refresh');
			}
		}
	}
	public function machine_rent_return_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Rent Return Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$minvid = $this->uri->segment(3);
		$macode = $this->uri->segment(4);
		$rminvid = $this->uri->segment(5);
		$cfactoryid = $this->uri->segment(6);
		$pfactoryid = $this->uri->segment(7);
		$data['minvid'] = $minvid;
		$data['macode'] = $macode;
		$data['rminvid'] = $rminvid;
		$data['cfactoryid'] = $cfactoryid;
		$data['pfactoryid'] = $pfactoryid;
		//$data['ul'] = $this->Admin->factory_list();
		$this->load->view('admin/master_data/machine_rent_return_insert_form', $data);
		$this->load->view('admin/footer');
	}
	public function machine_rent_return_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {

			//$minvid = $this->input->post('minvid');
			$macode = $this->input->post('macode');
			//$rminvid = $this->input->post('rminvid');
			//$cfactoryid = $this->input->post('cfactoryid');
			$pfactoryid = $this->input->post('pfactoryid');
			$returndate = $this->input->post('returndate');
			$returnremarks = $this->input->post('returnremarks');
			$ins = $this->Admin->machine_rent_return_insert($macode, $pfactoryid, $returndate, $returnremarks);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Inserted');
			} else {
				$this->session->set_flashdata('Un Successfully', 'Failed To Inserted');
			}
			redirect('Dashboard/machine_inventory_list', 'refresh');
		}
	}
	public function single_machine_rent_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Rent List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$rminvid = $this->uri->segment(3);
		$data['ul'] = $this->Admin->single_machine_rent_list($rminvid);
		$this->load->view('admin/master_data/single_machine_rent_list', $data);
		$this->load->view('admin/footer');
	}
	public function date_wise_machine_transfer_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Machine Transfer List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/master_data/date_wise_machine_transfer_list_form', $data);
	}
	public function date_wise_machine_transfer_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$factoryid = $this->session->userdata('factoryid');
		$usertype = $this->session->userdata('user_type');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		if ($usertype == '1') {
			$data['ul'] = $this->Admin->date_wise_machine_transfer_list($pd, $wd);
			$data['ul1'] = $this->Admin->date_wise_machine_transfer_list_id($pd, $wd);
			$this->load->view('admin/master_data/date_wise_machine_transfer_list', $data);
		}
		if ($usertype == '2') {
			$data['ul'] = $this->Admin->date_wise_factory_wise_machine_transfer_list($factoryid, $pd, $wd);
			$data['ul1'] = $this->Admin->date_wise_factory_wise_machine_transfer_list_id($factoryid, $pd, $wd);
			$this->load->view('admin/master_data/date_wise_machine_transfer_list', $data);
		}
		if ($usertype == '3') {
			$data['ul'] = $this->Admin->date_wise_factory_wise_machine_transfer_list($factoryid, $pd, $wd);
			$data['ul1'] = $this->Admin->date_wise_factory_wise_machine_transfer_list_id($factoryid, $pd, $wd);
			$this->load->view('admin/master_data/date_wise_machine_transfer_list', $data);
		}
	}
	public function date_wise_machine_rent_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Machine Rent List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/master_data/date_wise_machine_rent_list_form', $data);
	}
	public function date_wise_machine_rent_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$factoryid = $this->session->userdata('factoryid');
		$usertype = $this->session->userdata('user_type');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		if ($usertype == '1') {
			$data['ul'] = $this->Admin->date_wise_machine_rent_list($pd, $wd);
			$data['ul1'] = $this->Admin->date_wise_machine_rent_list_id($pd, $wd);
			$this->load->view('admin/master_data/date_wise_machine_rent_list', $data);
		}
		if ($usertype == '2') {
			$data['ul'] = $this->Admin->date_wise_factory_wise_machine_rent_list($factoryid, $pd, $wd);
			$data['ul1'] = $this->Admin->date_wise_factory_wise_machine_rent_list_id($factoryid, $pd, $wd);
			$this->load->view('admin/master_data/date_wise_machine_rent_list', $data);
		}
		if ($usertype == '3') {
			$data['ul'] = $this->Admin->date_wise_factory_wise_machine_rent_list($factoryid, $pd, $wd);
			$data['ul1'] = $this->Admin->date_wise_factory_wise_machine_rent_list_id($factoryid, $pd, $wd);
			$this->load->view('admin/master_data/date_wise_machine_rent_list', $data);
		}
	}
	public function off_day_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Off Day Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/master_data/off_day_insert_form', $data);
	}
	public function year_wise_date_month_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$factoryid = $this->session->userdata('factoryid');
		$usertype = $this->session->userdata('user_type');
		$year = $this->input->post('year');
		$data['year'] = $year;
		$data['calendarData'] = $this->generateYearCalendar($year);
		$this->load->view('admin/master_data/year_wise_date_month_list', $data);
	}
	private function generateYearCalendar($year)
	{
		$calendar = [];

		for ($month = 1; $month <= 12; $month++) {
			$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
			$monthName = date("F", mktime(0, 0, 0, $month, 1, $year));

			for ($day = 1; $day <= $daysInMonth; $day++) {
				$date = sprintf("%04d-%02d-%02d", $year, $month, $day);
				$dayName = date("l", strtotime($date));

				$calendar[] = [
					'date' => $date,
					'day' => $dayName,
					'month' => $monthName,
					'year' => $year
				];
			}
		}

		return $calendar;
	}
	public function year_wise_off_day_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');


		$factoryid = $this->session->userdata('factoryid');
		$offdate = $this->input->post('offdate');

		for ($i = 0; $i < count($offdate); $i++) {
			$data["i"] = $i;
			$data["factoryid"] = $factoryid;
			$data["offdate"] = $offdate[$i];

			$ins = $this->Admin->year_wise_off_day_insert($data);
		}
		if ($ins == TRUE) {
			$this->session->set_flashdata('Successfully', 'Successfully Inserted');
		} else {
			$this->session->set_flashdata('Un Successfully', 'Failed To Inserted');
		}
		redirect('Dashboard/off_day_insert_form', 'refresh');
	}
	public function single_machine_repair_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Repair Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$minvid = $this->uri->segment(3);
		$macode = $this->uri->segment(4);
		$rminvid = $this->uri->segment(5);
		$cfactoryid = $this->uri->segment(6);
		$data['minvid'] = $minvid;
		$data['macode'] = $macode;
		$data['rminvid'] = $rminvid;
		$data['cfactoryid'] = $cfactoryid;
		//$data['ul'] = $this->Admin->factory_list();
		$this->load->view('admin/master_data/single_machine_repair_insert_form', $data);
		$this->load->view('admin/footer');
	}
	public function single_machine_repair_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$rp = $this->form_validation->set_rules('rp', 'Repair Price', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->single_machine_repair_insert_form();
			} else {
				$minvid = $this->input->post('minvid');
				$macode = $this->input->post('macode');
				$rminvid = $this->input->post('rminvid');
				$cfactoryid = $this->input->post('cfactoryid');
				$rd = $this->input->post('rd');
				$rp = $this->input->post('rp');
				$remarks = $this->input->post('remarks');
				$ins = $this->Admin->single_machine_repair_insert($minvid, $macode, $cfactoryid, $rp, $rd, $remarks, $rminvid);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/machine_inventory_list', 'refresh');
			}
		}
	}
	public function single_machine_repair_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Repair List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$rminvid = $this->uri->segment(3);
		$data['ul'] = $this->Admin->single_machine_repair_list($rminvid);
		$this->load->view('admin/master_data/single_machine_repair_list', $data);
		$this->load->view('admin/footer');
	}
	public function multiple_machine_rent_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Rent Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');

		if ($usertype == '1') {
			$data['ul'] = $this->Admin->factory_list();
			$data['pl'] = $this->Admin->machine_purpose_list();
			$this->load->view('admin/master_data/multiple_machine_rent_insert_form', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->factory_not_own_list($factoryid);
			$data['pl'] = $this->Admin->machine_purpose_list();
			$this->load->view('admin/master_data/factory_wise_multiple_machine_rent_insert_form', $data);
		} elseif ($usertype == '3') {
			$data['ul'] = $this->Admin->factory_not_own_list($factoryid);
			$data['pl'] = $this->Admin->machine_purpose_list();
			$this->load->view('admin/master_data/factory_wise_multiple_machine_rent_insert_form', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}

		$this->load->view('admin/footer');
	}
	public function purpose_wise_machine_inventory()
	{
		$this->load->database();
		$this->load->model('Admin');
		$cfactoryid = $this->input->post('cfactoryid');
		$mpid = $this->input->post('mpid');
		$data['dfid'] = $this->input->post('dfid');
		$data['rd'] = $this->input->post('rd');
		$data['rp'] = $this->input->post('rp');
		$data['ad'] = $this->input->post('ad');
		$data['rentdate'] = $this->input->post('rentdate');
		$data['remarks'] = $this->input->post('remarks');
		$data['ul'] = $this->Admin->purpose_wise_machine_inventory($mpid, $cfactoryid);
		$this->load->view('admin/master_data/purpose_wise_machine_inventory_list', $data);
	}
	public function multiple_machine_rent_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {

			$rd = $this->form_validation->set_rules('rd', 'Rent Days', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->multiple_machine_rent_insert_form();
			} else {
				$minvid = $this->input->post('minvid');
				$macode = $this->input->post('macode');
				// $m=explode(',',$macode);
				// echo $m['0'];
				$rminvid = $this->input->post('rminvid');
				$cfactoryid = $this->input->post('cfactoryid');
				$dfid = $this->input->post('dfid');
				$rd = $this->input->post('rd');
				$rp = $this->input->post('rp');
				$ad = $this->input->post('ad');
				$rentdate = $this->input->post('rentdate');
				$remarks = $this->input->post('remarks');

				date_default_timezone_set('Asia/Dhaka');
				$rentdate = date("Y-m-d", strtotime($rentdate));
				$smonth = date('F', strtotime($rentdate));
				$syear = date('Y', strtotime($rentdate));

				$d = date('Y-m-d');
				$t = date("H:i:s");
				$d1 = str_replace("-", "", $d);
				$t1 = str_replace(":", "", $t);
				$rccid = $d1 . $t1;

				$sql = "INSERT INTO machine_renthistory_insert_id VALUES ('$rccid','$cfactoryid','$dfid','$ad','$rentdate',CURTIME(),'$smonth','$syear')";
				$this->db->query($sql);

				for ($i = 0; $i < count($minvid); $i++) {
					$data["i"] = $i;
					$data["rccid"] = $rccid;
					$data["macode"] = $macode[$i];
					$data["minvid"] = $minvid[$i];
					$data["cfactoryid"] = $cfactoryid;
					$data["dfid"] = $dfid;
					$data["rd"] = $rd;
					$data["rp"] = $rp;
					$data["ad"] = $ad;
					$data["rentdate"] = $rentdate;
					$data["remarks"] = $remarks;
					$data["rminvid"] = $rminvid[$i];
					$ins = $this->Admin->multiple_machine_rent_insert($data);
				}

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Rent');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed To Rent');
				}
				redirect('Dashboard/machine_inventory_list', 'refresh');
			}
		}
	}
	public function multiple_machine_rent_return_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Rent Return Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');


		if ($usertype == '1') {
			$data['ul'] = $this->Admin->machine_rent_list();
			$this->load->view('admin/master_data/multiple_machine_rent_return_insert_form', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->factory_wise_machine_rent_list($factoryid);
			$this->load->view('admin/master_data/factory_wise_multiple_machine_rent_return_insert_form', $data);
		} elseif ($usertype == '3') {
			$data['ul'] = $this->Admin->factory_wise_machine_rent_list($factoryid);
			$this->load->view('admin/master_data/factory_wise_multiple_machine_rent_return_insert_form', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}

		$this->load->view('admin/footer');
	}
	public function multiple_machine_rent_return_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {

			$minvid = $this->input->post('minvid');
			$macode = $this->input->post('macode');
			//$rminvid = $this->input->post('rminvid');
			//$cfactoryid = $this->input->post('cfactoryid');
			$pfactoryid = $this->input->post('pfactoryid');
			$returndate = $this->input->post('returndate');
			$returnremarks = $this->input->post('returnremarks');
			for ($i = 0; $i < count($minvid); $i++) {
				$data["i"] = $i;
				$data["macode"] = $macode[$i];
				$data["minvid"] = $minvid[$i];
				$data["pfactoryid"] = $pfactoryid[$i];
				// $data["dfid"] = $dfid;
				// $data["rd"] = $rd;
				// $data["rp"] = $rp;
				$data["returndate"] = $returndate;
				$data["returnremarks"] = $returnremarks;
				// $data["rminvid"] = $rminvid[$i];
				$ins = $this->Admin->multiple_machine_rent_return_insert($data);
			}

			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Returned');
			} else {
				$this->session->set_flashdata('Un Successfully', 'Failed To Returned');
			}
			redirect('Dashboard/machine_inventory_list', 'refresh');
		}
	}
	public function sewing_floor_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$usertype = $this->session->userdata('user_type');
		$data['title'] = 'Sewing Floor Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');

		if ($usertype == '1') {
			$data['ul'] = $this->Admin->factory_list();
			$this->load->view('admin/master_data/sewing_floor_insert_form', $data);
		} elseif ($usertype == '2') {
			$this->load->view('admin/master_data/factory_wise_sewing_floor_insert_form', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}
		$this->load->view('admin/footer');
	}
	public function sewing_floor_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$factoryid = $this->form_validation->set_rules('factoryid', 'Factory Name', 'required');
			$sfn = $this->form_validation->set_rules('sfn', 'Sewing Floor Name', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->sewing_floor_insert_form();
			} else {
				$factoryid = $this->input->post('factoryid');
				$sfn = $this->input->post('sfn');
				$ins = $this->Admin->sewing_floor_insert($factoryid, $sfn);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/sewing_floor_insert_form', 'refresh');
			}
		}
	}
	public function sewing_floor_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Sewing Floor List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');

		if ($usertype == '1') {
			$data['ul'] = $this->Admin->sewing_floor_list();
			$this->load->view('admin/master_data/sewing_floor_list', $data);
		} elseif ($usertype == '2') {
			$factoryid = $this->session->userdata('factoryid');
			$data['ul'] = $this->Admin->factory_wise_sewing_floor_list($factoryid);
			$this->load->view('admin/master_data/factory_wise_sewing_floor_list', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}


		$this->load->view('admin/footer');
	}
	public function sewing_line_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Sewing Line Insert';
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');

		if ($usertype == '1') {
			$data['ul'] = $this->Admin->factory_list();
			$this->load->view('admin/master_data/sewing_line_insert_form', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->factory_wise_sewing_floor_list($factoryid);
			$this->load->view('admin/master_data/factory_wise_sewing_line_insert_form', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}

		$this->load->view('admin/footer');
	}
	public function show_factory_wise_sewing_floor()
	{
		$this->load->database();
		$this->load->model('Admin');
		$factoryid = $this->input->get('factoryid');
		$data = $this->Admin->show_factory_wise_sewing_floor($factoryid);
		echo json_encode($data);
	}
	public function sewing_line_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$factoryid = $this->form_validation->set_rules('factoryid', 'Factory Name', 'required');
			$sfnid = $this->form_validation->set_rules('sfnid', 'Sewing Floor Name', 'required');
			$sln = $this->form_validation->set_rules('sln', 'Sewing Line Name', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->sewing_floor_insert_form();
			} else {
				$factoryid = $this->input->post('factoryid');
				$sfnid = $this->input->post('sfnid');
				$sln = $this->input->post('sln');
				$ins = $this->Admin->sewing_line_insert($factoryid, $sfnid, $sln);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/sewing_line_insert_form', 'refresh');
			}
		}
	}
	public function sewing_line_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$usertype = $this->session->userdata('user_type');
		$data['title'] = 'Sewing Line List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');

		if ($usertype == '1') {
			$data['ul'] = $this->Admin->sewing_line_list();
			$this->load->view('admin/master_data/sewing_line_list', $data);
		} elseif ($usertype == '2') {
			$cfactoryid = $this->session->userdata('factoryid');
			$data['ul'] = $this->Admin->show_factory_wise_sewing_line($cfactoryid);
			$this->load->view('admin/master_data/factory_wise_sewing_line_list', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}

		$this->load->view('admin/footer');
	}
	public function multiple_sewing_line_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Sewing Line Insert';
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');

		if ($usertype == '1') {
			$data['ul'] = $this->Admin->factory_list();
			$this->load->view('admin/master_data/multiple_sewing_line_insert_form', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->show_factory_wise_sewing_floor($factoryid);
			$this->load->view('admin/master_data/factory_wise_multiple_sewing_line_insert_form', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}

		$this->load->view('admin/footer');
	}
	public function multiple_sewing_line_insert()
	{
		date_default_timezone_set('Asia/Dhaka');
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;

		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$factoryid = $this->input->post('factoryid');
		$sfnid = $this->input->post('sfnid');
		$sln = $this->input->post('sln');
		for ($i = 0; $i < count($sln); $i++) {
			$data["i"] = $i;
			$data["ccid"] = $ccid;
			$data["ccid1"] = $ccid . $i;
			$data["factoryid"] = $factoryid;
			$data["sfnid"] = $sfnid;
			$data["sln"] = $sln[$i];

			$ins = $this->Admin->multiple_sewing_line_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function multiple_machine_line_allocate_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Line Wise Machine Allocate';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');

		$usertype = $this->session->userdata('user_type');
		$cfactoryid = $this->session->userdata('factoryid');

		if ($usertype == '1') {
			$data['ul'] = $this->Admin->factory_list();
			$data['pl'] = $this->Admin->machine_purpose_list();
			$data['sl'] = $this->Admin->sewing_line_list();
			$this->load->view('admin/master_data/multiple_machine_line_allocate_insert_form', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->factory_list();
			$data['pl'] = $this->Admin->machine_purpose_list();
			$data['sl'] = $this->Admin->show_factory_wise_sewing_line($cfactoryid);
			$this->load->view('admin/master_data/factory_wise_multiple_machine_line_allocate_insert_form', $data);
		} elseif ($usertype == '3') {
			$data['ul'] = $this->Admin->factory_list();
			$data['pl'] = $this->Admin->machine_purpose_list();
			$data['sl'] = $this->Admin->show_factory_wise_sewing_line($cfactoryid);
			$this->load->view('admin/master_data/factory_wise_multiple_machine_line_allocate_insert_form', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}
		$this->load->view('admin/footer');
	}
	public function purpose_wise_line_allocate_machine_inventory()
	{
		$this->load->database();
		$this->load->model('Admin');
		$mpid = $this->input->post('mpid');
		$cfactoryid = $this->input->post('cfactoryid');
		$data['slnid'] = $this->input->post('slnid');
		$data['adate'] = $this->input->post('adate');
		$data['remarks'] = $this->input->post('remarks');
		$data['ul'] = $this->Admin->purpose_wise_line_allocate_machine_inventory($mpid, $cfactoryid);
		$this->load->view('admin/master_data/purpose_wise_line_allocate_machine_inventory_list', $data);
	}
	public function purpose_wise_repair_insert_machine_inventory()
	{
		$this->load->database();
		$this->load->model('Admin');
		$mpid = $this->input->post('mpid');
		$cfactoryid = $this->input->post('cfactoryid');
		$data['rfactoryid'] = $this->input->post('rfactoryid');
		$data['slnid'] = $this->input->post('slnid');
		$data['adate'] = $this->input->post('adate');
		$data['remarks'] = $this->input->post('remarks');
		$data['ul'] = $this->Admin->purpose_wise_repair_insert_machine_inventory($mpid, $cfactoryid);
		$this->load->view('admin/master_data/purpose_wise_repair_insert_machine_inventory_list', $data);
	}
	public function date_wise_machine_repair_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Machine Repair List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/master_data/date_wise_machine_repair_list_form', $data);
	}
	public function date_wise_machine_repair_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$factoryid = $this->session->userdata('factoryid');
		$usertype = $this->session->userdata('user_type');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		if ($usertype == '1') {
			$data['ul'] = $this->Admin->date_wise_machine_repair_list($pd, $wd);
			$this->load->view('admin/master_data/date_wise_machine_repair_list', $data);
		}
		if ($usertype == '2') {
			$data['ul'] = $this->Admin->date_wise_factory_wise_machine_repair_list($factoryid, $pd, $wd);
			$this->load->view('admin/master_data/date_wise_machine_repair_list', $data);
		}
		if ($usertype == '3') {
			$data['ul'] = $this->Admin->date_wise_factory_wise_machine_repair_list($factoryid, $pd, $wd);
			$this->load->view('admin/master_data/date_wise_machine_repair_list', $data);
		}
	}
	public function show_factory_wise_sewing_line()
	{
		$this->load->database();
		$this->load->model('Admin');
		$cfactoryid = $this->input->get('cfactoryid');
		$data = $this->Admin->show_factory_wise_sewing_line($cfactoryid);
		echo json_encode($data);
	}
	public function multiple_machine_line_allocate_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {

			$slnid = $this->form_validation->set_rules('slnid', 'Line', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->multiple_machine_line_allocate_insert_form();
			} else {
				$minvid = $this->input->post('minvid');
				$macode = $this->input->post('macode');
				// $m=explode(',',$macode);
				// echo $m['0'];
				$rminvid = $this->input->post('rminvid');
				$cfactoryid = $this->input->post('cfactoryid');
				// $dfid = $this->input->post('dfid');
				// $rd = $this->input->post('rd');
				// $rp = $this->input->post('rp');
				$adate = $this->input->post('adate');
				$slnid = $this->input->post('slnid');
				$remarks = $this->input->post('remarks');
				for ($i = 0; $i < count($minvid); $i++) {
					$data["i"] = $i;
					$data["macode"] = $macode[$i];
					$data["minvid"] = $minvid[$i];
					$data["cfactoryid"] = $cfactoryid;
					//$data["dfid"] = $dfid;
					//$data["rd"] = $rd;
					//$data["rp"] = $rp;
					$data["slnid"] = $slnid;
					$data["adate"] = $adate;
					$data["remarks"] = $remarks;
					$data["rminvid"] = $rminvid[$i];
					$ins = $this->Admin->multiple_machine_line_allocate_insert($data);
				}

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Allocated To Line');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed Allocated To Line');
				}
				redirect('Dashboard/machine_inventory_list', 'refresh');
			}
		}
	}
	public function multiple_machine_line_allocate_return_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Line Return Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');


		if ($usertype == '1') {
			$data['ul'] = $this->Admin->machine_line_allocate_list();
			$this->load->view('admin/master_data/multiple_machine_line_allocate_return_insert_form', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->factory_wise_machine_line_allocate_list($factoryid);
			$this->load->view('admin/master_data/factory_wise_multiple_machine_line_allocate_return_insert_form', $data);
		} elseif ($usertype == '3') {
			$data['ul'] = $this->Admin->factory_wise_machine_line_allocate_list($factoryid);
			$this->load->view('admin/master_data/factory_wise_multiple_machine_line_allocate_return_insert_form', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}

		$this->load->view('admin/footer');
	}
	public function multiple_machine_allocate_line_return_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {

			$minvid = $this->input->post('minvid');
			//$macode = $this->input->post('macode');
			//$rminvid = $this->input->post('rminvid');
			$cfactoryid = $this->input->post('cfactoryid');
			$pfactoryid = $this->input->post('pfactoryid');
			$returndate = $this->input->post('returndate');
			$returnremarks = $this->input->post('returnremarks');
			for ($i = 0; $i < count($minvid); $i++) {
				$data["i"] = $i;
				//$data["macode"] = $macode[$i];
				$data["minvid"] = $minvid[$i];
				$data["cfactoryid"] = $cfactoryid[$i];
				$data["pfactoryid"] = $pfactoryid[$i];
				// $data["dfid"] = $dfid;
				// $data["rd"] = $rd;
				// $data["rp"] = $rp;
				$data["returndate"] = $returndate;
				$data["returnremarks"] = $returnremarks;
				// $data["rminvid"] = $rminvid[$i];
				// if ($data['cfactoryid'] == $data['pfactoryid']) {
				$ins = $this->Admin->multiple_machine_allocate_line_return_insert($data);
				// }
				// else{
				// 	$ins = $this->Admin->multiple_machine_allocate_line_return_insert_diff($data);

				//}
			}

			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Returned');
			} else {
				$this->session->set_flashdata('Un Successfully', 'Failed To Returned');
			}
			redirect('Dashboard/machine_inventory_list', 'refresh');
		}
	}
	public function multiple_machine_repair_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Repair';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');

		$usertype = $this->session->userdata('user_type');
		$cfactoryid = $this->session->userdata('factoryid');

		if ($usertype == '1') {
			$data['ul'] = $this->Admin->factory_list();
			$data['pl'] = $this->Admin->machine_purpose_list();
			$data['sl'] = $this->Admin->sewing_line_list();
			$this->load->view('admin/master_data/multiple_machine_repair_insert_form', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->factory_list();
			$data['pl'] = $this->Admin->machine_purpose_list();
			$data['sl'] = $this->Admin->show_factory_wise_sewing_line($cfactoryid);
			$this->load->view('admin/master_data/factory_wise_multiple_machine_repair_insert_form', $data);
		} elseif ($usertype == '3') {
			$data['ul'] = $this->Admin->factory_list();
			$data['pl'] = $this->Admin->machine_purpose_list();
			$data['sl'] = $this->Admin->show_factory_wise_sewing_line($cfactoryid);
			$this->load->view('admin/master_data/factory_wise_multiple_machine_repair_insert_form', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}
		$this->load->view('admin/footer');
	}
	public function multiple_machine_repair_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$rfactoryid = $this->form_validation->set_rules('rfactoryid', 'Repair Factory', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->multiple_machine_repair_insert_form();
			} else {
				$minvid = $this->input->post('minvid');
				$macode = $this->input->post('macode');
				$rminvid = $this->input->post('rminvid');
				$cfactoryid = $this->input->post('cfactoryid');
				$rfactoryid = $this->input->post('rfactoryid');
				$adate = $this->input->post('adate');
				$remarks = $this->input->post('remarks');


				for ($i = 0; $i < count($minvid); $i++) {
					$data["i"] = $i;
					$data["macode"] = $macode[$i];
					$data["minvid"] = $minvid[$i];
					$data["cfactoryid"] = $cfactoryid;
					$data["rfactoryid"] = $rfactoryid;
					$data["adate"] = $adate;
					$data["remarks"] = $remarks;
					$data["rminvid"] = $rminvid[$i];

					$ins = $this->Admin->multiple_machine_repair_insert($data);
				}

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Sent For Repair');
				} else {
					$this->session->set_flashdata('Un Successfully', 'Failed To Sent For Repair');
				}
				redirect('Dashboard/machine_inventory_list', 'refresh');
			}
		}
	}
	public function purpose_wise_repair_machine_inventory()
	{
		$this->load->database();
		$this->load->model('Admin');
		$mpid = $this->input->post('mpid');
		$cfactoryid = $this->input->post('cfactoryid');
		$rfactoryid = $this->input->post('rfactoryid');
		$data['slnid'] = $this->input->post('slnid');
		$data['adate'] = $this->input->post('adate');
		$data['remarks'] = $this->input->post('remarks');
		$data['ul'] = $this->Admin->purpose_wise_line_allocate_machine_inventory($mpid, $cfactoryid);
		$this->load->view('admin/master_data/purpose_wise_repair_machine_inventory_list', $data);
	}
	public function multiple_machine_repair_return_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Line Return Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');


		if ($usertype == '1') {
			$data['ul'] = $this->Admin->machine_running_rapair_list();
			$this->load->view('admin/master_data/multiple_machine_repair_return_insert_form', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->factory_wise_machine_running_rapair_list($factoryid);
			$this->load->view('admin/master_data/factory_wise_multiple_machine_repair_return_insert_form', $data);
		} elseif ($usertype == '3') {
			$data['ul'] = $this->Admin->factory_wise_machine_running_rapair_list($factoryid);
			$this->load->view('admin/master_data/factory_wise_multiple_machine_repair_return_insert_form', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}

		$this->load->view('admin/footer');
	}
	public function multiple_machine_repair_return_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {

			$minvid = $this->input->post('minvid');
			//$macode = $this->input->post('macode');
			//$rminvid = $this->input->post('rminvid');
			$cfactoryid = $this->input->post('cfactoryid');
			$pfactoryid = $this->input->post('pfactoryid');
			$returndate = $this->input->post('returndate');
			$returnremarks = $this->input->post('returnremarks');
			$price = $this->input->post('price');
			for ($i = 0; $i < count($minvid); $i++) {
				$data["i"] = $i;
				$data["minvid"] = $minvid[$i];
				$data["price"] = $price[$i];
				$data["returnremarks"] = $returnremarks[$i];
				$data["cfactoryid"] = $cfactoryid;
				$data["pfactoryid"] = $pfactoryid[$i];
				$data["returndate"] = $returndate;


				$ins = $this->Admin->multiple_machine_repair_return_insert($data);
			}

			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Returned');
			} else {
				$this->session->set_flashdata('Un Successfully', 'Failed To Returned');
			}
			redirect('Dashboard/machine_inventory_list', 'refresh');
		}
	}
	public function multiple_machine_disposal_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Disposal';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');

		$usertype = $this->session->userdata('user_type');
		$cfactoryid = $this->session->userdata('factoryid');

		if ($usertype == '1') {
			$data['ul'] = $this->Admin->factory_list();
			$data['pl'] = $this->Admin->machine_purpose_list();
			$this->load->view('admin/master_data/multiple_machine_disposal_insert_form', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->factory_list();
			$data['pl'] = $this->Admin->machine_purpose_list();
			$this->load->view('admin/master_data/factory_wise_multiple_machine_disposal_insert_form', $data);
		} elseif ($usertype == '3') {
			$data['ul'] = $this->Admin->factory_list();
			$data['pl'] = $this->Admin->machine_purpose_list();
			$this->load->view('admin/master_data/factory_wise_multiple_machine_disposal_insert_form', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}
		$this->load->view('admin/footer');
	}
	public function purpose_wise_disposal_insert_machine_inventory()
	{
		$this->load->database();
		$this->load->model('Admin');
		$mpid = $this->input->post('mpid');
		$cfactoryid = $this->input->post('cfactoryid');
		$data['rfactoryid'] = $this->input->post('rfactoryid');
		$data['slnid'] = $this->input->post('slnid');
		$data['adate'] = $this->input->post('adate');
		$data['remarks'] = $this->input->post('remarks');
		$data['ul'] = $this->Admin->purpose_wise_disposal_insert_machine_inventory($mpid, $cfactoryid);
		$this->load->view('admin/master_data/purpose_wise_disposal_insert_machine_inventory_list', $data);
	}
	public function multiple_machine_disposal_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {

			$minvid = $this->input->post('minvid');
			$macode = $this->input->post('macode');
			$cfactoryid = $this->input->post('cfactoryid');
			$adate = $this->input->post('adate');
			$remarks = $this->input->post('remarks');
			$rminvid = $this->input->post('rminvid');
			for ($i = 0; $i < count($macode); $i++) {
				$data["i"] = $i;
				$data["minvid"] = $minvid[$i];
				$data["macode"] = $macode[$i];
				$data["cfactoryid"] = $cfactoryid;
				$data["adate"] = $adate;
				$data["remarks"] = $remarks;
				$data["rminvid"] = $rminvid[$i];

				$ins = $this->Admin->multiple_machine_disposal_insert($data);
			}

			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Disposed');
			} else {
				$this->session->set_flashdata('Un Successfully', 'Failed To Disposed');
			}
			redirect('Dashboard/machine_inventory_list', 'refresh');
		}
	}
	public function multiple_machine_sell_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Machine Sell';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');

		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');

		if ($usertype == '1') {
			$data['ul'] = $this->Admin->factory_list();
			$data['pl'] = $this->Admin->machine_purpose_list();
			$this->load->view('admin/master_data/multiple_machine_sell_insert_form', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->factory_not_own_list($factoryid);
			$data['pl'] = $this->Admin->machine_purpose_list();
			$this->load->view('admin/master_data/factory_wise_multiple_machine_sell_insert_form', $data);
		} elseif ($usertype == '3') {
			$data['ul'] = $this->Admin->factory_not_own_list($factoryid);
			$data['pl'] = $this->Admin->machine_purpose_list();
			$this->load->view('admin/master_data/factory_wise_multiple_machine_sell_insert_form', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}
		$this->load->view('admin/footer');
	}
	public function purpose_wise_sell_insert_machine_inventory()
	{
		$this->load->database();
		$this->load->model('Admin');
		$mpid = $this->input->post('mpid');
		$cfactoryid = $this->input->post('cfactoryid');
		$data['sfactoryid'] = $this->input->post('sfactoryid');
		// $data['slnid'] = $this->input->post('slnid');
		$data['adate'] = $this->input->post('adate');
		$data['price'] = $this->input->post('price');
		$data['remarks'] = $this->input->post('remarks');
		$data['ul'] = $this->Admin->purpose_wise_sell_insert_machine_inventory($mpid, $cfactoryid);
		$this->load->view('admin/master_data/purpose_wise_sell_insert_machine_inventory_list', $data);
	}
	public function multiple_machine_sell_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {

			$minvid = $this->input->post('minvid');
			$macode = $this->input->post('macode');
			$cfactoryid = $this->input->post('cfactoryid');
			$sfactoryid = $this->input->post('sfactoryid');
			$mcode = $this->input->post('mcode');
			$mtid = $this->input->post('mtid');
			$monid = $this->input->post('monid');
			$mpid = $this->input->post('mpid');
			$supplierid = $this->input->post('supplierid');
			$brandid = $this->input->post('brandid');
			$warranty = $this->input->post('warranty');
			$description = $this->input->post('description');
			$price = $this->input->post('price');
			$adate = $this->input->post('adate');
			$remarks = $this->input->post('remarks');
			$rminvid = $this->input->post('rminvid');
			for ($i = 0; $i < count($minvid); $i++) {
				$data["j"] = $i;
				$data["minvid"] = $minvid[$i];
				$data["macode"] = $macode[$i];
				$data["mcode"] = $mcode[$i];
				$data["mtid"] = $mtid[$i];
				$data["monid"] = $monid[$i];
				$data["mpid"] = $mpid;
				$data["supplierid"] = $supplierid[$i];
				$data["brandid"] = $brandid[$i];
				$data["warranty"] = $warranty[$i];
				$data["description"] = $description[$i];
				$data["cfactoryid"] = $cfactoryid;
				$data["sfactoryid"] = $sfactoryid;
				$data["price"] = $price;
				$data["adate"] = $adate;
				$data["remarks"] = $remarks;
				$data["rminvid"] = $rminvid[$i];

				$ins = $this->Admin->multiple_machine_sell_insert($data);
			}

			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Sell');
			} else {
				$this->session->set_flashdata('Un Successfully', 'Failed To Sell');
			}
			redirect('Dashboard/machine_inventory_list', 'refresh');
		}
	}
	public function machine_running_line_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		$data['title'] = 'Machine Running List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');


		if ($usertype == '1') {
			$data['ul'] = $this->Admin->machine_running_line_list();
			$this->load->view('admin/master_data/machine_running_line_list', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->factory_wise_machine_running_line_list($factoryid);
			$this->load->view('admin/master_data/factory_wise_machine_running_line_list', $data);
		} elseif ($usertype == '3') {
			$data['ul'] = $this->Admin->factory_wise_machine_running_list($factoryid);
			$this->load->view('admin/master_data/factory_wise_machine_running_line_list', $data);
		} else {
			$this->load->view('error/error_404', $data);
		}
		$this->load->view('admin/footer');
	}
}
