<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('prodi_model');
        $this->load->model('ptn_model');
    }

    public function index()
    {
        $data['peserta'] = $this->db->get('peserta')->result();
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('Peserta/DataPeserta', $data);
        $this->load->view('layout/footer', $data);
    }

    public function excel()
    {
        if (isset($_FILES["file"]["name"])) {
            // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
            $object = PHPExcel_IOFactory::load($file_tmp);

            foreach ($object->getWorksheetIterator() as $worksheet) {

                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                for ($row = 2; $row <= $highestRow; $row++) {

                    $namasiswa = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $tahun = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $ptn = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $programstudi = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $nilai = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $sertifikat = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    // $keterangan = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $dbptn = $this->ptn_model->get();
                    $dbprodi = $this->prodi_model->get();
                    $idptn = '';
                    $idprodi = '';
                    foreach ($dbptn as $p) {
                        if ($ptn == $p['ptn']) {
                            $idptn = $p['ptn_label'];
                        } else {
                            $idptn = 49;
                        }
                    }

                    foreach ($dbprodi as $pr) {
                        if ($programstudi == $pr['prodi']) {
                            $idprodi = $pr['prodi_label'];
                        } else {
                            $idprodi = 117;
                        }
                    }

                    // menyimpan data dalam variabel input data yang berbentuk array
                    $input_data = [
                        $idptn = $idptn,
                        $idprodi = $idprodi,
                        $nilai = $nilai,
                        $sertifikat = $sertifikat
                    ];

                    $pythonScriptPath = APPPATH . 'controllers/make_prediction.py'; //lokasi mesin berada, appath sama fungsinya seperti base url
                    //guna python didepan menjalankan python yang variabel sebelumnya beserta data array yang sudah disimpan tadi.
                    $command = 'python ' . escapeshellarg($pythonScriptPath) . ' ' . escapeshellarg(json_encode($input_data));
                    $prediction = shell_exec($command); // eksekusi berlangsung

                    $data[] = array(
                        'nama' => $namasiswa,
                        'kelas' => $tahun,
                        'ptn' => $ptn,
                        'prodi' => $programstudi,
                        'nilai' => $nilai,
                        'sertifikat' => $sertifikat,
                        'keterangan' => $prediction,
                    );
                }
            }

            $this->db->insert_batch('peserta', $data);

            $message = array(
                'message' => '<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
            );

            $this->session->set_flashdata($message);
            redirect('Peserta');
        } else {
            $message = array(
                'message' => '<div class="alert alert-danger">Import file gagal, coba lagi</div>',
            );

            $this->session->set_flashdata($message);
            redirect('Peserta');
        }
    }
    public function downloadExcel()
    {
        $filePath = 'C:\xampp\htdocs\PA_CindySeventina\application\controllers\Template_Peserta.xlsx'; // Specify the Excel file path here

        // Check if the file exists
        if (file_exists($filePath)) {
            // Set the appropriate headers for the download
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));

            // Read the file and output it to the PHP output stream
            readfile($filePath);
            exit;
        } else {
            // File not found
            die('File not found.');
        }
    }
}
