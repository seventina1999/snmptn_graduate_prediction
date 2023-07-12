<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
class importfile extends CI_Controller
{

    public function index()
    {
        $data['uploadfile'] = $this->db->get('uploadfile')->result();
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('Lulusan/DataLulusan', $data);
        $this->load->view('layout/footer', $data);
    }

    public function create()
    {
        $data['title'] = "Upload File Excel";
        $this->load->view('importfile/create', $data);
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

            // Check if the file is an XLSX
            $allowedExtensions = array("xlsx");
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

            if (!in_array($file_extension, $allowedExtensions)) {
                $message = array(
                    'message' => '<div class="alert alert-danger form-control">Tipe File Tidak Sesuai. Silahkan Upload Ulang file Excel.</div>',
                );
                $this->session->set_flashdata($message);
                redirect('importfile');
            }

            $object = PHPExcel_IOFactory::load($file_tmp);
            // Load the Excel file\
            $worksheet = $object->getActiveSheet();

            // Define the expected column headers
            $expectedHeaders = ['NAMASISWA', 'TAHUN', 'PTN', 'PROGRAMSTUDI', 'NILAI', 'SERTIFIKAT', 'KETERANGAN'];

            // Get the actual column headers from the uploaded file
            $actualHeaders = [];
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($worksheet->getHighestColumn());
            $actualHeaders = array_map('trim', $actualHeaders);
            $expectedHeaders = array_map('trim', $expectedHeaders);


            for ($col = 1; $col <= $highestColumnIndex - 1; $col++) {
                $cellValue = $worksheet->getCellByColumnAndRow($col, 1)->getValue();
                $actualHeaders[] = $cellValue;
            }

            // var_dump($actualHeaders);
            // echo "</br>";
            // var_dump($expectedHeaders);
            // // Stop further execution
            // die();
            if ($actualHeaders != $expectedHeaders) {
                $message = [
                    'message' => '<div class="alert alert-warning" role="alert"><strong>Warning!</strong>Struktur Excel tidak sesuai!. Harap download template diatas.</div>',
                ];
                $this->session->set_flashdata($message);
                redirect('importfile');
            }

            foreach ($object->getWorksheetIterator() as $worksheet) {

                $highestRow = $worksheet->getHighestRow();
                // $highestColumn = $worksheet->getHighestColumn();

                for ($row = 2; $row <= $highestRow; $row++) {

                    $namasiswa = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $kelas = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $ptn = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $programstudi = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $nilai = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $sertifikat = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $keterangan = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

                    $data[] = array(
                        'nama' => $namasiswa,
                        'kelas' => $kelas,
                        'ptn' => $ptn,
                        'prodi' => $programstudi,
                        'nilai' => $nilai,
                        'sertifikat' => $sertifikat,
                        'keterangan' => $keterangan,
                    );
                }
            }

            $this->db->insert_batch('uploadfile', $data);

            $message = array(
                'message' => '<div class="alert alert-success" role="alert"><strong>Sukses!</strong>Import file excel berhasil disimpan di database</div>',
            );

            $this->session->set_flashdata($message);
            redirect('importfile');
        } else {
            $message = array(
                'message' => '<div class="alert alert-danger" role="alert"><strong>Danger!</strong>Import file gagal, coba lagi</div>',
            );

            $this->session->set_flashdata($message);
            redirect('importfile');
        }
    }
    public function downloadExcel()
    {
        $filePath = 'C:\xampp\htdocs\PA_CindySeventina\application\controllers\Template_Lulusan.xlsx'; // Specify the Excel file path here

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


    /* End of file importfile.php */
    /* Location: ./application/controllers/importfile.php */