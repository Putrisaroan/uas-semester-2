<?php
class lembaga extends Controller {

    public function __construct(){

        if($_SESSION['session_login'] != 'sudah_login') {
            
        Flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
        
        }
    }

    public function index(){
        $data['title']='Data Lembaga Sertifikasi';
        $data['lembaga']=$this->model('LembagaModel')->getAllLembaga();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('lembaga/index', $data);
        $this->view('templates/footer');
    }




    public function tambahLembaga(){
        $data['title'] = 'Tambah Data Lembaga Sertifikasi';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('lembaga/create', $data);
        $this->view('templates/footer');
    }
    public function simpanLembaga(){
        if( $this->model('LembagaModel')->tambahLembaga($_POST) > 0 ){
            Flasher::setMessage('Berhasil','ditambahkan', 'success');
            header('location: ' . base_url . '/lembaga');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/lembaga');
            exit;
        }
    }  



    
    public function editLembaga($id){
        $data['title'] = 'Detail Data Lembaga Sertifikasi';
        $data['lembaga'] = $this->model('LembagaModel')->getLembagaById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('lembaga/edit', $data);
        $this->view('templates/footer');
    }
    public function updateLembaga(){
        if( $this->model('LembagaModel')->updateLembaga($_POST) > 0 ){
            Flasher::setMessage('Berhasil','diupdate', 'success');
            header('location: ' . base_url . '/lembaga');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/lembaga');
            exit;
        }
    }  


    

    public function cariLembaga(){
        $data['title'] = 'Data Lembaga Sertifikasi';
        $data['lembaga'] = $this->model('LembagaModel')->cariLembaga();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('lembaga/index', $data);
        $this->view('templates/footer');
    }
    public function hapusLembaga($id){
        if( $this->model('LembagaModel')->deleteLembaga($id) > 0 ){
            Flasher::setMessage('Berhasil','dihapus', 'success');
            header('location: ' . base_url . '/lembaga');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/lembaga');
            exit;
        }
    }  



}
