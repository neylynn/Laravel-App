<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Qualify;
use App\Http\Requests\Admin\QualifyRequest;
use Flash;

class QualifyController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualifies = Qualify::orderBy('id', 'DESC')->paginate(25);
        return view('admin.qualify.index', compact('qualifies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.qualify.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QualifyRequest $request)
    {
        $data = $request->all();
        Qualify::create($data);
        Flash::success('Successfully created qualify');
        return redirect(route('qualify.index'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qualify = Qualify::find($id);
        if(empty($qualify)){
            Flash::error('qualify not found');
            return redirect(route('qualify.index'));
        }
        return view('admin.qualify.edit',compact('qualify'));
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
        $qualify = Qualify::find($id);
        if (empty($qualify)) {
            Flash::error('qualify not found!');
            return redirect(route('qualify.index'));
        }
        $data = $request->all();
        Qualify::find($id)->update($data);
        Flash::success('Successfully update qualify');
        return redirect(route('qualify.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Qualify::find($id)->delete();
        Flash::success('Successfully delete qualify');
        return redirect(route('qualify.index'));
    }
}
