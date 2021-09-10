<?php

namespace App\Controllers;

use App\Models\ListKunciModel;
use App\Models\TeknisiModel;
use App\Models\ToolsModel;
use CodeIgniter\HTTP\Request;

class Checktool extends BaseController
{
    protected $teknisi;
    protected $daftarKunci;
    protected $tool;

    public function __construct()
    {
        $this->teknisi     = new TeknisiModel();
        $this->daftarKunci = new ListKunciModel();
        $this->tool        = new ToolsModel();

        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $list_teknisi = $this->teknisi->orderBy('teknisi', 'ASC')->findAll();

        $data         =
            [
                'list_teknisi'  => $list_teknisi
            ];

        return view('checktool/login', $data);
    }

    public function login_validation()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $caddy    = $this->request->getVar('caddy');

        if ($password == 'akastra@123') {
            $link = '/checktool/' . '/' . $username . '/' . $caddy;
        } else {
            $link = '/checktool';
        }

        return redirect()->to($link);
    }

    public function list_kunci($teknisi, $caddy)
    {

        // GET DATE
        $date  = date('j');
        $month = date('n');
        $year  = date('Y');
        $kunci = $this->daftarKunci->getKunci($caddy);

        $data = [
            'date'      => $date,
            'month'     => $month,
            'year'      => $year,
            'teknisi'   => $teknisi,
            'caddy'     => $caddy,
            'kunci'     => $kunci
        ];

        return view('checktool/list_kunci_view', $data);
    }


    // ADDING DATA
    public function add()
    {

        // GET CADDY
        $caddy      = $this->request->getVar('caddy');
        $listKunci  = $this->daftarKunci->getKunci($caddy);

        // GET USER INFO
        $teknisi    =  $this->request->getVar('teknisi');

        // GET TIMESTAMP
        $date       = date('j');
        $month      = date('n');
        $year       = date('Y');


        foreach ($listKunci as $row) {
            $status = $this->request->getVar(strval($row->id));

            if ($status == "V") {
                $jumlah     = 1;
                $kosong     = 0;
                $rusak      = 0;
                $hilang     = 0;
                $harga      = 0;
            } else if ($status == "R") {
                $jumlah     = 0;
                $kosong     = 0;
                $rusak      = 1;
                $hilang     = 0;
                $harga      = 0;
            } else {
                $jumlah     = 0;
                $kosong     = 0;
                $rusak      = 0;
                $hilang     = 1;
                $harga      = $row->harga;
            }


            $data = [
                'kunci'     => $row->kunci . ' ' . $row->ukuran,
                'status'    => $status,
                'jumlah'    => $jumlah,
                'kosong'    => $kosong,
                'bulan'     => $month,
                'tanggal'   => $date,
                'tahun'     => $year,
                'hilang'    => $hilang,
                'rusak'     => $rusak,
                'date'      => $row->id,
                'harga'     => $harga,
                'teknisi'   => $teknisi
            ];

            $this->tool->insert($data);
        }

        return redirect()->to('/check/check_today/' . $teknisi . '/' . $caddy);
    }

    // CHECK CHECKSHEET
    public function check_today($teknisi, $caddy)
    {
        // GET TIMESTAMP
        $date       = date('j');
        $month      = date('n');
        $year       = date('Y');

        $today = $this->tool->getCheckToday($teknisi, $date, $month, $year);

        $data = [
            'date'      => $date,
            'month'     => $month,
            'year'      => $year,
            'today'     => $today,
            'teknisi'   => $teknisi,
            'caddy'     => $caddy
        ];

        return view('checktool/check_checksheet', $data);
    }

    public function test()
    {
        $kunci = $this->tool->getKunciById(1);
        dd(intval($this->daftarKunci->getHarga($kunci->date)));
    }


    public function change_status()
    {
        if ($this->request->isAJAX()) {

            // GET DATA

            $kunci = $this->tool->getKunciById($_POST['kunciId']);

            if ($kunci->status == "V") {
                $status = "H";
                $harga  = intval($this->daftarKunci->getHarga($kunci->date));
                $jumlah = 0;
                $hilang = 1;
                $kosong = 0;
                $rusak  = 0;
            } else if ($kunci->status == "H") {
                $status = "R";
                $harga  = 0;
                $jumlah = 0;
                $hilang = 0;
                $kosong = 0;
                $rusak  = 1;
            } else {
                $status = "V";
                $harga  = 0;
                $jumlah = 1;
                $hilang = 0;
                $kosong = 0;
                $rusak  = 0;
            }

            $update = $this->tool->updateStatusKunci($_POST['kunciId'], $status, $harga, $jumlah, $hilang, $kosong, $rusak);
            if ($update) {
                echo json_encode(array("status" => true, 'data' => $status));
            }
        }
    }


    public function delete_today()
    {
        $teknisi = $this->request->getVar('teknisi');
        $caddy   = $this->request->getVar('caddy');

        $delete = $this->tool->delete_today($teknisi);

        if ($delete) {
            $link = '/checktool/' . $teknisi . '/' . $caddy;
        } else {
            $link = '/check/check_today/'  . $teknisi . '/' . $caddy;
        }

        return redirect()->to($link);
    }
}
