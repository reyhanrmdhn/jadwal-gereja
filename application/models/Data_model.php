<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Data_model extends CI_Model
{

    // -----------------------------------
    //                USERS
    // -----------------------------------
    public function getUsers()
    {
        $this->db->select('*');
        $this->db->from('admin_account');
        $this->db->order_by('date_created desc');
        $data = $this->db->get()->result();
        return $data;
    }
    public function getUserByID($id)
    {
        $this->db->select('*');
        $this->db->from('admin_account');
        $this->db->where('id', $id);
        $data = $this->db->get()->row();
        return $data;
    }


    // -----------------------------------
    //           PAGE SETTING
    // -----------------------------------
    public function getAdminEmail()
    {
        $this->db->select('*');
        $this->db->from('admin_email');
        $this->db->order_by('id desc');
        $data = $this->db->get()->result();
        return $data;
    }
    public function getAdminEmailCombine()
    {
        $this->db->select('email');
        $recipient = $this->db->get('admin_email')->result_array();
        $emailString = '';
        if ($recipient) {
            foreach ($recipient as $row) {
                $emailString .= $row['email'] . ', ';
            }
            // Remove the trailing comma and space
            $emailString = rtrim($emailString, ', ');
        }

        return $emailString;
    }

    // -----------------------------------
    //            PAGE SEO
    // -----------------------------------
    public function getSEO($table_name, $table_id)
    {
        $this->db->select('*, id as id_seo');
        $this->db->from('page_seo');
        $this->db->where(['nama_table' => $table_name, 'id_table' => $table_id]);
        $data = $this->db->get()->row();
        return $data;
    }
    public function showDataSEO($tablename, $page)
    {
        $seo = $this->m_data->getSEO($tablename, $page->id);
        if (!isset($seo)) {
            $seo = [
                "meta_title" => "",
                "meta_description" => "",
                "meta_keywords" => ""
            ];
        }
        $seo = (object) $seo;
        $page = (object) array_merge(
            (array) $page,
            (array) $seo
        );
        return $page;
    }

    public function getSocialMedia()
    {
        $this->db->select('*');
        $this->db->from('social_media');
        $this->db->order_by('sort_order asc');
        $data = $this->db->get()->result();
        return $data;
    }
    public function getFooterMenu()
    {
        $this->db->select('*');
        $this->db->from('footer_menu');
        $this->db->order_by('sort_order asc');
        $data = $this->db->get()->result();
        return $data;
    }
    public function getFooterMenuByID($id)
    {
        $this->db->select('*');
        $this->db->from('footer_menu');
        $this->db->where('id', $id);
        $data = $this->db->get()->result();
        return $data;
    }
    public function getFooterMenuList($id)
    {
        $this->db->select('*');
        $this->db->from('footer_menu_list');
        $this->db->where('id_footer_menu', $id);
        $this->db->order_by('sort_order asc');
        $data = $this->db->get()->result();
        return $data;
    }

    // -----------------------------------
    //           PAGE CONTENT
    // -----------------------------------
    // Home -------------------------
    public function getHomeBanner()
    {
        $this->db->select('*');
        $this->db->from('home_banner');
        $this->db->order_by('sort_order asc');
        $data = $this->db->get()->result();
        return $data;
    }
    public function getHomeGallery()
    {
        $this->db->select('*');
        $this->db->from('home_gallery');
        $this->db->order_by('sort_order asc');
        $data = $this->db->get()->result();
        return $data;
    }
    public function getHomeQuotes()
    {
        $this->db->select('*');
        $this->db->from('home_quotes');
        $this->db->order_by('sort_order asc');
        $data = $this->db->get()->result();
        return $data;
    }

    // PELAYAN -------------------------
    public function getPelayanCategory()
    {
        $this->db->select('*');
        $this->db->from('pelayan_category');
        $this->db->order_by('sort_order');
        $data = $this->db->get()->result();
        return $data;
    }
    public function getPelayanJoin($id = null)
    {
        $this->db->select('*, pelayan.id as id, pelayan_category.id as id_pelayan_category');
        $this->db->from('pelayan');
        $this->db->join('pelayan_category','pelayan_category.id = pelayan.id_pelayan_category');
        if ($id) {
            $this->db->where('pelayan.id',$id);
            $data = $this->db->get()->row();
        } else {
            $data = $this->db->get()->result();
        }
        return $data;
    }
    public function getJadwalRules()
    {
        $this->db->select('*');
        $this->db->from('jadwal_rules');
        $data = $this->db->get()->result();
        return $data;
    }
    public function getDayCount() {
        $query = $this->db->select('hari, COUNT(hari) as count')
                          ->from('jadwal_rules')
                          ->group_by('hari')
                          ->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function getJadwal()
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $data = $this->db->get()->result();
        return $data;
    }
    public function getJadwalThisMonth($month)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->where("MONTH(tanggal) = $month");
        $data = $this->db->get()->result();
        return $data;
    }


}
