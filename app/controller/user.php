<?php
class User extends Controller {
    private $usermodel;
    public function __construct() 
    {
        $this->usermodel=$this->model("usermodel");
    }
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); //protect sql injection
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'email_err' => '',
                'password_err' => '',
            ];

            if (empty($data['email'])) {
                $data['email_err'] = "Email is wrong";
            }

            if (empty($data['password'])) {
                $data['password_err'] = "Password is at least 6 digits or characters";
            }
            
            if (empty($data['email_err']) && empty($data['password_err'])) {
                $rowUser=$this->usermodel->getUserbyEmail($data['email']);
                if($rowUser){
                    {
                        $hash_pass=$rowUser->password;
                        if(password_verify( $data['password'],$hash_pass )){
                            setUserSession($rowUser);
                            redirected(URLROOT.'admin/home');
                            $this->view('home/index');
                        }else{
                            $this->view('user/login');
                        }
                    }
                }else{
                    $data['email_err'] = "Email error!";
                }
            } else {
                $this->view("user/login", $data);
            }
        } else {
            $this->view("user/login");
        }
    }

    public function register() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); //protect sql injection
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm_password' => $_POST['confirm_password'],
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = "Username is empty";
            }

            if (empty($data['email'])) {
                $data['email_err'] = "Email is wrong";
            }else{
                if($this->usermodel->getUserbyEmail($data['email'])){
                    $data['email_err']="email is already in use";
                }
            }

            if (empty($data['password'])) {
                $data['password_err'] = "Password is at least 6 digits or characters";
            }
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Your password is not confirmed";
            }
            if ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = "Your passwords do not match";
            }

            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                if($this->usermodel->register($data['name'],$data['email'],$data['password'])){
                    flash("register_success","register success, please login");
                    $this->view("user/login");
                }else{
                    $this->view("user/register");
                }
            } else {
                $this->view("user/register", $data);
            }
        } else {
            $this->view("user/register");
        }
    }

    public function logout()
    {
        unsetUserSession();
        $this->view("home/index");
    }
}
?>
