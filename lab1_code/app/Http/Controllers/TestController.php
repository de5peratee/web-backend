<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Requests\ResultsVerification;
use App\Models\TestResult; // Импорт модели TestResult

class TestController extends Controller
{
    public function index(){
        return view('test');
    }

    public function store(Request $request){
        //dd($request->all());

        $valid_ver = new ResultsVerification();

        $valid_ver->setRule('q1', 'isCorrectQ1');
        $valid_ver->setRule('q2', 'isNotEmpty');
        $valid_ver->setRule('q3', 'isNotEmpty');
        $valid_ver->setRule('fullName', 'isFullName');
        $valid_ver->setRule('group', 'isNotEmpty');

        $valid_ver->validate($request->all());

        if (!empty($valid_ver->getErrors())) {
            return view('test', ['error_list' => $valid_ver->showErrors(), 'errors_data' => $valid_ver->getErrors()]);
        }
        else {
            $valid_ver->setAnswer('q1', 'Иваненко Владислав Игоревич');
            $valid_ver->setAnswer('q2', 'ВЕБ технологии');
            $valid_ver->setAnswer('q3', 'PHP и DB');

            $test_data = $request->all();

            $user_answers = ['q1' => $test_data['q1'],
                'q2' => $test_data['q2'],
                'q3' => $test_data['q3']];
            $answers = $valid_ver->getAnswers();
            $results = $valid_ver->checkAnswers($user_answers);

            $test = new Test;
            $test->fullName = $request->fullName;
            $test->group = $request->group;
            $test->q1 = $request->q1;
            $test->q2 = $request->q2;
            $test->q3 = $request->q3;
            $test->q1_correct = $results['q1'] == 'Верно';
            $test->q2_correct = $results['q2'] == 'Верно';
            $test->q3_correct = $results['q3'] == 'Верно';
            $test->save();

            return view('test', ['answers' => $answers, 'user_answers' => $user_answers, 'results'=> $results]);
        }
    }
}
