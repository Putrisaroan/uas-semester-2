<?php
class sertifikasi extends Controller {

    public function __construct(){

        if($_SESSION['session_login'] != 'sudah_login') {
            
        Flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
        
        }
    }

    public function index(){
        $data['title']='Data sertifikasi';
        $data['sertifikasi']=$this->model('SertifikasiModel')->getAllSertifikasi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('sertifikasi/index', $data);
        $this->view('templates/footer');
    }




    public function tambahSertifikasi(){
        $data['title'] = 'Tambah Data Sertifikasi';
        $data['lembaga']=$this->model('LembagaModel')->getAllLembaga();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('sertifikasi/create', $data);
        $this->view('templates/footer');
    }
    public function simpanSertifikasi(){
        if( $this->model('SertifikasiModel')->tambahSertifikasi($_POST) > 0 ){
            Flasher::setMessage('Berhasil','ditambahkan', 'success');
            header('location: ' . base_url . '/sertifikasi');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/sertifikasi');
            exit;
        }
    }  



    
    public function editSertifikasi($id){
        $data['title'] = 'Detail Sertifikasi';
        $data['lembaga']=$this->model('LembagaModel')->getAllLembaga();
        $data['sertifikasi'] = $this->model('SertifikasiModel')->getSertifikasiById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('sertifikasi/edit', $data);
        $this->view('templates/footer');
    }
    public function updateSertifikasi(){
        if( $this->model('SertifikasiModel')->updateDataSertifikasi($_POST) > 0 ){
            Flasher::setMessage('Berhasil','diupdate', 'success');
            header('location: ' . base_url . '/sertifikasi');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/sertifikasi');
            exit;
        }
    }  


    

    public function cariSertifikasi(){
        $data['title'] = 'Data sertifikasi';
        $data['sertifikasi'] = $this->model('SertifikasiModel')->cariSertifikasi();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('sertifikasi/index', $data);
        $this->view('templates/footer');
    }
    public function hapusSertifikasi($id){
        if( $this->model('SertifikasiModel')->deleteSertifikasi($id) > 0 ){
            Flasher::setMessage('Berhasil','dihapus', 'success');
            header('location: ' . base_url . '/sertifikasi');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/sertifikasi');
            exit;
        }
    }  



}
