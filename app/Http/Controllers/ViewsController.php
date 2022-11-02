<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Views;

class ViewsController extends Controller
{
    public function index() {
        $data = array(
            'id' => "views",
            "views" => Views::all()
        );
        return view('Views.index')->with($data);
    }

    public function create() {
        return view('Views.createViews');
    }

    public function store(Request $request) {
        $view = new Views;
        $view->page = $request->input('pageName');
        $view->pageData = $request->input('data');
        $view->save();
        return redirect('Views');
    }

    public function show($id) {
        $data = array(
            'id' => "views",
            "views" => Views::find($id)
        );
        return view('Views.showViews')->with($data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
