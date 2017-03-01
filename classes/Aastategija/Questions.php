<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 2/28/2017
 * Time: 12:59
 */

namespace Aastategija;


class Questions
{

    static function get() {
        q('SELECT * FROM questions JOIN answers USING (question_id) ORDER BY RAND()', $q);
        while ($row = mysqli_fetch_assoc($q)) {
            $questions[$row['question_id']]['question'] = $row['question'];
            $questions[$row['question_id']]['question_id'] = $row['question_id'];
            $questions[$row['question_id']]['answers'][] = [
                'id' => $row['answer_id'],
                'text' => htmlentities($row['answer_text'])
            ];
        }

        return array_slice($questions, 0, 10);
    }
}