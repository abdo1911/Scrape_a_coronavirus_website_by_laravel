<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Scraper;
use Goutte\Client;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\Driver\Monitoring\removeSubscriber;
use function PHPUnit\Framework\throwException;

class ScraperContoller extends Controller
{
    private $results = array();

    public function show()
    {
        [$status,$data] = $this->fetchData();
        $cases=DB::select("select * from scrapers where id = 1");
        if(!$status)
        {
            $data = [];
        }
        //$this->saveToDatabase($data);
        return view('scraper', compact('data','cases'));
    }

    public final function fetchData(): array
    {
        try {
            $client = new Client();
            $url = 'https://www.worldometers.info/coronavirus/';
            $page = $client->request('GET', $url);

            $page->filter('#maincounter-wrap')->each(function ($item) {
                $this->results[$item->filter('h1')->text()] = $item->filter('.maincounter-number')->text();
            });

            $result = $this->results;
            if(!$result)
            {
                throw new \Exception('no data to fetch');
            }
            return [true,$result];
        }
        catch (\Exception $e)
        {
            return [false,'site is down'];
        }
    }

    public function scraper() : void
    {
        [$status,$result] = $this->fetchData();
        if(!$status)
        {
            report($result);
            return ;
        }
        self::saveToDatabase($result);
    }

    public final static function saveToDatabase(array $data): bool
    {
        [$cases, $death, $recovered] = array_values($data);
        return Scraper::create(['Coronavirus_Cases' => $cases, 'Deaths' => $death, 'Recovered' => $recovered])->save();
    }

    public function store()
    {
        try {
            $data = $this->fetchData();
            $this->saveToDatabase($data);
            return redirect()->route('/')->with('Status', "saved Succussfuly");

        } catch (\Exception $e) {
            //return response()->json($e);
            return redirect()->back()->with('status', "faild");
        }
    }

    public function information()
    {
        $results = Scraper::orderBy('created_at','desc')->paginate(10);
        return view('kolo',compact('results'));
        //$lastRecordDate = Scraper::all('Deaths')->max('Deaths');
        //dd($lastRecordDate);
        //$lastRecordDate = Scraper::all('Deaths')->min('Deaths');
        //dd($lastRecordDate);
    }

    public function max_cases()
    {
        $max_case = Scraper::all('Coronavirus_Cases')->max('Coronavirus_Cases');
        return view('maximum_cases',compact('max_case'));
    }

    public function max_death()
    {
        $max_death = Scraper::all('Deaths')->max('Deaths');
        return view('maximum_death',compact('max_death'));
    }

    public function max_recovered()
    {
        $max_reco = Scraper::all('Recovered')->max('Recovered');
        return view('maximum_recoverd',compact('max_reco'));
    }

}
