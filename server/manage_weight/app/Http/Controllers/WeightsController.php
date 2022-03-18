<?php

namespace App\Http\Controllers;

use App\Weight;
use App\Http\Requests\CreateWeights;
use App\Http\Requests\EditWeight;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WeightsController extends Controller
{
    public function first()
    {
        return view('weights/first');
    }

    public function index(Weight $weight)
    {
        $weights = Auth::user()->weights()->get()->sortBy('date');

        $previousWeight = $weights->where('date', '<', $weight->date)->last();
        $nextWeight = $weights->where('date', '>', $weight->date)->first();

        return view('weights/index', [
            'weight' => $weight,
            'previousDayWeight' => $previousWeight,
            'nextDayWeight' => $nextWeight,
        ]);
    }

    public function showCreateWeights()
    {
        return view('weights/create');
    }

    public function create(CreateWeights $request)
    {
        $weight = new Weight();
        $weight->date = $request->date;
        $weight->weight = $request->weight;
        $weight->fat_percentage = $request->fat_percentage;
        $weight->muscle_weight = $request->muscle_weight;
        if (!empty($request->fat_percentage)) {
            $weight->fat_weight = $request->weight * $request->fat_percentage * 0.01;
        };
        $weight->calorie_intake = $request->calorie_intake;

        Auth::user()->weights()->save($weight);

        return redirect()->route('weights.index', [
            'weight' => $weight->id
        ]);
    }

    public function showEditWeights(Weight $weight)
    {
        return view('weights/edit', [
            'weight' => $weight,
        ]);
    }

    public function edit(Weight $weight, EditWeight $request)
    {
        $weight->weight = $request->weight;
        $weight->fat_percentage = $request->fat_percentage;
        $weight->muscle_weight = $request->muscle_weight;
        if (!empty($request->fat_percentage)) {
            $weight->fat_weight = $request->weight * $request->fat_percentage * 0.01;
        };
        $weight->calorie_intake = $request->calorie_intake;

        Auth::user()->weights()->save($weight);

        return redirect()->route('weights.index', [
            'weight' => $weight->id
        ]);
    }

    public function delete(Weight $weight)
    {
        $weight->delete();

        $weights = Auth::user()->weights()->get();
        $lastWeight = $weights->sortby('date')->last();

        if (!empty($lastWeight)) {
            return redirect()->route('weights.index', [
                'weight' => $lastWeight->id,
            ]);
        } else {
            return redirect()->route('weights.create');
        }
    }

    public function manualList()
    {
        return view ('weights/manualList');
    }

    public function manualHome()
    {
        return view ('weights/manualHome');
    }

    public function manualWeightGraph()
    {
        return view('weights/manualWeightGraph');
    }

    public function manualWeightList()
    {
        return view('weights/manualWeightList');
    }


    public function showWeightsList(string $period)
    {
        #週刊リスト用データ
        $lastWeekDay = new Carbon('-7 days');
        $lastWeekDays = $this->getDatesOfPeriod($lastWeekDay);

        #月間リスト用データ
        $lastMonthDay = new Carbon('last month');
        $lastMonthDays = $this->getDatesOfPeriod($lastMonthDay);

        return view('weights/weightsList', [
            'lastWeekDay' => $lastWeekDay,
            'lastWeekDays' => $lastWeekDays,
            'lastMonthDay' => $lastMonthDay,
            'lastMonthDays' => $lastMonthDays,
            'period' => $period,
        ]);
    }

    public function showWeightGraph(string $dataType, string $period)
    {
        $lastWeekDay = new Carbon('-7 days');
        $oneMonthBeforeDay = new Carbon('last month');
        $threeMonthBefore = new Carbon('-3 month');
        $halfYearBefore = new Carbon('-6 month');
        $oneYearBefore = new Carbon('last year');

        if($period === 'week') {
            $days = $this->getDatesOfPeriod($lastWeekDay);
            $displayPeriod = '(週間)';
        } elseif ($period === 'month') {
            $days = $this->getDatesOfPeriod($oneMonthBeforeDay);
            $displayPeriod = '(月間)';
        } elseif ($period === 'threeMonth') {
            $days = $this->getDatesOfPeriod($threeMonthBefore);
            $displayPeriod = '(3か月間)';
        } elseif ($period === 'halfYear') {
            $days = $this->getDatesOfPeriod($halfYearBefore);
            $displayPeriod = '(半年間)';
        } elseif ($period === 'oneYear') {
            $days = $this->getDatesOfPeriod($oneYearBefore);
            $displayPeriod = '(年間)';
        }

        $eachGraphData = $this->getEachGraphData($days, $dataType);

        return view('weights/weightGraph', [
            'eachDate' => $eachGraphData['eachDate'],
            'dataLabel' => $eachGraphData['dataLabel'],
            'eachWeightData' => $eachGraphData['eachWeightData'],
            'displayPeriod' => $displayPeriod,
            'dataType' => $dataType,
            'period' => $period,
        ]);
    }

    private function getDatesOfPeriod($beforeDay)
    {
        return Auth::user()->weights()->whereDate('date', '>=', $beforeDay->format('Y/m/d'))->get()->sortby('date');
    }

    private function getEachGraphData($days, $dataType)
    {
        if (count($days) === 0) {
            $eachDate[] = '';
            $eachWeightData[] = '';
            $dataLabel = '';
        } else {
            foreach ($days as $day) {
                $eachDate[] = date('m/d', strtotime($day->date));
                if ($dataType === 'bodyWeight') {
                    $eachWeightData[] = $day->weight;
                    $dataLabel = '体重';
                } elseif ($dataType === 'fatPercentage') {
                    $eachWeightData[] = $day->fat_percentage;
                    $dataLabel = '体脂肪率';
                } elseif ($dataType === 'muscleWeight') {
                    $eachWeightData[] = $day->muscle_weight;
                    $dataLabel = '筋肉量';
                } elseif ($dataType === 'fatWeight') {
                    $eachWeightData[] = $day->fat_weight;
                    $dataLabel = '脂肪量';
                } elseif ($dataType === 'calorieIntake') {
                    $eachWeightData[] = $day->calorie_intake;
                    $dataLabel = '摂取カロリー';
                } else {
                    abort(404);
                }
            }
        }

        return [
            'eachDate' => $eachDate,
            'eachWeightData' => $eachWeightData,
            'dataLabel' => $dataLabel,
        ];
    }
}
