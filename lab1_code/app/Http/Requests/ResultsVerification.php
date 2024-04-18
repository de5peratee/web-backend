<?php

namespace App\Http\Requests;
use App\Http\Requests\CustomFormValidation;

class ResultsVerification extends CustomFormValidation {
    private $answers = [];
    public function getAnswers() {
        return $this->answers;
    }

    public function setAnswer($question, $answer) {
        $this->answers[$question] = $answer;
    }

    public function checkAnswer($question, $userAnswer) {
        if ($this->answers[$question] == $userAnswer) {
            return "Верно";
        } else {
            return "Неверно";
        }
    }

    public function checkAnswers($userAnswers) {
        $results = [];
        foreach ($userAnswers as $question => $userAnswer) {
            $results[$question] = $this->checkAnswer($question, $userAnswer);
        }
        return $results;
    }
}
