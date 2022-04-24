<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeItNow\BarcodeBundle\Utils\QrCode;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use ZipArchive;

class Home extends BaseController
{
    public function __construct()
    {
        $this->qrCode = new QrCode();
        $this->barcode = new BarcodeGenerator();
        $this->mahasiswa = new MahasiswaModel();
    }

    public function index()
    {
        //Generate QRcode
        $this->qrCode
            ->setText('Tegar Penemuan')
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Tegar Penemuan')
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG)
            ->save('img/' . 'qrcode' . '.png');
        $generateQR = $this->qrCode->generate();

        //Generate Barcode
        $this->barcode->setText("0123456789");
        $this->barcode->setType(BarcodeGenerator::Code128);
        $this->barcode->setScale(3);
        $this->barcode->setThickness(25);
        $this->barcode->setFontSize(10);

        // $this->barcode->setFilename('img/' . 'barcode' . $format);
        $generateBarcode = $this->barcode->generate();

        $data = [
            'QRcode' => $generateQR,
            'barcode' => $generateBarcode
        ];
        return view('welcome_message', $data);
    }

    public function mahasiswa()
    {
        $data = [
            'mahasiswa' => $this->mahasiswa->findAll()
        ];

        return view('mahasiswa/tampil', $data);
    }

    public function dowloadAllImage()
    {
        //generate semua jadi image
        $dataMahasiswa = $this->mahasiswa->find();
        $hitung = $this->mahasiswa->countAllResults();

        $result = [];
        for ($i = 0; $i < $hitung; $i++) {
            $this->qrCode
                ->setText($dataMahasiswa[$i]->no_ijazah) //2505
                ->setSize(65)
                ->setPadding(0)
                ->setErrorCorrection('high')
                ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
                ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
                // ->setLabel($dataMahasiswa[$i]->no_ijazah)
                ->setImageType(QrCode::IMAGE_TYPE_PNG)
                ->save('img/' . $dataMahasiswa[$i]->npm . '.png');
            $result[$i] = $this->qrCode->generate();
        }

        //jadikan folder ke zip
        $zip = new ZipArchive;
        if ($zip->open('rar/data.zip', ZipArchive::CREATE) === TRUE) {
            if ($handle = opendir('img/')) {
                while (($entry = readdir($handle)) !== false) {
                    if ($entry != "." && $entry != "..") {
                        $zip->addFile('img/' . $entry);
                    }
                }
                closedir($handle);
            }

            $zip->close();
        }
        header('Content-Type: application/zip');

        //bagian dowload file
        return $this->response->download('rar/data.zip', null);
    }

    public function qrcodeSingel($id)
    {
        $dataMahasiswa = $this->mahasiswa->find($id);
        $this->qrCode
            ->setText($dataMahasiswa->no_ijazah)
            ->setSize(300)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Tegar Penemuan')
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG)
            ->save('img/' . $dataMahasiswa->npm . '.png');
        $this->qrCode->generate();

        //bagian dowload file
        return $this->response->download('img/' . $dataMahasiswa->npm . '.png', null);
    }

    public function pdf($id)
    {
        $data = [
            'mahasiswa' => $this->mahasiswa->find($id)
        ];

        return view('mahasiswa/cetak', $data);
    }

    public function pdfAll()
    {
        //generate semua jadi image
        $dataMahasiswa = $this->mahasiswa->find();
        $hitung = $this->mahasiswa->countAllResults();

        $result = [];
        for ($i = 0; $i < $hitung; $i++) {
            $this->qrCode
                ->setText($dataMahasiswa[$i]->no_ijazah) //2505
                ->setSize(65)
                ->setPadding(0)
                ->setErrorCorrection('high')
                ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
                ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
                // ->setLabel($dataMahasiswa[$i]->no_ijazah)
                ->setImageType(QrCode::IMAGE_TYPE_PNG)
                ->save('img/' . $dataMahasiswa[$i]->npm . '.png');
            $result[$i] = $this->qrCode->generate();
        }

        $data = [
            'mahasiswa' => $dataMahasiswa
        ];

        return view('mahasiswa/cetakAll', $data);
    }
}
