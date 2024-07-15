<!-- <?php -->

// defined('BASEPATH') OR exit('No direct script access allowed');

// class Data_siswa extends CI_Controller {

//     public function __construct()
// 	{
// 		parent::__construct();
// 		$this->load->model('M_guru');
// 	}

//     public function index()
//     {
        
//         $id_level = $this->session->userdata('id_level');
//         $id_user = $this->session->userdata('id_user');
        
        
        
        // Lakukan logika berdasarkan peran pengguna
        // if ($id_level == '2') {
        //     $a['Guru'] = $this->M_Guru->Guru()->result_array();
        //     $a['layout1'] = 'v_guru';
        //     $a['title'] = 'Data Guru';
            $this->load->view('layouts/v_backend',$a);
            // Lakukan sesuatu untuk pengguna dengan peran admin
        } else {
            redirect('Home');
           
        // Lakukan sesuatu untuk pengguna dengan peran lain
        }
        
    
    
    }
}
?>