<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Score;

class ScoreController extends Controller
{
    public function getUserScore() {

        $user = User::find();
        $user_scores = $user->scores;
        $response = [
            'message' => 'Success',
            'user_scores' => $user_scores 
        ];

        return response($response, 200);

    }
}
