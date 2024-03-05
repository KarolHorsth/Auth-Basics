<?php

namespace App\Controllers;

use App\Models\userModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HomeController extends BaseController
{
    public function index()
    {
        if (session()->has('token')) {
            return layout('principal');
        } else {
            return login_layout('index');
        }
    }

    public function update_profile($id)
    {
        $userModel = new userModel();

        if ($id === null) {
            return layout('principal');
        }

        $data = [
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
        ];

        $userModel->update($id, $data);
        setLogger("user_has_updated_profile", session()->get('user_id'), "Usuário atualizou seu perfil.");
        return layout('profile');
    }
}