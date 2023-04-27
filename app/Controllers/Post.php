<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PostModel;
use App\Models\FakultasModel;
use App\Models\ProdiModel;

date_default_timezone_set('Asia/Jakarta');

class Post extends Controller
{
    //halaman utama
    public function index()
    {

        //model initialize
        $postModel = new PostModel();
        $data = array(
            'tb_mahasiswa' => $postModel->nampil()
        );

        return view('index', $data);
    }

    //proses apabila berkunjung method create
    public function create()
    {
        //model initialize
        $fakultasModel = new FakultasModel();

        $data['tb_fakultas'] = $fakultasModel->orderBy('fakultas', 'ASC')->findAll();
        return view('create', $data);
    }

    //comboboxberantai fakultas dan prodi
    public function action()
    {
        if ($this->request->getVar('action')) {

            $action = $this->request->getVar('action');
            if ($action == 'get_prodi') {
                $prodiModel = new ProdiModel();
                $prodiData = $prodiModel->where('fakultas_id', $this->request->getVar('fakultas_id'))->findAll();
                echo json_encode($prodiData);
            }
        }
    }

    //proses pengirimian saat nambah
    public function store()
    {
        //load helper form and URL
        helper(['form', 'url']);

        //define validation
        $validation = $this->validate([
            'nim' => [
                'rules'  => 'required|is_unique[tb_mahasiswa.nim]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
        ]);



        if (!$validation) {

            //render view with error validation message
            return view('create', [
                'validation' => $this->validator
            ]);
        } else {

            //model initialize
            $postModel = new PostModel();

            //melakukan pembatasan untuk input
            $total = $postModel->batas();
            if ($total > 9) {

                // flash message
                session()->setFlashdata('message', 'Data Gagal Disimpan Karena Di luar batas');
                return redirect()->to(base_url('post'));
            } else {
                //insert data into database
                $postModel->insert([
                    'nim'   => $this->request->getPost('nim'),
                    'nama' => $this->request->getPost('nama'),
                    'fakultas_id' => $this->request->getPost('fakultas_id'),
                    'prodi_id' => $this->request->getPost('prodi_id'),
                    'no_hp' => $this->request->getPost('no_hp'),
                ]);

                //flash message
                session()->setFlashdata('message', 'Data berhasil disimpan');

                return redirect()->to(base_url('post'));
            }
        }
    }
    /**
     * edit function
     */
    public function edit($id)
    {
        //model initialize
        $postModel = new PostModel();
        $fakultasModel = new FakultasModel();
        $data = array(
            'post' => $postModel->find($id),
            // 'tb_fakultas' => $fakultasModel->orderBy('fakultas_id', 'ASC')->findAll()
            'DataSebelum' => $fakultasModel->nampil($id),
            'tb_fakultas' => $fakultasModel->orderBy('fakultas', 'ASC')->findAll()
        );

        return view('edit', $data);
    }

    /**
     * update function
     */
    public function update($id)
    {
        //load helper form and URL
        helper(['form', 'url']);

        //define validation
        $validation = $this->validate([
            'nim' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'nama'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
        ]);

        if (!$validation) {

            //model initialize
            $postModel = new PostModel();

            //render view with error validation message
            return view('edit', [
                'post' => $postModel->find($id),
                'validation' => $this->validator
            ]);
        } else {

            //model initialize
            $postModel = new PostModel();

            //insert data into database
            $postModel->update($id, [
                'nim'   => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                'fakultas_id' => $this->request->getPost('fakultas_id'),
                'prodi_id' => $this->request->getPost('prodi_id'),
                'no_hp' => $this->request->getPost('no_hp'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Diupdate');

            return redirect()->to(base_url('post'));
        }
    }
    /**
     * delete function
     */
    public function delete($id)
    {
        //model initialize
        $postModel = new PostModel();

        $post = $postModel->find($id);

        if ($post) {
            $postModel->delete($id);

            //flash message
            session()->setFlashdata('message', 'Data Berhasil Dihapus');

            return redirect()->to(base_url('post'));
        }
    }
}
