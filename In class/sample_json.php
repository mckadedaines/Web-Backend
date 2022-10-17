<?php
$json = '{
    "quiz": {
        "sport": {
            "q1": {
                "question": "Which one is a correct team name in NBA?",
                "options": [
                    "New York Bulls",
                    "Los Angeles Kings",
                    "Gem State Warriros",
                    "Houston Rocket"
                ],
                "answer": "Houston Rockets"
            }
        },
        "maths": {
            "q1": {
                "question": "5 + 7 = ?",
                "options": [
                    "10",
                    "11",
                    "12",
                    "13"
                ],
                "answer": "12"
            },
            "q2": {
                "question": "12 - 8 = ?",
                "options": [
                    "1",
                    "2",
                    "3",
                    "4"
                ],
                "answer": "4"
            }
        }
    }
}';
$quiz = json_decode($json,true);
print_r($quiz);
$question1 = $quiz['quiz']['sport']['q1'];
print $question1['question'];

foreach($question1['options'] as $key=>$value){
    print "$key $value<br>";
}


foreach($quiz['quiz']['maths'] as $value){
    print $value['question'];
    print "<br><select><option></option>";
        foreach($value['options'] as $num=>$option){
            print "<option value=$num>$option</option>";
        }
    print "</select><br>";
    // foreach($value['options'] as $option){
    //     print $option;
    // }
}

?>