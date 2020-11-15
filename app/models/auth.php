<?php

namespace App\Models;
use Core\App;
use \PDO;
use \Exception;
class User
{
    protected $pdo;
    protected $username;
    protected $password;
    protected $email;
    protected $firstname;
    protected $lastname;
    public $error;

    public function __Construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function Login($username, $password)
    {
        if ($this->isUsernameExists($username))
        {
            $details = $this->fetchData($username);

            if (password_verify($password, $details['pass']))
            {
                $_SESSION['id']        = $details['id'];
                $_SESSION['username']  = $details['username'];
                $_SESSION['firstname'] = $details['firstname'];
                $_SESSION['lastname']  = $details['lastname'];
                $_SESSION['email']     = $details['email'];
                $_SESSION['role']      = $details['user_role'];

                redirect('dashboard');
            }
            $message = "Incorrect Password";
            view('login', compact('message', 'error'));
        }
        else{
            $message = 'No Account';
            view('login', compact('message'));
        }
    }

    public function AddAccount($username, $firstname, $lastname, $email, $password, $cpassword, $role)
    {
        if ($this->isUsernameValid($username))
        {
            if (!$this->isUsernameExists($username))
            {
                if ($this->isnameValid($firstname) && $this->isnameValid($lastname))
                {
                    if ($this->isEmailValid($email))
                    {
                        if (!$this->isEmailExists($email))
                        {
                            if ($this->isPasswordValid($password, $cpassword))
                            {
                                if(empty($role))
                                {
                                    App::get('query')->insert('users', [
                                        'username'  => $this->sanitize_string($username),
                                        'firstname' => $this->sanitize_string($firstname),
                                        'lastname'  => $this->sanitize_string($lastname),
                                        'email'     => filter_var($email, FILTER_SANITIZE_EMAIL),
                                        'pass'      => password_hash($password, PASSWORD_DEFAULT)
                                    ]);
                                }
                                else
                                {
                                    App::get('query')->insert('users', [
                                        'username'  => $this->sanitize_string($username),
                                        'firstname' => $this->sanitize_string($firstname),
                                        'lastname'  => $this->sanitize_string($lastname),
                                        'email'     => filter_var($email, FILTER_SANITIZE_EMAIL),
                                        'pass'      => password_hash($password, PASSWORD_DEFAULT),
                                        'user_role'      => $role
                                    ]);
                                }
                            }
                            else{
                                $message = "Passwords must match and should not be less than six(6) characters";
                                view('register', compact('message'));
                            }
                        }
                        else{
                            $message = "Email already exists";
                            view('register', compact('message'));
                        }
                    }
                    else{
                        $message = "Invalid email format";
                        view('register', compact('message'));
                    }
                }
                else {
                    $message = "Invalid name format";
                    view('register', compact('message'));
                }
            }
            else{
                $message = "Username already exists";
                view('register', compact('message'));
            }
        }
        else{
            $message = "Invalid Username";
            view('register', compact('message'));
        }
    }

    public function UpdateUser($username, $firstname, $lastname, $email, $currentPassword, $password, $cpassword, $id)
    {
        $details = $this->fetchData($_SESSION['username']);

        if ($this->isUsernameValid($username))
        {
            if (!$this->isUsernameExists($username) || ($this->isUsernameExists($username) && $username === $details['username']))
            {
                if ($this->isnameValid($firstname) && $this->isnameValid($lastname))
                {
                    if ($this->isEmailValid($email))
                    {
                        if (!$this->isEmailExists($email) || ($this->isEmailExists($email) && $email === $details['email']))
                        {
                            if (password_verify($currentPassword, $details['pass']))
                            {
                                if ($this->isPasswordValid($password, $cpassword))
                                {
                                    $username = $this->sanitize_string($username);
                                    $firstname = $this->sanitize_string($firstname);
                                    $lastname  = $this->sanitize_string($lastname);
                                    $email    = filter_var($email, FILTER_SANITIZE_EMAIL);
                                    $password  = password_hash($password, PASSWORD_DEFAULT);

                                    try{
                                        $statement = $this->pdo->prepare(
                                            "UPDATE users SET username = :username, firstname = :firstname, lastname = :lastname, email = :email, pass = :pass WHERE id = :id"
                                        );
                                        $statement->bindParam(':username', $username);
                                        $statement->bindParam(':firstname', $firstname);
                                        $statement->bindParam(':lastname', $lastname);
                                        $statement->bindParam(':email', $email);
                                        $statement->bindParam(':pass', $password);
                                        $statement->bindParam(':id', $id);
                                        $statement->execute();
                                        
                                    }
                                    catch(Exception $e)
                                    {
                                        die($e->getMessage());
                                    }
                                }
                                else{
                                    $message = "<script>alert('Passwords must match and should not be less than six(6) characters');</script>";
                                    view('profile', compact('message'));
                                }
                            }
                            else{
                                $message = "<script>alert('Incorrect Password');</script>";
                                view('profile', compact('message'));
                            }
                        }
                        else{
                            $message = "<script>alert('Email already exists');</script>";
                            view('profile', compact('message'));
                        }
                    }
                    else{
                        $message = "<script>alert('Invalid email format');</script>";
                        view('profile', compact('message'));
                    }
                }
                else {
                    $message = "<script>alert('Invalid name format');</script>";
                    view('profile', compact('message'));
                }
            }
            else{
                $message = "<script>alert('Username already exists');</script>";
                view('profile', compact('message'));
            }
        }
        else{
            $message = "<script>alert('Invalid Username');</script>";
            view('profile', compact('message'));
        }
    }

    private function sanitize_string($arg)
    {
        return filter_var($arg, FILTER_SANITIZE_STRING);
    }

    private function fetchData($username)
    {
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindParam(':username', $username);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    private function isUsernameExists($username)
    {
        $statement = $this->pdo->prepare("SELECT username FROM users WHERE username = :username");
        $statement->bindParam(':username', $username);
        $statement->execute();

        return $statement->fetch();
    }

    private function isEmailExists($email)
    {
        $statement = $this->pdo->prepare("SELECT email FROM users WHERE email = :email");
        $statement->bindParam(':email', $email);
        $statement->execute();

        return $statement->fetch();
    }

    private function isnameValid($name)
    {
        if (preg_match("/^[a-zA-Z]{3,30}$/", $name)) // Name should contain only letters and should be at least 3 characters
        {
            return true;
        }
    }

    private function isEmailValid($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
        {
            return true;
        }
    }

    private function isUsernameValid($username)
    {
        if (preg_match("/^[a-zA-Z]{3,10}([0-9]{0,5})$/", $username)) //Username should start with at least 3 letters and can contain numbers
        {
            return true;
        }
    }

    private function isPasswordValid($password, $cpassword)
    {
        if ($password === $cpassword)
        {
            if (preg_match("/^[a-zA-Z0-9]{6,15}$/", $password)) //Password should not be less than 6 characters
            {
                return true;
            }
        }
    }
}

$auth = new User(
    App::get('database')
);