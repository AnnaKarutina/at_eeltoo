<?php namespace Halo;
use Aastategija\Questions;
class test extends Controller
{

    function index()
    {
        $this->questions = Questions::get();
    }

    function confirm()
    {
        $answers = $_POST;
        $correctAnswers = 0;
        foreach ($answers as $answer) {
            foreach ($answer as $value) {
                $check = get_first("SELECT answer_correct FROM answers WHERE answer_id = $value");
                if ($check['answer_correct'] == 1) {
                    $correctAnswers++;
                }
            }
        }
    }
}