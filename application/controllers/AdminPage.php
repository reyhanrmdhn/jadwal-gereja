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

    // Portfolio -------------------------
    public function portfolio()
    {
        $data['title'] = 'Portfolio List';
        $data['tablename'] = "portfolio";
        $data['pages'] = $this->m_data->getPortfolio();
        $this->m_global->getAdminView('admin/page_content/portfolio/index', $data);
    }
    public function add_portfolio()
    {
        $data['tablename'] = "portfolio";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $data['rows'] = [
            [
                ["title", "text"],
            ]
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/add', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set unique slug
            $dataSubmit['slug'] = $this->m_input->getUniqueSlug($dataSubmit['title'], $data['tablename']);
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
    public function edit_portfolio($id = null)
    {
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "portfolio";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $data['rows'] = [
            [
                ["title", "text"],
            ]
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/edit', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set unique slug
            $dataSubmit['slug'] = $this->m_input->getUniqueSlug($dataSubmit['title'], $data['tablename']);
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
    public function delete_portfolio()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'portfolio', 'id');
        $this->m_global->deleteTable($this->input->post('ids'), 'portfolio_detail', 'id_portfolio');
        $this->m_global->deleteTable($this->input->post('ids'), 'portfolio_image', 'id_portfolio');
    }
    public function sort_portfolio()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'portfolio');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }

    // Portfolio Detail List -------------------------
    public function portfolio_detail($id_portfolio = null)
    {
        if (empty($id_portfolio)) {
            redirect('error-404', 'refresh');
        }

        $data['id_portfolio'] = $id_portfolio;
        $portfolio = $this->db->get_where('portfolio', ['id' => $id_portfolio])->row();
        $data['title'] = 'Portfolio Detail List - ' . $portfolio->title;
        $data['tablename'] = "portfolio_detail";
        $data['pages'] = $this->db->order_by('sort_order asc')->get_where($data['tablename'], array("id_portfolio" => $id_portfolio))->result();
        $this->m_global->getAdminView('admin/page_content/portfolio/detail', $data);
    }
    public function add_portfolio_detail($id_portfolio = null)
    {
        if (empty($id_portfolio)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "portfolio_detail";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $data['rows'] = [
            [
                ["title", "text"],
                ["description", "description_2"],
            ]
        ];

        // form rules
        $this->m_input->setFormRules($data['rows']);

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/crud_global/add', $data);
        } else {
            $dataSubmit = $this->input->post();
            // set id
            $dataSubmit['id_portfolio'] = $id_portfolio;
            // set unique slug
            $dataSubmit['slug'] = $this->m_input->getUniqueSlug($dataSubmit['title'], $data['tablename']);
            // insert to db
            $this->db->insert($data['tablename'], $dataSubmit);
            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        ' . ucwords(str_replace("_", " ", $data['tablename'])) . ' Added !
                 </div>'
            );
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']) . '/' . $id_portfolio);
        }
    }
    public function edit_portfolio_detail($id_portfolio = null, $id = null)
    {
        if (empty($id_portfolio)) {
            redirect('error-404', 'refresh');
        }
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "portfolio_detail";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();
        $data['id_portfolio'] = $id_portfolio;

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $data['rows'] = [
            [
                ["title", "text"],
                ["description", "description_2"],
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
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']) . '/' . $id_portfolio);
        }
    }
    public function delete_portfolio_detail()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'portfolio_detail', 'id');
    }
    public function sort_portfolio_detail()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'portfolio_detail');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }


    // Portfolio Image List -------------------------
    public function portfolio_image($id_portfolio = null, $id = null)
    {
        if (empty($id_portfolio)) {
            redirect('error-404', 'refresh');
        }
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['id_portfolio'] = $id_portfolio;
        $data['id'] = $id;
        $portfolio_detail = $this->db->get_where('portfolio_detail', ['id' => $id])->row();
        $data['title'] = 'Portfolio Image List - ' . $portfolio_detail->title;
        $data['tablename'] = "portfolio_image";
        $data['pages'] = $this->db->get_where($data['tablename'], array("id_portfolio" => $id_portfolio, "id_portfolio_detail" => $id))->result();
        $this->m_global->getAdminView('admin/page_content/portfolio/image', $data);
    }
    public function add_portfolio_image($id_portfolio = null, $id = null)
    {
        if (empty($id_portfolio)) {
            redirect('error-404', 'refresh');
        }
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "portfolio_image";
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
            // set id
            $dataSubmit['id_portfolio'] = $id_portfolio;
            $dataSubmit['id_portfolio_detail'] = $id;
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
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']) . '/' . $id_portfolio . '/' . $id);
        }
    }
    public function edit_portfolio_image($id_portfolio = null, $id_portfolio_detail = null, $id = null)
    {
        if (empty($id_portfolio)) {
            redirect('error-404', 'refresh');
        }
        if (empty($id_portfolio_detail)) {
            redirect('error-404', 'refresh');
        }
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "portfolio_image";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();
        $data['id_portfolio'] = $id_portfolio;
        $data['id_portfolio_detail'] = $id_portfolio_detail;

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
            // set id
            $dataSubmit['id_portfolio'] = $id_portfolio;
            $dataSubmit['id_portfolio_detail'] = $id_portfolio_detail;
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
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']) . '/' . $id_portfolio . '/' . $id_portfolio_detail);
        }
    }
    public function delete_portfolio_image()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'portfolio_image', 'id');
    }
    public function sort_portfolio_image()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'portfolio_image');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }


    // Publication -------------------------
    public function publication()
    {
        $data['title'] = 'Publication List';
        $data['tablename'] = "publication";
        $data['pages'] = $this->m_data->getPublication();
        $this->m_global->getAdminView('admin/page_content/publication/index', $data);
    }
    public function add_publication()
    {
        $data['tablename'] = "publication";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $data['rows'] = [
            [
                ["image", "image"],
                ["url", "url"],
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
    public function edit_publication($id = null)
    {
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "publication";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $data['rows'] = [
            [
                ["image", "image"],
                ["url", "url"],
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
    public function delete_publication()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'publication', 'id');
    }
    public function sort_publication()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'publication');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }


    // bio -------------------------
    public function bio()
    {
        $data['title'] = 'Bio List';
        $data['tablename'] = "bio";
        $data['pages'] = $this->m_data->getBio();
        $this->m_global->getAdminView('admin/page_content/bio/index', $data);
    }
    public function add_bio()
    {
        $data['tablename'] = "bio";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $data['rows'] = [
            [
                ["title", "text"],
                ["description", "description"],
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
    public function edit_bio($id = null)
    {
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "bio";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $data['rows'] = [
            [
                ["title", "text"],
                ["description", "description"],
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
    public function delete_bio()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'bio', 'id');
    }
    public function sort_bio()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'bio');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }

    // profile
    public function profile()
    {
        $data['title'] = 'Profile';
        $data['admin'] = $this->m_data->getUserByID($this->session->userdata('id'));

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
        $this->form_validation->set_rules('passwordconfirmation', 'Password Confirmation', 'min_length[5]|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->m_global->getAdminView('admin/profile', $data);
        } else {
            if ($this->input->post('password') === "") {
                $dataSubmit = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'image' => $this->input->post('image')
                );
            } else {
                $dataSubmit = array(
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'image' => $this->input->post('image')
                );
            }

            $this->db->update('admin_account', $dataSubmit, array('id' => $this->session->userdata('id')));

            $data_sess = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => $this->input->post('image')
            );

            $this->session->set_userdata($data_sess);

            $this->session->set_flashdata(
                'success',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                       Updated !
                   </div>'
            );

            redirect('admin-page/profile');
        }
    }
}
