<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articles extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->input->get()) {
            $this->_searchArticles($this->input->get());
        } else {
            $data = $this->_headData('articles');

            // initialize pagination
            $config = $this->m_global->getPaginationConfig('articles', $this->uri->segment(1), 6);
            $this->pagination->initialize($config);

            $page = $this->uri->segment(3, 1);
            $data['articles'] = $this->m_global->get_items('articles','sort_order asc', $config['per_page'], ($page - 1) * $config['per_page']);
            $data['articles_tags'] = $this->m_data->getArticlesTags();
            $data['pagination'] = $this->pagination->create_links();
            $data['num_page'] = ceil($config["total_rows"] / $config["per_page"]);

            $this->m_global->getView('page/articles/index', $data);
        }
    }

    private function _searchArticles($query)
    {
        $data = $this->_headData('articles');
        if (isset($query['search'])) {
            $data['query'] = $query['search'];
            $data['articles'] = $this->m_data->getSearchedarticles($data['query']);
        }else if (isset($query['tags'])) {
            $data['tags'] = $query['tags'];
            $data['articles'] = $this->m_data->getArticlesByTagsName($data['tags']);
        } else {
            redirect('error-404', 'refresh');
        }

        $data['articles_tags'] = $this->m_data->getArticlesTags();
        $data['latest_articles'] = $this->m_data->getLatestArticles();
        $data['random_articles'] = $this->m_data->getRandomArticles();
        $this->m_global->getView('page/articles/search_page', $data);
    }

    public function detail($slug)
    {
        $data = $this->_headData('articles');
        // check if slug exist
        $slug_exist = $this->db->get_where('articles', ['slug' => $slug, 'status' => 'PUBLISH'])->row();
        if (!empty($slug_exist)) {
            $data['detail'] = $this->m_data->getArticlesDetailBySlug($slug);
            $data['articles_tags'] = $this->m_data->getArticlesTags();
            $this->m_global->getView('page/articles/detail', $data);
        } else {
            // if slug not exist
            redirect('error-404', 'refresh');
        }
    }
}
