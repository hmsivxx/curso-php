<?php
class loginController extends Controller
{

    public function index()
    {
        $data = [];
        $user = new User();
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $passord = $_POST['password'];

            if ($user->login($email, $passord)) {
                $data['login'] = true;
            } else {
                $data['wrong'] = true;
            }
        }

        $this->loadTemplate('login', $data);
    }

    public function exit()
    {
        unset($_SESSION['clogin']);
        header("Location: ".BASE_URL);
    }
}