<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\userModel;
use App\Models\logsModel;


class AuthController extends BaseController
{
    public function index()
    {
        return login_layout('index');
    }

    public function login()
    {

        $userModel = new userModel();
        $logsModel = new logsModel();
        $dados = $this->request->getPost();

        $usuario = $userModel->where('email', $dados['email'])->first();


        if (!empty($usuario)) {

            if (password_verify($dados['senha'], $usuario['senha'])) {

                $logs = $logsModel->where('userId', $usuario['id'])->findAll();
                $userConfirmedEmail = false;

                foreach ($logs as $log) {

                    if (in_array('user_has_confirmed_email', $log)) {
                        $userConfirmedEmail = true;
                        break;
                    }
                }
                if ($userConfirmedEmail) {
                    $usuario_id = $usuario['id'];
                    session()->set('token', $usuario['token']);
                    session()->set('user_id', $usuario['id']);

                    session()->sessionExpiration = $this->request->getPost('manter_conectado') == NULL ? 7200 : 86400;

                    setLogger("user_has_logged_In", $usuario_id, "Usuário iniciou uma sessão.");
                    return layout('principal');
                } else {
                    return redirect()->to('/?alert=verifyEmail');
                }
            }
        } else {
            return redirect()->to('/?alert=errorLogin');
        }
    }



    public function cadastrar()
    {

        $userModel = new userModel();

        $formData = $this->request->getPost();

        $senha = $formData['senha'];

        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        $user['senha'] = $senhaCriptografada;

        $token = bin2hex(random_bytes(32));

        $user['token'] = $token;
        $user['email'] = $formData['email'];
        $user['nome'] = $formData['nome'];
        $user['email_code'] = bin2hex(random_bytes(3));

        $userModel->insert($user);

        $this->verifyEmail($user['email_code'], $formData['email'], $formData['nome']);

        setLogger("user_has_register", $userModel->getInsertID(), "Usuário registrado com sucesso.");

        return redirect()->to('/?alert=successCreate');
    }

    public function confirmUserEmailAccess($code)
    {

        $userModel = new userModel;
        $user = $userModel->where('email_code', $code)->first();
        $usuario_id = $user['id'];
        if ($user) {
            $token = $user['token'];
            session()->set('token', $token);
            session()->set('user_id', $usuario_id);
            setLogger("user_has_confirmed_email", $usuario_id, "Usuário verificou seu e-mail.");
            return redirect()->to('/home');
        } else {
            return '<script>alert("E-mail não verificado.")</script>';
        }
    }

    public function verifyEmail($code)
    {
        $userModel = new userModel;
        $formData = $this->request->getPost();

        $confirmationLink = base_url('confirm-email-view/' . $code);

        $email = \Config\Services::email(); //testes de email sendo feito usando mailtrap.
        $email->setTo('email do destinátario');
        $email->setSubject('Verificação do e-mail');

        $msg = '<p>Olá, por favor, clique no link a seguir para confirmar seu e-mail.</p><br>';
        $msg .= '<a href="' . $confirmationLink . '">Clique aqui para confirmar</a>';

        $email->setMessage($msg);
        $email->setMailType('html');
        $email->send();

        return redirect()->to('/');
    }

    public function confirmEmailView()
    {
        echo view('checkUserExists');
    }

    public function logout()
    {
        setLogger("user_has_logged_out", session()->get('user_id'), "Usuário encerrou uma sessão.");
        session()->destroy();
        return redirect()->to('/');
    }

    public function profile($id)
    {
        $data['user'] = getUser($id);
        return layout('profile', $data);
    }
}