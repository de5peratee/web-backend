<?php

namespace App\Http\Requests;

use App\Http\Requests\FormValidation;

class CustomFormValidation extends FormValidation {

    public function isCorrectQ1($data) {
        $error = $this->isNotEmpty($data);

        if ($error) {
            return $error;
        }

        $words = explode(' ', $data);
        if (count($words) < 3) {
            return "ФИО преподавателя должно содержать 3 слова";
        }
        return null;
    }
}
