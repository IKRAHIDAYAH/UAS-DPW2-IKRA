<?php
    class Barang extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function index()
        {
            $qry = $this->db->query('select satuan.nama_satuan, barang.* from satuan, barang where barang.satuan_id = satuan.id order by id asc');
            $view['data'] = $qry->result_array();
            $this->load->view('barang/list', $view);
        }

        public function tambah()
        {
            $data['satuan_combo'] = $this->_satuan_combo_generate();
            $this->load->view('barang/form', $data);
        }

        public function edit($prm_key = '')
        {
            if(trim($prm_key) != '')
            {
                $view['satuan_combo'] = $this->_satuan_combo_generate();
                $qry = $this->db->get_where('barang', array('id' => $prm_key));
                $view['data'] = $qry->result_array();
                $this->load->view('barang/form', $view);
            } else {
            redirect(site_url().'/barang');
            }
        }

        public function hapus($prm_key = '') {
            if(trim($prm_key) != '') {
                $qry = $this->db->delete('barang', array('id' => $prm_key));
            }
            redirect(site_url().'/barang');
        }

        public function simpan()
        {
            $data['satuan_combo'] = $this->_satuan_combo_generate();
            $this->load->library('form_validation');
            $rules = array(
                array
                (
                    'field' => 'txt_id'
                    , 'label' => 'ID'
                    , 'rules' => 'trim'
                ), 
                array
                (
                    'field' => 'cmb_satuan'
                    , 'label' => 'Satuan'
                    , 'rules' => 'trim|required'
                ), 
                array
                (
                'field' => 'txt_nama_barang'
                , 'label' => 'Nama Barang'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_harga_jual'
                , 'label' => 'Harga Jual'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_harga_beli'
                , 'label' => 'Harga Beli'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_stok'
                , 'label' => 'Stok'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_merek'
                , 'label' => 'Merek'
                , 'rules' => 'trim|required'
                ),
                array
                (
                'field' => 'txt_tipe'
                , 'label' => 'Tipe'
                , 'rules' => 'trim|required'
                )
            );
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('<code>', '</code>');
            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('barang/form', $data);
            } else {
                $qry = $this->db->get_where('barang', array('id' => $this->input->post('txt_id')));
                $data = array
                (
                    'satuan_id' => $this->input->post('cmb_satuan')
                    , 'nama_barang' => $this->input->post('txt_nama_barang')
                    , 'harga_jual' => $this->input->post('txt_harga_jual')
                    , 'harga_beli' => $this->input->post('txt_harga_beli')
                    , 'stok' => $this->input->post('txt_stok')
                    , 'merek' => $this->input->post('txt_merek')
                    , 'tipe' => $this->input->post('txt_tipe')
                );
                if( count($qry->result()) == 0 )
                {
                    $data = array_merge(array( 'id' => $this->input->post('txt_id') ), $data);
                    $this->db->insert('barang', $data);
                } else {
                    $this->db->update('barang', $data, array('id' => $this->input->post('txt_id')));
                }
                redirect(site_url().'/barang');
            }
        }

        private function _satuan_combo_generate()
        {
            $qry = $this->db->query('select * from satuan');
            $result = $qry->result_array();
            return $result;
        }
    }