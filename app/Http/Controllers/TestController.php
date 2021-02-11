<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;

class TestController extends Controller
{
    //
	function export()
	{
		$data = DB::connection('odbc')->table('DV@CABLIB.IDKPYATA AS p')->join('DV@CABLIB.IDKAHLI AS a', 'p.NOASKAR', '=', 'a.NOASKAR')->select('a.CABANG', DB::raw('count(*) as TOTAL'))->whereNotIn ('a.STSAHLI', [90,95,97,99])->groupBy('a.CABANG')->pluck('TOTAL','CABANG')->all();
		// share data to view
		$sharks = DB::connection('odbc')->table('DV@CABLIB.IDKPGKT')->select('*')->get();
      view()->share('sharks.index',$sharks);
		$pdf = PDF::loadView('sharks.index', ['sharks'=>$sharks]);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
	}
}
