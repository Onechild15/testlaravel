<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class ReligionChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
		$result1 = DB::connection('odbc')->table('DV@CABLIB.IDKPYATA AS p')->join('DV@CABLIB.IDKAHLI AS a', 'p.NOASKAR', '=', 'a.NOASKAR')->select('a.AGAMA', DB::raw('count(*) as TOTAL'))->whereNotIn ('a.STSAHLI', [90,95,97,99])->groupBy('a.AGAMA')->pluck('TOTAL')->all();
		$result2 = DB::connection('odbc')->table('WRK2020.IDKPYATA  AS  p')->join('DV@CABLIB.IDKAHLI AS a', 'p.NOASKAR', '=', 'a.NOASKAR')->select('a.AGAMA', DB::raw('count(*) as TOTAL'))->whereNotIn ('a.STSAHLI', [90,95,97,99])->groupBy('a.AGAMA')->pluck('TOTAL')->all();
		$result3 = DB::connection('odbc')->table('WRK2019.IDKPYATA  AS  p')->join('DV@CABLIB.IDKAHLI AS a', 'p.NOASKAR', '=', 'a.NOASKAR')->select('a.AGAMA', DB::raw('count(*) as TOTAL'))->whereNotIn ('a.STSAHLI', [90,95,97,99])->groupBy('a.AGAMA')->pluck('TOTAL')->all();
		
        return Chartisan::build()
            ->labels(['','-','B','C','H','I','K','L','P','S','Y','0','1'])
            ->dataset('2021', $result1)
			->dataset('2020', $result2)
			->dataset('2019', $result3);
    }
}