<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 3/3/2017
 * Time: 00:57
 */

namespace Aastategija;


class Administrator
{
    static function getResults()
    {
        return get_all("SELECT *, (IF(results.theoretical_points>0, results.theoretical_points,0) + 
        IF(results.practical_points>0,results.practical_points,0)) AS sum 
        FROM results INNER JOIN users WHERE results.user_id = users.user_id ORDER BY 
        IF(results.practical_points >= 0, sum, results.practical_points) DESC");
    }

    static function getGradings()
    {
        return get_all("SELECT *, (IF(results.theoretical_points>0, results.theoretical_points,0) + 
        IF(results.practical_points>0,results.practical_points,0)) AS sum 
        FROM results INNER JOIN users WHERE results.user_id = users.user_id ORDER BY 
        date ASC");
    }

    static function getLog()
    {
        return get_all("SELECT *, (IF(results_log.theoretical_points>0, results_log.theoretical_points,0) + 
        IF(results_log.practical_points>0,results_log.practical_points,0)) AS sum 
        FROM results_log INNER JOIN users WHERE results_log.user_id = users.user_id ORDER BY 
        IF(results_log.practical_points >= 0, sum, results_log.practical_points) DESC");
    }

    static function getQuestions() {
        q('SELECT * FROM questions JOIN answers USING (question_id) ORDER BY question_id DESC', $q);
        while ($row = mysqli_fetch_assoc($q)) {
            $questions[$row['question_id']]['question'] = htmlentities($row['question']);
            $questions[$row['question_id']]['question_id'] = $row['question_id'];
            $questions[$row['question_id']]['answers'][] = [
                'id' => $row['answer_id'],
                'text' => htmlentities($row['answer_text'])
            ];
        }

        // slices questions by ten
        return $questions;
    }

    static function countQuestions() {
        $totalQuestions = q('SELECT * FROM questions');
        return $totalQuestions;

    }

    static function getPracticalQuestions() {
        $practicalQuestions = get_all('SELECT * FROM practical ORDER BY practical_id DESC');
        $oneTask['id'] = array();
        $oneTask['title'] = array();
        $oneTask['description'] = array();
        foreach ($practicalQuestions as $practicalQuestion) {
            $oneTask['id'][] = $practicalQuestion['practical_id'];
            $oneTask['title'][] = $practicalQuestion['practical_title'];
            $oneTask['description'][] = explode(';',$practicalQuestion['practical_text'] , -1);
        }

       /* echo '<pre>';
        print_r($oneTask);
        echo '</pre>';*/
        return $oneTask;
        //$practicalText = explode(';', , -1);
        //return $practicalText;
    }
}