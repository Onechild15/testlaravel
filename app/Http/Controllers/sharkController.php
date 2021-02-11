<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\View;
use App\Shark;
use HTML;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Session;

class sharkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		// get all the sharks
        //$sharks = shark::all();
		//$sharks = DB::connection('odbc')->table('DV@CABLIB.IDKPYATA AS p')->join('DV@CABLIB.IDKAHLI AS a', 'p.NOASKAR', '=', 'a.NOASKAR')->select('a.CABANG', DB::raw('count(*) as TOTAL'))->whereNotIn ('a.STSAHLI', [90,95,97,99])->groupBy('a.CABANG')->pluck('CABANG','TOTAL')->all();
		$sharks = DB::connection('odbc')->table('DV@CABLIB.IDKPGKT')->select('*')->get();
        // load the view and pass the sharks
		//return View::make('dashboard');
        return View::make('sharks/index')
            ->with('sharks', $sharks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return View::make('sharks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		// get the shark
        //$shark = shark::find($id);
		//$shark = DB::connection('odbc')->table('DV@CABLIB.IDKPGKT')->select('*')->where('KODPGKT','=',$id)->first();
		$shark = shark::where('KODPGKT', '=', $id)->firstOrFail();
		//var_dump($shark);

        // show the view and pass the shark to it
        return View::make('sharks/show')
            ->with('shark', $shark);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the shark
        //$shark = shark::find($id);
		//$shark = DB::connection('odbc')->table('DV@CABLIB.IDKPGKT')->select('*')->where('KODPGKT','=',$id)->first();
		$shark = Shark::where('KODPGKT', '=', $id)->firstOrFail();

        // show the edit form and pass the shark
        return View::make('sharks.edit')
            ->with('shark', $shark);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		//var_dump($request);
		//var_dump($id);
        //
		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'KODPGKT'       => 'required',
            'NAMAPGKT'      => 'required',
            'BILREK' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('sharks/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            //$shark = shark::find($id);
			//DB::connection('odbc')->table('DV@CABLIB.IDKPGKT')->update('update users set votes = 100 where name = ?', ['John']);
			$affectedRows  = shark::where('KODPGKT', '=', $id)->update(['KODPGKT' => $request->input('KODPGKT'),'NAMAPGKT' => $request->input('NAMAPGKT'),'BILREK' => $request->input('BILREK')]);
			var_dump($affectedRows);
			/*
			$shark = Shark::where('KODPGKT', '=', $id)->firstOrFail();
            $shark->KODPGKT       = $request->input('KODPGKT');
            $shark->NAMAPGKT      = $request->input('NAMAPGKT');
            $shark->BILREK 		  = $request->input('BILREK');
            $shark->save();
			*/
            // redirect
            Session::flash('message', 'Successfully updated shark!');
            return Redirect::to('sharks');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
