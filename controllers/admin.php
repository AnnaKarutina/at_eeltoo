<?php namespace Halo;

use Aastategija\Administrator;

class admin extends Controller
{
    public $requires_auth = false;
    public $template = 'auth';

    function AJAX_login()
    {
        // check if one of the form elements is missing
        if(empty($_POST['username'] || $_POST['password'])) {
            exit('Error. Missing required parameters.');
        }

        // clean the variables for protection against SQL injections
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);

        // check the username
        $user_id = get_one("SELECT user_id FROM users WHERE user_name = '$username'");
        if(empty($user_id)) {
            exit('Invalid username or password.');
        }

        // if for some reason there is no password
        $realPassword = get_one("SELECT password FROM users WHERE user_name = '$username' AND user_id = '$user_id'");
        if(empty($realPassword)) {
            exit('Error. Please try again later.');
        }

        // check if password matches the one in the database
        if(password_verify($password, $realPassword) != $realPassword) {
            exit('Invalid username or password.');
        }

        $_SESSION['user_id'] = $user_id;

        echo "ok";

    }

    function index()
    {
        $this->results = Administrator::getResults();
    }

    function practical() {
        $this->practical = true;
    }

    function theoretical()
    {
        $this->theoretical = true;
        $this->questions = Administrator::getQuestions();
    }

    function settings()
    {
        $this->properties = true;
    }

    function edit()
    {
        $admin_id = $this->params[0];
        $this->admin = get_first("SELECT * FROM admin WHERE admin_id = '{$admin_id}'");
    }

    function post_edit()
    {
        $data = $_POST['data'];
        insert('admin', $data);
    }

    function ajax_delete()
    {
        exit(q("DELETE FROM admin WHERE admin_id = '{$_POST['admin_id']}'") ? 'Ok' : 'Fail');
    }

}