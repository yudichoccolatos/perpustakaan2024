<?php
defined('BASEPATH') or exit('No Direct script access allowed'); 
class Laporan extends CI_Controller 
{ 
 function __construct() 
 { 
parent::__construct(); 
 } 


        public function laporan_buku() 
        { 
            $data['judul'] = 'Laporan Data Buku'; 
            $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
            $data['buku'] = $this->ModelBuku->getBuku()->result_array(); 
            $data['kategori'] = $this->ModelBuku->getKategori()->result_array(); 
            $this->load->view('templates/header', $data); 
            $this->load->view('templates/sidebar', $data); 
            $this->load->view('templates/topbar', $data); 
            $this->load->view('buku/laporan_buku', $data); 
            $this->load->view('templates/footer'); 
        }

        public function cetak_laporan_buku() {
            $data['buku'] = $this->ModelBuku->getBuku()->result_array();
            $data['kategori'] = $this->ModelBuku->getBuku()->result_array();

            $this->load->view('buku/laporan_print_buku',$data);

        }

        public function laporan_buku_pdf()
        {
            $this->load->library('pdfgenerator');
            $data['buku'] = $this->ModelBuku->getBuku()->result_array();
            $this->load->view('buku/laporan_pdf_buku', $data);

            $paper_size = 'A4'; // ukuran kertas
            $orientation = 'landscape'; // tipe format kertas potrait atau landscape
            $html = $this->output->get_output();

            $this->pdfgenerator->set_paper($paper_size, $orientation);
            //Convert to PDF
            $this->pdfgenerator->load_html($html);
            $this->pdfgenerator->render();
            $this->pdfgenerator->stream("laporan_data_buku.pdf", array('Attachment'=>0));
        }

        public function export_excel() {
            $data=array('title'=>'Laporan Buku',
            'buku'=>$this->ModelBuku->getBuku()->result_array());
            $this->load->view('buku/export_excel_buku',$data);
        }

        public function laporan_pinjam() 
        { 
            $data['judul'] = 'Laporan Data Peminjaman'; 
            $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
            $data['laporan'] = $this->db->query("select * from pinjam p,detail_pinjam d,
            buku b,user u where d.id_buku=b.id and p.id_user=u.id
            and p.no_pinjam=d.no_pinjam")->result_array(); 
            $this->load->view('templates/header', $data); 
            $this->load->view('templates/sidebar'); 
            $this->load->view('templates/topbar', $data); 
            $this->load->view('pinjam/laporan_pinjam', $data); 
            $this->load->view('templates/footer'); 
        }

        public function laporan_anggota() 
        { 
            $data['judul'] = 'Laporan Data Anggota'; 
            $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
            $data['laporan'] = $this->db->query("select * from user where role_id=2")->result_array(); 
            $this->load->view('templates/header', $data); 
            $this->load->view('templates/sidebar'); 
            $this->load->view('templates/topbar', $data); 
            $this->load->view('member/laporan_member', $data); 
            $this->load->view('templates/footer'); 
        }
    }