<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Global_model extends CI_Model
{
    public function getView($content, $data)
    {
        $this->load->view('partial/header', $data);
        $this->load->view('partial/topbar');
        $this->load->view($content);
        $this->load->view('partial/footer');
    }

    public function getAdminView($content, $data)
    {
        $this->load->view('partial/admin/header', $data);
        $this->load->view($content);
        $this->load->view('partial/admin/footer');
    }

    public function updateDataPosition($id, $sort_order, $table)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, array('sort_order' => $sort_order));
    }

    public function updateLevelOrder($id, $sort_order, $table)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, array('level_order' => $sort_order));
    }

    public function deleteTable($ids, $table, $row)
    {
        // disable foreign key checks to delete data from table with foreign key
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');
        for ($i = 0; $i < count($ids); $i++) {
            // Check if data exists
            $this->db->where($row, intval($ids[$i]));
            $count = $this->db->count_all_results($table);

            if ($count > 0) {
                // Delete data
                $this->db->where($row, intval($ids[$i]));
                $this->db->delete($table);
            }
        }
        // don't forget to enable foregin key checks
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    // pagination
    public function get_items($table, $join, $join_cond, $order_by, $limit, $offset)
    {
        if ($table == 'news' || $table == 'products') {
            $this->db->where('status', 'PUBLISH');
        }
        if ($join) {
            $this->db->join($join, $join_cond);
        }
        $this->db->limit($limit, $offset);
        if ($order_by) {
            $this->db->order_by($order_by);
        }
        $query = $this->db->get($table);
        return $query->result();
    }
    public function getPaginationConfig($table, $link, $ContentPerPage)
    {
        //pagination settings
        $config['base_url'] = site_url($link . '/page');
        $config['total_rows'] = $this->db->count_all($table);
        $config['per_page'] = intval($ContentPerPage);
        $config['uri_segment'] = 3;
        // $choice = $config["total_rows"] / $config["per_page"];
        if ($this->m_global->userAgent() == 'mobile') {
            $config["num_links"] = 1;
        } else {
            $config["num_links"] = 2;
        }
        $config['use_page_numbers'] = TRUE;

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<div class="pagination-block"><ul>';
        $config['full_tag_close'] = '</ul></div>';

        $config['first_tag_open'] = '';
        $config['first_link'] = '';
        $config['first_tag_close'] = '';

        $config['prev_link'] = '<i class="ti ti-arrow-left"></i>';
        $config['prev_tag_open'] = '<li class="next page-numbers">';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = '<i class="ti ti-arrow-right"></i>';
        $config['next_tag_open'] = '<li class="prev page-numbers">';
        $config['next_tag_close'] = '</li>';

        $config['last_link'] = '';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';

        $config['cur_tag_open'] = '<li class="num-pagination"><span aria-current="page" class="page-numbers current">';
        $config['cur_tag_close'] = '</span></li>';

        $config['num_tag_open'] = '<li class="page-item num-pagination page-numbers">';
        $config['num_tag_close'] = '</li>';

        $config['first_url'] = site_url($link . '/page/1');

        return $config;
    }

    public function userAgent()
    {
        $isMobile = false;

        //List of known mobile user agent strings
        $mobileUserAgents = array(
            'Mobile',
            'Android',
            'iPhone',
            'iPad',
            'iPod',
            'BlackBerry',
            'Windows Phone'
        );

        //Get user agent string
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        //Check if user agent string matches any of the known mobile user agent strings
        foreach ($mobileUserAgents as $mobileUserAgent) {
            if (strpos($userAgent, $mobileUserAgent) !== false) {
                $isMobile = true;
                break;
            }
        }

        if ($isMobile) {
            $output =  'mobile';
        } else {
            $output =  'desktop';
        }

        return $output;
    }
}
