<?php defined('BASEPATH') or exit('No direct script access allowed');
class AdminAuth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->session->userdata('isLoggedIn') == TRUE) {
            redirect('admin-page');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim');
        $this->form_validation->set_rules('password', 'Password');
        if ($this->form_validation->run() == false) {
            // $data['page_setting'] = $this->db->get('page_setting')->row();
            $this->load->view('auth/login');
        } else { //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $admin = $this->db->get_where('majelis', ['email' => $email])->row_array();
        // jika email tersedia
        if ($admin) {
            // brute force protection variables
            $bad_login_limit = 5;
            $lockout_time = 600; //in Seconds
            $first_failed_login = $admin['first_failed_login'];
            $failed_login_count = $admin['failed_login_count'];
            $timeDateTime = date("Y-m-d h:i:s", time());
            // brute force protection
            if (($failed_login_count >= $bad_login_limit) && (strtotime($timeDateTime) - strtotime($first_failed_login) < $lockout_time)) {
                // buat pesan gagal login karena ke locked out
                $this->session->set_flashdata(
                    'message',
                    '<div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			            <span>You are locked out. Please wait for <b id="count_login" data-time="' . ($lockout_time - (strtotime($timeDateTime) - strtotime($first_failed_login))) . '"></b> Seconds</span>
                    </div>
                    '
                );
                redirect('gotoadminpage');
            } else if (password_verify($password, $admin['password'])) { // jika login berhasil
                $data = [
                    'id' => $admin['id'],
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'image' => $admin['image'],
                    'isLoggedIn' => TRUE,
                ];
                $this->session->set_userdata($data);
                //RestoreFailedToZero
                $this->m_auth->restoreFailedLoginCount($admin['id']);
                redirect('admin-page');
            } else { //salah password
                if (strtotime($timeDateTime) - strtotime($first_failed_login) > $lockout_time) {
                    // first unsuccessful login since $lockout_time on the last one expired
                    $this->m_auth->firstFailedLogin($email, $timeDateTime);
                } else {
                    // commit to db increase failed attempt
                    $newFailedLoginCount = $failed_login_count + 1;
                    $this->m_auth->failedLoginCount($email, $newFailedLoginCount);
                }
                $admin = $this->db->get_where('majelis', ['email' => $email])->row_array();
                $this->session->set_flashdata(
                    'message',
                    '<div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <span>Incorrect email or password. Please try again. <br> Failed ' . $admin['failed_login_count'] . ', Max login attempt is ' . $bad_login_limit . '</span>
                    </div>'
                );
                redirect('gotoadminpage');
            }
        } else { //belum registrasi
            $this->session->set_flashdata(
                'message',
                '<div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <span>This email is not registered!</span>
                </div>'
            );
            redirect('gotoadminpage');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(['id', 'nama', 'email', 'image', 'isLoggedIn']);
        redirect(base_url());
    }
}
