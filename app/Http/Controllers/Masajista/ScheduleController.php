<?php

namespace App\Http\Controllers\Masajista;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WorkDay;

class ScheduleController extends Controller
{
    public function edit(){
        
        $days=[
            'Lunes', 'Martes', 'Miercoles',
            'Jueves', 'Viernes', 'Sabado', 'Domingo'
        ];

        return view('schedule', compact('days'));

    }

    public function store(Request $request){

        $active = $request->input('active') ?: [];
        $time_start = $request->input('time_start');
        $time_end = $request->input('time_end');

        for($i=0; $i<7; ++$i)
            WorkDay::updateOrCreate(
                [
                    'day' => $i,
                    'user_id' => auth()->id()
                ], 

                [
                    'active' =>  in_array($i, $active),
                    'time_start' =>  $time_start[$i],
                    'time_end' => $time_end[$i]
                ]

            );

            return back();

    }
}
