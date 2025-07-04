<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard()
    {
        $userData = session('userData');

        if ($userData['is_login'] == 'true') {
            return view('admin/dashboard');
        } else {
            return view('login');
        }
        
    }
        public function siswa()
    {
        return view('admin/siswa');
    }

    public function setSession()
{
    $json = $this->request->getJSON(true);

    if ($json) {
        // Siapkan struktur data session
        $sessionData = [
            'uid'       => $json['uid'] ?? null,
            'nama'      => $json['nama'] ?? '',
            'nim'       => $json['nim'] ?? '',
            'email'     => $json['email'] ?? '',
            'role'      => $json['role'] ?? 'user',
            'is_login'  => true
        ];

        session()->set('userData', $sessionData);

        return $this->response->setJSON(['status' => 'success', 'session' => $sessionData]);
    }

    return $this->response->setJSON(['status' => 'failed']);
    }

    public function logout() {
        session()->destroy();

        return redirect()->to('login');
    }
}
