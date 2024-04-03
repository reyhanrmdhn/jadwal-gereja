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
        $this->m_global->getAdminView('admin/dashboard', $data);
    }
    // users
    public function users()
    {
        $data['title'] = 'Manajemen Majelis';
        $data['tablename'] = "majelis";
        $data['pages'] = $this->m_data->getUsers();
        $this->m_global->getAdminView('admin/users', $data);
    }
    public function add_majelis()
    {
        $data['tablename'] = "majelis";
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
    public function edit_majelis($id)
    {
        $data['tablename'] = "majelis";
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
        $data['tablename'] = "majelis";
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
        $this->m_global->deleteTable($this->input->post('ids'), 'majelis', 'id');
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


    // JADWAL GEREJA
    // KATEGORI PELAYAN -------------------------
    // Quotes -------------------------
    public function pelayan_category()
    {
        $data['title'] = 'List Kategori Pelayan';
        $data['tablename'] = "pelayan_category";
        $data['pages'] = $this->m_data->getPelayanCategory();
        $this->m_global->getAdminView('admin/page_content/jadwal/category_pelayan', $data);
    }
    public function add_pelayan_category()
    {
        $data['tablename'] = "pelayan_category";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $data['rows'] = [
            [
                ["category", "text"],
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
    public function edit_pelayan_category($id = null)
    {
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "pelayan_category";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $data['rows'] = [
            [
                ["category", "text"],
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
    public function delete_pelayan_category()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'pelayan_category', 'id');
        $this->m_global->deleteTable($this->input->post('ids'), 'pelayan', 'id_pelayan_category');
    }
    public function sort_pelayan_category()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'pelayan_category');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }

    // LIST PELAYAN -------------------------
    public function pelayan_list()
    {
        $data['title'] = 'List Pelayan';
        $data['tablename'] = "pelayan";
        $data['pages'] = $this->m_data->getPelayanJoin();
        $this->m_global->getAdminView('admin/page_content/jadwal/pelayan', $data);
    }
    public function add_pelayan()
    {
        $data['tablename'] = "pelayan";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $status = [
            (object)[
                'id' => 'Kaum Ayah',
                'text'    => 'Kaum Ayah'
            ],
            (object)[
                'id' => 'Kaum Ibu',
                'text'    => 'Kaum Ibu'
            ],
            (object)[
                'id' => 'Pemuda/i',
                'text'    => 'Pemuda/i'
            ],
            (object)[
                'id' => 'Anak-anak',
                'text'    => 'Anak-anak'
            ],
        ];

        $jk = [
            (object)[
                'id' => 'Laki-laki',
                'text'    => 'Laki-laki'
            ],
            (object)[
                'id' => 'Perempuan',
                'text'    => 'Perempuan'
            ],
        ];


        $category = $this->db->get('pelayan_category')->result();
        $category = array_map(function ($data) {
            return (object)
            [
                'id' => $data->id,
                'text' => $data->category,
            ];
        }, $category);

        $data['rows'] = [
            [
                ["nama", "text"],
                ["id_pelayan_category", "select", $category],
                ["status", "select", $status],
                ["jenis_kelamin", "select", $jk],
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
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']) . '-list');
        }
    }
    public function edit_pelayan($id = null)
    {
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "pelayan";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $status = [
            (object)[
                'id' => 'Kaum Ayah',
                'text'    => 'Kaum Ayah'
            ],
            (object)[
                'id' => 'Kaum Ibu',
                'text'    => 'Kaum Ibu'
            ],
            (object)[
                'id' => 'Pemuda/i',
                'text'    => 'Pemuda/i'
            ],
            (object)[
                'id' => 'Anak-anak',
                'text'    => 'Anak-anak'
            ],
        ];

        $jk = [
            (object)[
                'id' => 'Laki-laki',
                'text'    => 'Laki-laki'
            ],
            (object)[
                'id' => 'Perempuan',
                'text'    => 'Perempuan'
            ],
        ];


        $category = $this->db->get('pelayan_category')->result();
        $category = array_map(function ($data) {
            return (object)
            [
                'id' => $data->id,
                'text' => $data->category,
            ];
        }, $category);

        $data['rows'] = [
            [
                ["nama", "text"],
                ["id_pelayan_category", "select", $category],
                ["status", "select", $status],
                ["jenis_kelamin", "select", $jk],
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
            redirect('admin-page/' . str_replace("_", "-", $data['tablename']) . '-list');
        }
    }
    public function delete_pelayan_list()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'pelayan', 'id');
    }
    public function sort_pelayan_list()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'pelayan');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }

    // JADWAL -------------------------
    public function jadwal()
    {
        $data['title'] = 'Jadwal Ibadah';
        $data['tablename'] = "jadwal";
        $data['pages'] = $this->m_data->getJadwal();
        $this->m_global->getAdminView('admin/page_content/jadwal/index', $data);
    }
    public function jadwal_rules()
    {
        $data['title'] = 'Rules Jadwal Ibadah';
        $data['tablename'] = "jadwal_rules";
        $data['pages'] = $this->m_data->getJadwalRules();
        $this->m_global->getAdminView('admin/page_content/jadwal/rules', $data);
    }
    public function add_jadwal_rules()
    {
        $data['tablename'] = "jadwal_rules";
        $data['title'] = 'Add ' . ucwords(str_replace("_", " ", $data['tablename']));

        $hari = [
            (object)[
                'id' => 'Monday',
                'text'    => 'Senin'
            ],
            (object)[
                'id' => 'Tuesday',
                'text'    => 'Selasa'
            ],
            (object)[
                'id' => 'Wednesday',
                'text'    => 'Rabu'
            ],
            (object)[
                'id' => 'Thursday',
                'text'    => 'Kamis'
            ],
            (object)[
                'id' => 'Friday',
                'text'    => 'Jumat'
            ],
            (object)[
                'id' => 'Saturday',
                'text'    => 'Sabtu'
            ],
            (object)[
                'id' => 'Sunday',
                'text'    => 'Minggu'
            ],
        ];


        $data['rows'] = [
            [
                ["nama_kegiatan", "text"],
                ["hari", "select", $hari],
                ["jam_mulai", "time"],
                ["jam_selesai", "time"],
                ["deskripsi", "description"],
                ["pelayan", "select_pelayan"],
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
    public function edit_jadwal_rules($id = null)
    {
        if (empty($id)) {
            redirect('error-404', 'refresh');
        }

        $data['tablename'] = "jadwal_rules";
        $data['title'] = 'Edit ' . ucwords(str_replace("_", " ", $data['tablename']));
        $data['page'] = $this->db->get_where($data['tablename'], array("id" => $id))->row();

        if (empty($data['page'])) {
            redirect('error-404', 'refresh');
        }

        $hari = [
            (object)[
                'id' => 'Monday',
                'text'    => 'Senin'
            ],
            (object)[
                'id' => 'Tuesday',
                'text'    => 'Selasa'
            ],
            (object)[
                'id' => 'Wednesday',
                'text'    => 'Rabu'
            ],
            (object)[
                'id' => 'Thursday',
                'text'    => 'Kamis'
            ],
            (object)[
                'id' => 'Friday',
                'text'    => 'Jumat'
            ],
            (object)[
                'id' => 'Saturday',
                'text'    => 'Sabtu'
            ],
            (object)[
                'id' => 'Sunday',
                'text'    => 'Minggu'
            ],
        ];


        $data['rows'] = [
            [
                ["nama_kegiatan", "text"],
                ["hari", "select", $hari],
                ["jam_mulai", "time"],
                ["jam_selesai", "time"],
                ["deskripsi", "description"],
                ["pelayan", "select_pelayan"],
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
    public function delete_jadwal_rules()
    {
        $this->m_global->deleteTable($this->input->post('ids'), 'jadwal_rules', 'id');
    }
    public function sort_jadwal_rules()
    {
        if ($this->input->post('sortOrder')) {
            $orders = $this->input->post('sortOrder');
            $totalOrders = count($orders);
            for ($i = 0; $i < $totalOrders; $i++) {
                $this->m_global->updateDataPosition($orders[$i], $i + 1, 'jadwal_rules');
            };
        } else {
            $this->session->set_flashdata('error', 'No direct script access allowed.');
            redirect('admin-page');
        }
    }

    public function generateJadwal()
    {
        // Input data
        $month = date('n'); // Current month
        $year = date('Y'); // Current year

        $jadwal_hari = $this->m_data->getDayCount();
        $days = array();
        foreach ($jadwal_hari as $day) {
            $days[$day['hari']] = $day['count'];
        }

        $jadwal_rules = $this->m_data->getJadwalRules();
        $services = array();
        foreach ($jadwal_rules as $rules) {
            $group_hari = $this->db->get_where('jadwal_rules', ['hari' => $rules->hari])->result();
            for ($i = 0; $i < count($group_hari); $i++) {
                $dataPelayan = json_decode($group_hari[$i]->pelayan, true);
                foreach ($dataPelayan as $item) {
                    if ($item['jumlah'] > 0) {
                        $services[$rules->hari][$i][$item['pelayan']] = $item['jumlah'];
                    }
                }
            }
        }

        $pelayan = $this->db->get('pelayan_category')->result();
        $participants = array();
        foreach ($pelayan as $p) {
            $pelayanGroup = $this->db->get_where('pelayan', ['id_pelayan_category' => $p->id])->result();
            foreach ($pelayanGroup as $pg) {
                $participants[$p->category][] = $pg->nama;
            }
        }

        // Generate Schedule
        $jadwal = generateFullMonthSchedule($services, $days, $participants, $month, $year);
        $this->db->truncate('jadwal');

        for ($i = 0; $i < count($jadwal); $i++) :
            $kegiatan = $this->db->order_by('id asc')->get_where('jadwal_rules', ['hari' => $jadwal[$i]['dayOfWeek']])->result();
            $data = [
                'nama_kegiatan' => (count($kegiatan) > 1 ? $kegiatan[$jadwal[$i]['serviceIndex']]->nama_kegiatan : $kegiatan[0]->nama_kegiatan),
                'hari' => $jadwal[$i]['dayOfWeek'],
                'tanggal' =>  date('Y') . '-' . date('m') . '-' . $jadwal[$i]['dayOfMonth'],
                'pelayan' => json_encode($jadwal[$i]['roles']),
            ];
            $this->db->insert('jadwal', $data);
        endfor;

        $this->session->set_flashdata(
            'success',
            '<div class="alert alert-success alert-message alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    Jadwal Generated Successfully!
             </div>'
        );
        redirect('admin-page/jadwal');
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

            $this->db->update('majelis', $dataSubmit, array('id' => $this->session->userdata('id')));

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
