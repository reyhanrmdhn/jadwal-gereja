<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('Global_model', 'm_global');
        $this->load->model('Auth_model', 'm_auth');
        $this->load->model('Input_model', 'm_input');
        $this->load->model('Data_model', 'm_data');

        date_default_timezone_set("Asia/Jakarta");
    }

    // meta data function
    protected function _headData($Page)
    {
        $data['page'] = null;
        $data['has_languages'] = false;

        // data
        $table = null;
        if (!empty($Page)) {
            $table = 'page_' . $Page;
        }

        if ($this->db->table_exists($table)) {
            $page_data = $this->db->get_where($table, ['id' => 1])->row();
        } else {
            $page_data = (object)["id" => 1];
        }
        $page_data = $this->m_data->showDataSEO($table, $page_data);
        $data['title'] = $page_data->meta_title;
        $data['page'] = $page_data;

        // page setting
        // $data['social_media'] = $this->m_data->getSocialMedia();
        // $data['page_setting'] = $this->db->get('page_setting')->row();
        // $data['footer_menu'] = $this->m_data->getFooterMenu();
        return $data;
    }

    protected function _sendMail($content, $email, $subject)
    {
        $email_setting = $this->db->get_where('email_setting', ['id' => 1])->row();
        $this->config->set_item('language', 'english');
        // config
        $config = $this->config->item('email');
        $email_from = $config['smtp_user'];
        $this->email->initialize($config);
        $this->email->from($email_from, strval($email_setting->name));
        $this->email->to($email);
        $this->email->subject(strval($subject));

        // show email message depends on content
        $content = explode(';', $content);
        if ($content[0] == 'email_verif') {
            $data['token'] = $content[1];
            $this->email->message($this->load->view('email/verify_email', $data, true));
        }


        // -- if staging
        // $this->email->send();
        // return true;

        // -- if development
        if ($this->email->send()) {
            return true;
        } else {
            show_error($this->email->print_debugger());
        }
    }
}
