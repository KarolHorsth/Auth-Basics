<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\userModel;
use App\Models\logsModel;

class ForgotPassword extends BaseController
{
    public function forgot_password()
    {
        echo view('login/forgotPassword');
    }
    public function resetPassword()
    {
        $userModel = new userModel();
        $data = $this->request->getPost();
        $user = $userModel->where('email', $data['email'])->first();

        $email = \Config\Services::email(); //testes de email sendo feito usando mailtrap.
        $email->setTo('email do destinátario');
        $email->setSubject('Redefina sua senha.');
        $link = base_url('changePassword/' . $user['id']);

        $msg = '<p>Olá, por favor, clique no link a seguir para alterar sua senha.</p><br>';
        $msg .= '<a href=" ' . $link . '">Clique aqui para alterar</a>';

        $email->setMessage($msg);
        $email->setMailType('html');
        $email->send();

        return redirect()->to('/?alert=sentEmail');
    }
    public function changePassword($id)
    {
        $data['user_id'] = $id;
        echo view('login/resetPassword', $data);
    }
    public function updatePassword($id)
    {
        $userModel = new userModel();

        $data = $this->request->getPost();

        $senha = $data['senha'];

        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        $userModel->update($id, ['senha' => $senhaCriptografada]);

        return redirect()->to('/');
    }
}