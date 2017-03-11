<?php namespace Halo;

use Aastategija\Administrator;
use Aastategija\GetScores;

class scores extends Controller
{
    public $requires_auth = false;

    function index()
    {
        $this->scores = Administrator::getResults();
    }
}