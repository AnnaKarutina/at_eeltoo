<?php namespace Halo;

use Aastategija\Questions;

class practical extends Controller
{

    function index()
    {
        $this->questions = Questions::get_practical();
    }

}