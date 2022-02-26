<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weight;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Render able
     */
    public function index()
    {
        $weights = Auth::user()->weights()->get()->sortby('date');
        $lastDay = $weights->last();

        /* 最終日がある場合とない場合で場合分け */
        if(!empty($lastDay)){
            /* その日のデータがある場合とない場合で場合分け */
            if(date('Y-m-d') === $lastDay->date) {
                return redirect()->route('weights.index', [
                'weight' => $lastDay->id,
                ]);
            } else {
                return view('weights/create');
            }
        } else {
            return view('weights/create');
        }
    }
}
