<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Input_model extends CI_Model
{
    public function setFormRules($rows)
    {
        for ($i = 0; $i < count($rows); $i++) {
            for ($j = 0; $j < count($rows[$i]); $j++) {
                if ($rows[$i][$j][1] == 'textarea') {
                    $rules = 'required';
                } else if ($rows[$i][$j][1] == 'image') {
                    $rules = 'required';
                } else if ($rows[$i][$j][1] == 'documents') {
                    $rules = '';
                } else if ($rows[$i][$j][1] == 'text') {
                    $rules = 'required|max_length[128]';
                } else if ($rows[$i][$j][1] == 'text_2') {
                    $rules = '';
                } else if ($rows[$i][$j][1] == 'email') {
                    $rules = 'required|max_length[128]|is_unique[admin_account.email]';
                } else if ($rows[$i][$j][1] == 'edit_email') {
                    $rules = 'required|max_length[128]|valid_email';
                } else if ($rows[$i][$j][1] == 'password') {
                    $rules = 'required|min_length[8]';
                } else if ($rows[$i][$j][1] == 'password_confirm') {
                    $rules = 'required|min_length[8]|matches[password]';
                } else if ($rows[$i][$j][1] == 'url') {
                    $rules = 'required|valid_url';
                } else if ($rows[$i][$j][1] == 'program_type') {
                    $rules = 'required|is_unique[programs_schedule_type.type]';
                } else {
                    $rules = 'required';
                }
                $this->form_validation->set_rules(
                    $rows[$i][$j][0],
                    ucwords(str_replace("_", " ", $rows[$i][$j][0])),
                    $rules,
                    array(
                        'is_unique'     => 'This %s is already exists.'
                    )
                );
            }
        }
    }

    public function setSEORules()
    {
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
        $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'max_length[255]');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
    }

    public function getUniqueSlug($title, $tablename)
    {
        // UNIQUE SLUG ADD
        $count = 0;
        $slugName =  mb_strtolower(url_title(convert_accented_characters($title)));
        while (true) {
            $this->db->where('slug', $slugName);   // Test temp name
            $query = $this->db->get($tablename);
            if ($query->num_rows() == 0) break;
            $slugName =  mb_strtolower(url_title(convert_accented_characters($title))) . '-' . (++$count);  // Recreate new temp name
        };
        return $slugName;
    }

    public function updateSEO($dataSubmit, $tablename, $page)
    {
        if (!$page->id_seo) {
            $page->id_table = $page->id;
        }
        $dataSEO = [
            "meta_title" => $dataSubmit['meta_title'],
            "meta_description" => $dataSubmit['meta_description'],
            "meta_keywords" => $dataSubmit['meta_keywords'],
            "nama_table" => $tablename,
            "id_table" => $page->id_table,
        ];

        // unset SEO data from array, because it'll store to different table
        unset($dataSubmit['meta_title']);
        unset($dataSubmit['meta_description']);
        unset($dataSubmit['meta_keywords']);

        $seo = $this->m_data->getSEO($tablename, $page->id_table);
        // check if seo is available
        if (isset($seo)) {
            // if available, then update
            $this->db->update('page_seo', $dataSEO, ['id' => $page->id_seo]);
        } else {
            // if not, then add new
            $this->db->insert('page_seo', $dataSEO);
        }
        return $dataSubmit;
    }

    public function updateArticlesTags($dataSubmit, $id)
    {
        $this->db->delete('articles_tags_list', ['id_articles' => $id]);

        $articles_tag = $dataSubmit['articles_tags'];
        foreach ($articles_tag as $nt) {
            $this->db->insert('articles_tags_list', [
                'id_articles' => $id,
                'id_tags' => $nt
            ]);
        }

        // unset articles Tags data from array, because it'll store to different table
        unset($dataSubmit['articles_tags']);
        return $dataSubmit;
    }

    public function updateConfigFile($config, $dataSubmit)
    {
        $config_path = APPPATH . 'config/email.php';
        $config_data = file_get_contents($config_path);
        $config_data = str_replace("'smtp_host' => '" . $config['smtp_host'] . "'", "'smtp_host' => '" . $dataSubmit['smtp_host'] . "'", $config_data);
        $config_data = str_replace("'smtp_port' => " . $config['smtp_port'] . "", "'smtp_port' => " . $dataSubmit['smtp_port'] . "", $config_data);
        $config_data = str_replace("'smtp_user' => '" . $config['smtp_user'] . "'", "'smtp_user' => '" . $dataSubmit['smtp_user'] . "'", $config_data);
        $config_data = str_replace("'smtp_pass' => '" . $config['smtp_pass'] . "'", "'smtp_pass' => '" . $dataSubmit['smtp_pass'] . "'", $config_data);
        $config_data = str_replace("'email_recipient' => '" . $config['email_recipient'] . "'", "'email_recipient' => '" . $dataSubmit['email_recipient'] . "'", $config_data);
        file_put_contents($config_path, $config_data);
    }

    // set image only folder and file name
    public function setImages($rows, $dataSubmit)
    {
        for ($i = 0; $i < count($rows); $i++) {
            for ($j = 0; $j < count($rows[$i]); $j++) {
                if ($rows[$i][$j][1] == 'image') {
                    if (strpos($dataSubmit[$rows[$i][$j][0]], base_url()) !== FALSE) {
                        $image = explode(base_url(), $dataSubmit[$rows[$i][$j][0]]);
                        $dataSubmit[$rows[$i][$j][0]] = $image[1];
                    }
                }
            }
        }
        return $dataSubmit;
    }

    public function setDocuments($rows, $dataSubmit)
    {
        for ($i = 0; $i < count($rows); $i++) {
            for ($j = 0; $j < count($rows[$i]); $j++) {
                if ($rows[$i][$j][1] == 'documents') {
                    if (strpos($dataSubmit[$rows[$i][$j][0]], base_url()) !== FALSE) {
                        $documents = explode(base_url(), $dataSubmit[$rows[$i][$j][0]]);
                        $dataSubmit[$rows[$i][$j][0]] = $documents[1];
                    }
                }
            }
        }
        return $dataSubmit;
    }

}
