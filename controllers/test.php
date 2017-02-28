<?php namespace Halo;
use Aastategija\Questions;
class test extends Controller
{

    function index()
    {
        $this->questions = Questions::get();
    }
}