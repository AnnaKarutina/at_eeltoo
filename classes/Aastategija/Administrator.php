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
        return get_all("SELECT *, (results.theoretical_points + 
        IF(results.practical_points>0,results.practical_points,0)) AS sum 
        FROM results INNER JOIN users WHERE results.user_id = users.user_id ORDER BY 
        IF(results.practical_points >= 0, sum, results.practical_points) DESC");
    }

    static function getQuestions() {
        // questions are ordered by randomly
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
}