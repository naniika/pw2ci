<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mhs extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// menggunakan autoload 
		// turn on jika tidak memakai autoload
		// $this->load->database();
		// $this->load->helper(array('form','url'));
		// $this->load->model('ModelMhs');
		// $this->load->library('form_validation');
		// $this->load->library('session');
	}
	//login
	public function login()
	{
		$user = $this->input->post('user');
		$pswd = $this->input->post('pswd');
		$where = array(
			'user' => $user,
			'pswd' => $pswd
		);
		$cek = $this->ModelMhs->ceklogin("user", $where)->num_rows();
		if ($cek > 0) {
			$data = array(
				'user' => $user,
				'pswd' => $pswd,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($data);
			$this->session->mark_as_temp(array('user', 'pswd'), 60 * 2); // add session expired
			redirect('mhs/vMhs');
		} else {
			redirect('mhs/vMhs');
		}
	}
	//logout
	public function logout()
	{
		$data = array('user', 'pswd');
		$this->session->unset_userdata($data);
		redirect('mhs/vMhs');
	}
	public function vMhs()
	{
		//$data['mhs'] = $this->ModelMhs->retrieve();
		$config = array();
		$config['base_url'] = base_url() . 'mhs/vMhs';
		$config['total_rows'] = $this->ModelMhs->record_count();
		$config['per_page'] = 2;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3) ? $this->uri->segment(3) : 0);
		$data['results'] = $this->ModelMhs->retrieve($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();
		$data['page'] = $page;
		$this->load->view('vMhs', $data);
		if ($this->session->userdata('user') !== NULL) {
			$this->session->mark_as_temp(array('user', 'pswd'), 60 * 2); // add session expired
		}
	}
	// public function upFoto(){
	// 	$this->load->view('upFoto', array('error' => ''));
	// }
	public function index()
	{
		// $data['mhs'] = $this->ModelMhs->retrieve();
		$config = array();
		$config['base_url'] = base_url() . 'mhs/vMhs';
		$config['total_rows'] = $this->ModelMhs->record_count();
		$config['per_page'] = 2;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3) ? $this->uri->segment(3) : 0);
		$data['results'] = $this->ModelMhs->retrieve($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();
		$data['page'] = $page;
		$this->load->view('vMhs', $data);
		if ($this->session->userdata('user') !== NULL) {
			$this->session->mark_as_temp(array('user', 'pswd'), 60 * 2); // add session expired
		}
	}
	public function aMhs()
	{
		if ($this->session->userdata('user') == NULL) {
			redirect('mhs/vMhs');
		} else {
			$this->load->view('aMhs', array('error' => ''));
			$this->session->mark_as_temp(array('user', 'pswd'), 60 * 2); // add session expired
		}
	}
	//upload
	public function do_upload()
	{
		$config['upload_path']	= './assets/fotoMhs/';
		$config['allowed_types']	= 'gif|jpg|png';
		// $config['min_size']	= 100; //KB
		$config['max_size']	= 100; //KB
		// $config['min_width'] = 1024;
		// $config['min_height'] = 768;
		$config['max_width'] = 1024; //1024
		$config['max_height'] = 768; //768
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
			$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('aMhs', $error);
		} else {
			//$data = array('upload_data' => $this->upload->data());
			$file = $this->upload->data();
			$data = [
				'nim' => set_value('nim'),
				'nama' => set_value('nama'),
				'alamat' => set_value('alamat'),
				'foto' => $file['file_name'],
			];
			$this->ModelMhs->add($data);
			$data['submitted'] = true;
			$this->load->view('aMhs', $data);
			//$this->load->view('upFotoStatus', $data);
		}
	}
	// public function submit(){
	// 	$this->ModelMhs->add($this->input->post('var'));
	// 	$data['submitted'] = true;
	// 	$this->load->view('aMhs', $data);
	// }
	public function dMhs()
	{
		// login dlu boyyy
		if ($this->session->userdata('user') == NULL) {
			redirect('mhs/vMhs');
			// echo '<script language="javascript">';
			// echo 'alert("Login dlu...")';
			// echo '</script>';
		} else {
			// delete foto di directori beserta record dbnya
			$f = $this->ModelMhs->fotoMhs($this->uri->rsegment(3));
			unlink('assets/fotoMhs/' . $f->foto);
			$this->ModelMhs->delete($this->uri->rsegment(3));
			$this->index();
			redirect('mhs/vMhs'); //tambahan
			$this->session->mark_as_temp(array('user', 'pswd'), 60 * 2); // add session expired
		}
	}
	public function dfMhs()
	{
		$f = $this->ModelMhs->fotoMhs($this->uri->rsegment(3));
		unlink('assets/fotoMhs/' . $f->foto);
		$data['mhs'] = $this->ModelMhs->getMhs($this->uri->rsegment(3));
		$this->load->view('uMhs', $data);
	}
	//jika update error
	public function pupMhs()
	{
		$this->load->view('pupMhs', array('error' => ''));
	}
	public function uMhs()
	{
		if ($this->session->userdata('user') == NULL) {
			redirect('mhs/vMhs');
		} else {
			//$error = array('error' => '');
			$data['mhs'] = $this->ModelMhs->getMhs($this->uri->rsegment(3));
			$this->load->view('uMhs', $data);
			$this->session->mark_as_temp(array('user', 'pswd'), 60 * 2); // add session expired
		}
	}
	public function update()
	{
		// REUPLOAD FOTO masih error :')
		$config['upload_path']	= './assets/fotoMhs/';
		$config['allowed_types']	= 'gif|jpg|png';
		// $config['min_size']	= 100; //KB
		$config['max_size']	= 100; //KB
		// $config['min_width'] = 1024;
		// $config['min_height'] = 768;
		$config['max_width'] = 1024; //1024
		$config['max_height'] = 768; //768
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
			$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('pupMhs', $error);
		} else {
			// $this->upload->data();
			$file = $this->upload->data();
			$data = [
				'nim' => set_value('nim'),
				'nama' => set_value('nama'),
				'alamat' => set_value('alamat'),
				'foto' => $file['file_name'],
			];
			$this->ModelMhs->update($this->input->post('old_nim'), $data);
			$this->index();
			redirect('mhs/vMhs'); //tambahan
			$this->session->mark_as_temp(array('user', 'pswd'), 60 * 2);  // add session expired
		}
		// update
		// $this->ModelMhs->update($this->input->post('old_nim'),
		// 						$this->input->post('var'));
		// $this->index();
		// redirect('mhs/vMhs'); //tambahan
	}
	// Latihan Validasi
	public function fValid()
	{
		// $this->form_validation->set_rules('user','Username','required');
		// $this->form_validation->set_rules(
		// 	'username','Username',
		// 	'required|min_length[5]|max_length[12]', // |is_unique[users.username]
		// 	array(
		// 			'rquired'	=> 'You have not provided %s.',
		// 			'is_unique'	=> 'This %s already exists.'
		// 	)
		// );
		$this->form_validation->set_rules('user', 'Username', 'callback_username_check');
		$this->form_validation->set_rules('pass', 'Password', 'required');
		// $this->form_validation->set_rules('passconf','Password Confirmation','required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[pass]');
		// $this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email'); // |is_unique[users.email]

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('fValid');
		} else
			$this->load->view('ValidSucc');
	}
	// masih latihan validasi
	public function username_check($str)
	{
		if ($str == 'test') {
			$this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
			return FALSE;
		} else
			return TRUE;
	}
}
