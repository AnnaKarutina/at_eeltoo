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
        q('SELECT * FROM questions JOIN answers USING (question_id)', $q);
        while ($row = mysqli_fetch_assoc($q)) {
            $questions[$row['question_id']]['question'] = $row['question'];
            $questions[$row['question_id']]['answers'][] = [
                'id' => $row['answer_id'],
                'text' => $row['answer_text']
            ];

        }
        return $questions;
    }
}