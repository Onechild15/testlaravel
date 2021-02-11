<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class MilitarybranchesChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
		$result1 = DB::connection('odbc')->table('DV@CABLIB.IDKPYATA AS p')->join('DV@CABLIB.IDKAHLI AS a', 'p.NOASKAR', '=', 'a.NOASKAR')->select('a.CABANG', DB::raw('count(*) as TOTAL'))->whereNotIn ('a.STSAHLI', [90,95,97,99])->groupBy('a.CABANG')->pluck('TOTAL','CABANG')->all();
		$result2 = DB::connection('odbc')->table('WRK2020.IDKPYATA  AS  p')->join('DV@CABLIB.IDKAHLI AS a', 'p.NOASKAR', '=', 'a.NOASKAR')->select('a.CABANG', DB::raw('count(*) as TOTAL'))->whereNotIn ('a.STSAHLI', [90,95,97,99])->groupBy('a.CABANG')->pluck('TOTAL','CABANG')->all();
		$result3 = DB::connection('odbc')->table('WRK2019.IDKPYATA  AS  p')->join('DV@CABLIB.IDKAHLI AS a', 'p.NOASKAR', '=', 'a.NOASKAR')->select('a.CABANG', DB::raw('count(*) as TOTAL'))->whereNotIn ('a.STSAHLI', [90,95,97,99])->groupBy('a.CABANG')->pluck('TOTAL','CABANG')->all();
		
		//print_r($result1[1]);
		//exit;
        return Chartisan::build()
            ->labels(['2021','2020', '2019'])
            ->dataset('Darat', [$result1[1],$result2[1],$result3[1]])
			->dataset('Laut', [$result1[2],$result2[2],$result3[2]])
			->dataset('Udara', [$result1[3],$result2[3],$result3[3]])
			->dataset(' ', [$result1[" "],$result2[" "],$result3[" "]]);
    }
}