<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FValid extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

		$this->form_validation->set_rules(
            'user','Username',
            'required|min_length[5]|max_length[12]|is_unique[user]',
            array(
                    'rquired'	=> 'You have not provide %s.',
                    'is_unique'	=> 'This %s already exists.'
            )
        );
        $this->form_validation->set_rules('pass','Password','required');
        $this->form_validation->set_rules('passconf','Password Confirmation','required|matches[password]');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[email]');
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('fValid');
        }else
            $this->load->view('ValidSucc');
	}
}