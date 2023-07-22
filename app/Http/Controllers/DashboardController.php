<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardFormRequest;
use App\Models\Value;
use App\Services\ServiceA;
use App\Services\ServiceB;
use App\Services\ServiceC;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{

    public function __construct(
        ServiceA $serviceA,
        ServiceB $serviceB,
        ServiceC $serviceC,
    )
    {}

    /**
     * Handle the incoming request.
     *
     * @param  DashboardFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(DashboardFormRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $test1 = ServiceA::calculateFormula($data['value_a'],$data['value_b'],$data['value_c']);
        $test2 = ServiceB::calculateFormula($data['value_a'],$data['value_b'],$data['value_c']);
        $test3 = ServiceC::calculateFormula($data['value_a'],$data['value_b'],$data['value_c']);
        $digits = [];
        array_push($digits, $test1,$test2,$test3);
        Value::create([
            'high' => max($digits),
            'middle' => array_sum($digits) / count($digits),
            'low' => min($digits)
        ]);
        return Redirect::route('dashboard')->with('status', 'form-updated');
    }
}
