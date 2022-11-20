<?php

namespace App\Http\Controllers;

use App\Models\Scraper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    //
    public function indexx(){

        /*$userData = Scraper::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');*/
            $cases=DB::select("select * from scrapers");
            /*dd($cases);*/

        return view('/chart', compact('cases'));
    }
    public function indexx1()
    {
        $cases=DB::select("select * from scrapers");
        return view('/chart1', compact('cases'));
    }
    public function indexx2()
    {
        $cases=DB::select("select * from scrapers");
        return view('/chart2', compact('cases'));
    }
}
