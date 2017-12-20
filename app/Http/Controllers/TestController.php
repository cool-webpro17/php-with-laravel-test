<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Color;
use App\Vote;

class TestController extends Controller
{
    public function index(Request $request) {
    		$colors = Color::all();

    		return view('welcome', ['colors' => $colors]);
    }

    public function populateVotes(Request $request) {
    		$color_id = $request->input('color_id');

    		$count = 0;
    		if ($color_id == 'all') {
    				$count = Vote::sum('count');
    		} else {
		    		$vote = Vote::where('color_id', '=', $color_id)->first();

		    		if (empty($vote)) {
		    				$count = 0;
		    		} else {
		    				$count = $vote->count;
		    		}
	    	}

	    	return response()->json(['status' => 'success', 'count' => $count]);
    }
}
