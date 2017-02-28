<?php namespace Halo;

class welcome extends Controller
{
    public $requires_auth = false;

    function index()
    {
        $this->users = get_all("SELECT * FROM users");
    }

    function AJAX_register()
    {
        if(empty($_POST['firstName'] || $_POST['lastName'] || $_POST['social_id'] || $_POST['password'])) {
            exit('Error. Missing required parameters.');
        }

        if(time() < strtotime($this->settings['start'])) {
            var_dump(date('Y-m-d H:i:s', time()));
            var_dump(date('Y-m-d H:i:s', strtotime($this->settings['start'])));
            exit('You arrived too early.');
        }

        if(time() > strtotime($this->settings['end'])) {
            exit('You arrived too late.');
        }

        insert('guests', [
            'firstname' => $_POST['firstName'],
            'lastname' => $_POST['lastName'],
            'social_id' => $_POST['social_id']
        ]);

        echo "ok";
    }

    function POST_index()
    {
        echo "\$_POST:<br>";
        var_dump($_POST);
    }
}