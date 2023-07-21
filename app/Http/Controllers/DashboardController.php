<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardFormRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  DashboardFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(DashboardFormRequest $request)
    {
        $data = $request->validated();

        dd($data['value_a']);
//        dd($request->validated());
    }
}
