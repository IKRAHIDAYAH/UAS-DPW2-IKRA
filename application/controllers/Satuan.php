<?php
class Satuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $qry = $this->db->query('select * from satuan');
        $view['data'] = $qry->result_array();
        $this->load->view('satuan/list', $view);
    }

    public function tambah()
    {
        $this->load->view('satuan/form');
    }

    public function edit($prm_key = '')
    {
        if(trim($prm_key) != '')
        {
            $qry = $this->db->get_where('satuan', array('id' => $prm_key));
            $view['data'] = $qry->result_array();
            $this->load->view('satuan/form', $view);
        } else {
            redirect(site_url().'/satuan');
        }
    }

    public function hapus($prm_key = '') 
    {
        if(trim($prm_key) != '') {
            $qry = $this->db->delete('satuan', array('id' => $prm_key));
        }
        redirect(site_url().'/satuan');
    }

    public function simpan()
    {
        $this->load->library('form_validation');
        $rules = array(
            array(
                'field' => 'txt_id'
                , 'label' => 'ID'
                , 'rules' => 'trim'
            ), 
            array(
                'field' => 'txt_nama_satuan'
                , 'label' => 'Satuan'
                , 'rules' => 'trim|required'
            ),
        );
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<code>', '</code>');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('satuan/form');
        } else {
            $qry = $this->db->get_where('satuan', array('id' => $this->input->post('txt_id')));
            $data = array('nama_satuan' => $this->input->post('txt_nama_satuan'));
            if( count($qry->result()) == 0 )
            {
                $data = array_merge(array('id' => $this->input->post('txt_id') ), $data);
                $this->db->insert('satuan', $data);
            } else {
                $this->db->update('satuan', $data, array('id' => $this->input->post('txt_id')));
            }
            redirect(site_url().'/satuan');
        }
    }
}