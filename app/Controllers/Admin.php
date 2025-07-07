<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard()
    {
        // $userData = session('userData');

        // if (!isset($userData['is_login']) || $userData['is_login'] !== true) {
        //     return redirect()->to('login');
        // }

        return view('admin/dashboard');
    }

    public function siswa()
    {
        return view('admin/siswa');
    }

    public function setSession()
    {
        $json = $this->request->getJSON(true);

        if ($json) {
            $sessionData = [
                'uid'       => $json['uid'] ?? null,
                'nama'      => $json['nama'] ?? '',
                'nim'       => $json['nim'] ?? '',
                'email'     => $json['email'] ?? '',
                'role'      => $json['role'] ?? 'user',
                'is_login'  => true
            ];

            session()->set('userData', $sessionData);

            session()->setFlashdata('alert', [
                'type' => 'success',
                'message' => 'Anda berhasil login.'
            ]);

            return $this->response->setJSON(['status' => 'success', 'session' => $sessionData]);
        }

        return $this->response->setJSON(['status' => 'failed']);
    }

    public function logout()
    {
        session()->setFlashdata('alert', [
            'type' => 'success',
            'message' => 'Anda telah logout.'
        ]);

        session()->remove('userData');

        return redirect()->to('login');
    }
}
