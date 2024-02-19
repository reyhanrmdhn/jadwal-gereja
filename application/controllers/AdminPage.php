<?php defined('BASEPATH') or exit('No direct script access allowed');

class AdminPage extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    // dashboard
    public function index()
    {
        $data['title'] = 'Dashboard';
        // $data['inbox'] = count($this->db->get('inbox')->result());
        $this->m_global->getAdminView('admin/dashboard', $data);
    }
    // media
    public function media()
    {
        $data['title'] = 'Media';
        $this->m_global->getAdminView('admin/media', $data);
    }
    // users
    public function users()
    {
        $data['title'] = 'User Management';
        $data['tablename'] = "admin_account";
        $data['pages'] = $this->m_data->getUsers();
        $this->m_global->getAdminView('admin/users', $data);
    }
    public function add_admin_account()
    {
        $data['tablename'] = "admin_account";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['rows'] = [
            [
                ["name", "text"],
                ["email", "email"],
                ["password", "password"],
                ["image", "image"],
            ]
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/add', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set images
            $dataSubmit = $this->m_input->setImages($data['rows'], $dataSubmit);

            // hashing password
            $password_hash = password_hash($dataSubmit['password'], PASSWORD_DEFAULT);
            $dataSubmit['password'] = $password_hash;
            $this->db->insert($data['tablename'], $dataSubmit);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
					' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Added !
				</div>'
            );
            redirect($this->uri->segment(1) . '/user-management');
        }
    }
    public function edit_admin_account($id)
    {
        $data['tablename'] = "admin_account";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();
        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $data['rows'] = [
            [
                ["name", "text"],
                ["email", "edit_email"],
                ["image", "image"],
            ]
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set images
            $dataSubmit = $this->m_input->setImages($data['rows'], $dataSubmit);
            // update to db
            $this->db->update($data['tablename'], $dataSubmit, ['id' => $id]);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
					' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Updated !
				</div>'
            );
            redirect($this->uri->segment(1) . '/user-management');
        }
    }
    public function changepassword($id)
    {
        $data['tablename'] = "admin_account";
        $data['title'] = 'Change Password ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();
        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }
        $data['rows'] = [
            [
                ["password", "password"],
                ["password_confirm", "password_confirm"],
            ]
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = array(
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            );
            // update to db
            $this->db->update($data['tablename'], $dataSubmit, ['id' => $id]);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
					' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Updated !
				</div>'
            );
            redirect($this->uri->segment(1) . '/users');
        }
    }
    public function delete_user_management()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'admin_account', 'id');
    }


    // -----------------------------------
    //            CONTACT FORM
    // -----------------------------------
    // inbox
    public function inbox()
    {
        $data['title'] = 'Inbox';
        $data['tablename'] = "inbox";
        $data['pages'] = $this->m_data->getInbox();
        $this->m_global->getAdminView('admin/contact/inbox', $data);
    }
    public function delete_inbox()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'inbox', 'id');
    }

    // -----------------------------------
    //            SYSTEM SETTINGS
    // -----------------------------------
    // admin email
    public function admin_email()
    {
        $data['title'] = 'Admin Email List';
        $data['tablename'] = "admin_email";
        $data['pages'] = $this->m_data->getAdminEmail();
        $this->m_global->getAdminView('admin/page_setting/admin_email', $data);
    }
    public function add_admin_email()
    {
        $data['tablename'] = "admin_email";
        $data['title'] = 'Edit ' . ucfirst(str_replace("_", " ", $data['tablename']));
        $data['rows'] = [
            [
                ["email", "email"],
            ],
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/add', $data);
        } else {
            $dataSubmit = $this->input->post();
            // update table
            $this->db->insert($data['tablename'], $dataSubmit);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Added !
              </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']));
        }
    }
    public function edit_admin_email()
    {
        $data['tablename'] = "admin_email";
        $data['title'] = 'Edit ' . ucfirst(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => 1))->row();
        $data['rows'] = [
            [
                ["email", "email"],
            ],
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = $this->input->post();
            // update table
            $this->db->update($data['tablename'], $dataSubmit, ['id' => 1]);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Updated !
              </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']));
        }
    }
    public function delete_admin_email()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'admin_email', 'id');
    }



    // -----------------------------------
    //             PAGE SEO
    // -----------------------------------
    public function page()
    {
        $data['title'] = 'Pages';
        $this->m_global->getAdminView('admin/pages', $data);
    }
    // home
    public function edit_page_home()
    {
        $data['tablename'] = "page_home";
        $data['title'] = 'Edit ' . ucfirst(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => 1))->row();
        $data['page'] = $this->m_data->showDataSEO($data['tablename'], $data['page']);

        $data['rows'] = [
            [
                ["banner_title", "text"],
                ["banner_subtitle", "text"],
            ]
        ];

        $data['seorows'] = [
            ["meta_title", "text"],
            ["meta_keywords", "text"],
            ["meta_description", "textarea"],
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);
        // seo rules
        $this->m_input->setSEORules();

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set images
            $dataSubmit = $this->m_input->setImages($data['rows'], $dataSubmit);
            // update SEO
            $dataSubmit = $this->m_input->updateSEO($dataSubmit, $data['tablename'], $data['page']);
            // update table
            $this->db->update($data['tablename'], $dataSubmit, ['id' => 1]);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                     ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Updated !
                 </div>'
            );
            redirect('admin-page/page');
        }
    }
    // contact
    public function edit_page_contact()
    {
        $data['tablename'] = "page_contact";
        $data['title'] = 'Edit ' . ucfirst(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => 1))->row();
        $data['page'] = $this->m_data->showDataSEO($data['tablename'], $data['page']);

        $data['rows'] = [
            [
                ["banner_text", "text"],
            ],
            [
                ["person_name", "text"],
                ["person_description", "description"],
            ],
            [
                ["contact_title", "text"],
                ["contact_subtitle", "textarea"],
            ]
        ];

        $data['seorows'] = [
            ["meta_title", "text"],
            ["meta_keywords", "text"],
            ["meta_description", "textarea"],
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);
        // seo rules
        $this->m_input->setSEORules();

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = $this->input->post();
            // update SEO
            $dataSubmit = $this->m_input->updateSEO($dataSubmit, $data['tablename'], $data['page']);
            // update table
            $this->db->update($data['tablename'], $dataSubmit, ['id' => 1]);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Updated !
                 </div>'
            );
            redirect('admin-page/page');
        }
    }



    // -----------------------------------
    //            PAGE SETTING
    // -----------------------------------
    // page setting
    public function page_setting()
    {
        $data['tablename'] = "page_setting";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => 1))->row();

        $data['rows'] = [
            [
                ["favicon", "image"],
                ["header_text", "text"],
                ["footer_text", "text"],
            ],
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set images
            $dataSubmit = $this->m_input->setImages($data['rows'], $dataSubmit);

            // update table
            $this->db->update($data['tablename'], $dataSubmit, ['id' => 1]);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                     ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Updated !
                 </div>'
            );
            redirect($this->uri->segment(1) . '/page-setting');
        }
    }

    // page status
    public function page_status()
    {
        $data['title'] = 'Page Status';
        $data['status'] = $this->db->get('page_status')->row();
        $this->m_global->getAdminView('admin/page_setting/status', $data);
    }
    public function page_status_on()
    {
        $database = $this->input->post('database');
        $id = 1;
        if ($database) {
            $dataFeatured = array(
                $database => "publish"
            );

            $this->db->update('page_status', $dataFeatured, array("id" => $id));
        }
    }
    public function page_status_off()
    {
        $database = $this->input->post('database');
        $id = 1;
        if ($database) {
            $dataFeatured = array(
                $database => "draft"
            );
            $this->db->update('page_status', $dataFeatured, array("id" => $id));
        }
    }

    // social media
    public function social_media()
    {
        $data['title'] = 'Social Media List';
        $data['tablename'] = "social_media";
        $data['pages'] = $this->m_data->getSocialMedia();
        $this->m_global->getAdminView('admin/page_setting/social_media', $data);
    }
    public function add_social_media()
    {
        $data['tablename'] = "social_media";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $data['rows'] = [
            [
                ["name", "text"],
                ["url", "url"],
                ["icon", "icon"],
            ],
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/add', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set images
            $dataSubmit = $this->m_input->setImages($data['rows'], $dataSubmit);

            $this->db->insert($data['tablename'], $dataSubmit);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                       ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Added !
                   </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']));
        }
    }
    public function edit_social_media($id)
    {
        $data['tablename'] = "social_media";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }
        $data['rows'] = [
            [
                ["name", "text"],
                ["url", "url"],
                ["icon", "icon"],
            ],
        ];
        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set images
            $dataSubmit = $this->m_input->setImages($data['rows'], $dataSubmit);

            // update table
            $this->db->update($data['tablename'], $dataSubmit, ['id' => $id]);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                       ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Updated !
                   </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']));
        }
    }
    public function delete_social_media()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'social_media', 'id');
    }
    public function sort_social_media()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'social_media');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }


    // -----------------------------------
    //            PAGE CONTENT
    // -----------------------------------
    // Home -------------------------
    public function home_banner()
    {
        $data['title'] = 'Home Banner List';
        $data['tablename'] = "home_banner";
        $data['pages'] = $this->m_data->getHomeBanner();
        $this->m_global->getAdminView('admin/page_content/home/banner', $data);
    }
    public function add_home_banner()
    {
        $data['tablename'] = "home_banner";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $data['rows'] = [
            [
                ["banner_title", "text_full"],
                ["banner_subtitle", "description"],
                ["image", "image"],
            ]
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/add', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set image
            $dataSubmit = $this->m_input->setImages($data['rows'], $dataSubmit);
            // insert to db
            $this->db->insert($data['tablename'], $dataSubmit);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                       ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Added !
                </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']));
        }
    }
    public function edit_home_banner($id = null)
    {
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "home_banner";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $data['rows'] = [
            [
                ["banner_title", "text_full"],
                ["banner_subtitle", "description"],
                ["image", "image"],
            ]
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set image
            $dataSubmit = $this->m_input->setImages($data['rows'], $dataSubmit);
            // update table
            $this->db->update($data['tablename'], $dataSubmit, ['id' => $id]);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                       ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Updated !
                </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']));
        }
    }
    public function delete_home_banner()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'home_banner', 'id');
    }
    public function sort_home_banner()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'home_banner');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }

    // Gallery -------------------------
    public function home_gallery()
    {
        $data['title'] = 'Home Gallery List';
        $data['tablename'] = "home_gallery";
        $data['pages'] = $this->m_data->getHomeGallery();
        $this->m_global->getAdminView('admin/page_content/home/gallery', $data);
    }
    public function add_home_gallery()
    {
        $data['tablename'] = "home_gallery";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $data['rows'] = [
            [
                ["image", "image"],
            ]
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/add', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set image
            $dataSubmit = $this->m_input->setImages($data['rows'], $dataSubmit);
            // insert to db
            $this->db->insert($data['tablename'], $dataSubmit);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Added !
                 </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']));
        }
    }
    public function edit_home_gallery($id = null)
    {
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "home_gallery";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $data['rows'] = [
            [
                ["image", "image"],
            ]
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set image
            $dataSubmit = $this->m_input->setImages($data['rows'], $dataSubmit);
            // update table
            $this->db->update($data['tablename'], $dataSubmit, ['id' => $id]);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Updated !
                 </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']));
        }
    }
    public function delete_home_gallery()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'home_gallery', 'id');
    }
    public function sort_home_gallery()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'home_gallery');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }

    // Quotes -------------------------
    public function home_quotes()
    {
        $data['title'] = 'Quotes List';
        $data['tablename'] = "home_quotes";
        $data['pages'] = $this->m_data->getHomeQuotes();
        $this->m_global->getAdminView('admin/page_content/home/quotes', $data);
    }
    public function add_home_quotes()
    {
        $data['tablename'] = "home_quotes";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $data['rows'] = [
            [
                ["quotes", "description"],
            ]
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/add', $data);
        } else {
            $dataSubmit = $this->input->post();
            // insert to db
            $this->db->insert($data['tablename'], $dataSubmit);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Added !
                 </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']));
        }
    }
    public function edit_home_quotes($id = null)
    {
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "home_quotes";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $data['rows'] = [
            [
                ["quotes", "description"],
            ]
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = $this->input->post();
            // update table
            $this->db->update($data['tablename'], $dataSubmit, ['id' => $id]);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                       ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Updated !
                </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']));
        }
    }
    public function delete_home_quotes()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'home_quotes', 'id');
    }
    public function sort_home_quotes()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'home_quotes');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }

    // ARTICLES
    // articles List
    public function articles_list()
    {
        $data['title'] = 'Articles List';
        $data['tablename'] = "articles";
        $data['pages'] = $this->m_data->getArticlesList();
        $this->m_global->getAdminView('admin/page_content/articles/index', $data);
    }
    public function add_articles()
    {
        $data['tablename'] = "articles";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $select = [
            (object)[
                'id' => 'DRAFT',
                'text'    => 'DRAFT'
            ],
            (object)[
                'id' => 'PUBLISH',
                'text'    => 'PUBLISH'
            ],
        ];

        $tags = $this->db->get('articles_tags')->result();
        $tags = array_map(function ($data) {
            return (object)
            [
                'id' => $data->id,
                'text' => $data->tags,
            ];
        }, $tags);

        $data['rows'] = [
            [
                ["title", "text_full"],
                ["excerpt", "textarea"],
                ["thumbnail", "image"],
                ["content", "description"],
                ["articles_tags[]", "multipleselect", $tags, "Select Menu Tags"],
                ["status", "select", $select],
            ],
        ];

        $data['seorows'] = [
            ["meta_title", "text"],
            ["meta_keywords", "text"],
            ["meta_description", "textarea"],
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);
        // seo rules
        $this->m_input->setSEORules();

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/add', $data);
        } else {
            $dataSubmit = $this->input->post();
            $dataSubmit['date'] = date('Y-m-d');
            // set images
            $dataSubmit = $this->m_input->setImages($data['rows'], $dataSubmit);
            // get slug
            $dataSubmit['slug'] = $this->m_input->getUniqueSlug($dataSubmit['title'], $data['tablename']);
            // get data SEO from input
            $dataSEO = [
                "meta_title" => $dataSubmit['meta_title'],
                "meta_description" => $dataSubmit['meta_description'],
                "meta_keywords" => $dataSubmit['meta_keywords'],
            ];
            // unset SEO data from array, because it'll store to different table
            unset($dataSubmit['meta_title']);
            unset($dataSubmit['meta_description']);
            unset($dataSubmit['meta_keywords']);
            // unset articles tags
            $articles_tags = $dataSubmit['articles_tags'];
            unset($dataSubmit['articles_tags']);

            // insert articles first, then insert SEO
            $this->db->insert($data['tablename'], $dataSubmit);

            // get newest id articles
            $id_articles = $this->m_data->getNewestIdArticles();

            // insert articles tags
            foreach ($articles_tags as $nt) {
                $this->db->insert('articles_tags_list', [
                    'id_articles' => $id_articles,
                    'id_tags' => $nt
                ]);
            }

            $seo = $this->m_data->getSEO($data['tablename'], $id_articles);
            // check if seo is available
            if (isset($seo)) {
                // if available, then update
                $this->db->update('page_seo', $dataSEO, ['id' => $id_articles]);
            } else {
                // if not, then add new
                $dataIdTableSEO = [
                    "nama_table" => $data['tablename'],
                    "id_table" => $id_articles
                ];
                $dataSEO = array_merge($dataSEO, $dataIdTableSEO);
                $this->db->insert('page_seo', $dataSEO);
            }
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                             <button category="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                             ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Added !
                         </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']) . '-list');
        }
    }
    public function edit_articles($id)
    {
        $data['tablename'] = "articles";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();
        $data['page'] = $this->m_data->showDataSEO($data['tablename'], $data['page']);

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $select = [
            (object)[
                'id' => 'draft',
                'text'    => 'DRAFT'
            ],
            (object)[
                'id' => 'publish',
                'text'    => 'PUBLISH'
            ],
        ];

        $tags = $this->db->get('articles_tags')->result();
        $tags = array_map(function ($data) {
            return (object)
            [
                'id' => $data->id,
                'text' => $data->tags,
            ];
        }, $tags);

        $articlesTagList = $this->m_data->getArticlesTagsListID($id);
        $id_tags = [];
        $x = 0;
        foreach ($articlesTagList as $ntl) {
            $id_tags[$x] = $ntl->id;
            $x++;
        }

        $data['rows'] = [
            [
                ["title", "text_full"],
                ["excerpt", "textarea"],
                ["thumbnail", "image"],
                ["content", "description"],
                ["articles_tags[]", "multipleselect", $tags, "Select Menu Tags", $id_tags],
                ["status", "select", $select],
            ],
        ];

        $data['seorows'] = [
            ["meta_title", "text"],
            ["meta_keywords", "text"],
            ["meta_description", "textarea"],
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);
        // seo rules
        $this->m_input->setSEORules();

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set images
            $dataSubmit = $this->m_input->setImages($data['rows'], $dataSubmit);

            if ($dataSubmit['title'] !== $data['page']->title) {
                // get slug
                $dataSubmit['slug'] = $this->m_input->getUniqueSlug($dataSubmit['title'], $data['tablename']);
            }
            // update articles Tags
            $dataSubmit = $this->m_input->updateArticlesTags($dataSubmit, $id);
            // update SEO
            $dataSubmit = $this->m_input->updateSEO($dataSubmit, $data['tablename'], $data['page']);
            // update table
            $this->db->update($data['tablename'], $dataSubmit, ['id' => $id]);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                             <button category="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                             ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Updated !
                         </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']) . '-list');
        }
    }
    public function delete_articles_list()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'articles', 'id');
    }
    public function sort_articles_list()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'articles');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }

    // articles tags
    public function articles_tags()
    {
        $data['title'] = 'Articles Tags';
        $data['tablename'] = "articles_tags";
        $data['pages'] = $this->m_data->getArticlesTags();
        $this->m_global->getAdminView('admin/page_content/articles/tags', $data);
    }
    public function add_articles_tags()
    {
        $data['tablename'] = "articles_tags";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $data['rows'] = [
            [
                ["tags", "text"],
            ],
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/add', $data);
        } else {
            $dataSubmit = $this->input->post();
            // insert to db
            $this->db->insert($data['tablename'], $dataSubmit);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Added !
                </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']));
        }
    }
    public function edit_articles_tags($id = null)
    {
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }
        $data['tablename'] = "articles_tags";
        $data['title'] = 'Edit ' . ucfirst(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $data['rows'] = [
            [
                ["tags", "text"],
            ],
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = $this->input->post();
            // update table
            $this->db->update($data['tablename'], $dataSubmit, ['id' => $id]);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                     ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Updated !
                 </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']));
        }
    }
    public function delete_articles_tags()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'articles_tags_list', 'id_tags');
        $this->m_global->deleteTable($this->input->post('ids'), 'articles_tags', 'id');
    }
    public function sort_articles_tags()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'articles_tags');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }
}
