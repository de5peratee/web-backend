<?php

namespace App\Http\Requests;

use DateTime;

class FormValidation {
    private $rules = [];
    private $errors = [];

    public function getErrors() {
        return $this->errors;
    }


    public function isNotEmpty($data) {
        if (empty($data)) {
            return "Поле не может быть пустым.";
        }
        return null;
    }


    public function isInteger($data) {
        if (!is_numeric($data) || intval($data) != $data) {
            return "Значение должно быть целым числом.";
        }
        return null;
    }

    public function isEmail($data) {
        $error = $this->isNotEmpty($data);

        if ($error) {
            return $error;
        }

        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return "Значение должно быть корректным email адресом.";
        }
        return null;
    }

    public function isAdult($data) {
        $error = $this->isNotEmpty($data);

        if ($error) {
            return $error;
        }

        $birthday = new DateTime($data);
        $today = new DateTime();
        $interval = $today->diff($birthday);
        $age = $interval->y;

        if ($age < 18) {
            return "Вам должно быть 18 лет или больше.";
        }

        return null;
    }

    public function isFullName($data) {
        $error = $this->isNotEmpty($data);

        if ($error) {
            return $error;
        }

        $words = explode(' ', $data);
        if (count($words) != 3) {
            return "Значение должно состоять из трех слов.";
        }
        foreach ($words as $word) {
            if (!preg_match('/^[a-zA-Zа-яА-Я]+$/u', $word)) {
                return "Слова должны содержать только латинские и русские буквы.";
            }
        }
        return null;
    }

    public function isPhoneNumber($data) {
        $error = $this->isNotEmpty($data);

        if ($error) {
            return $error;
        }

        if (!preg_match('/^\+?[0-9]{10,13}$/', $data)) {
            return "Значение должно быть корректным номером телефона.";
        }
        return null;
    }

    public function isMessage($data) {
        $error = $this->isNotEmpty($data);

        if ($error) {
            return $error;
        }

        $words = explode(' ', $data);
        if (count($words) > 20) {
            return "Сообщение должно содержать не более 20 слов.";
        }
        return null;
    }

    public function setRule($field_name, $validator_name) {
        $this->rules[$field_name] = $validator_name;
    }

    public function validate($post_array) {
        foreach ($this->rules as $field_name => $validator_name) {
            $error = $this->$validator_name($post_array[$field_name]);
            if ($error !== null) {
                $this->errors[$field_name] = $error;
            }
        }
    }

    public function showErrors() {
        $html = "";
        foreach ($this->errors as $field_name => $error) {
            $html .= "$field_name</p>$error</li>";
        }
        $html .= "";
        return $html;
    }
}
