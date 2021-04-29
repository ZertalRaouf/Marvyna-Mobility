<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Circuit;
use App\Models\Roadmap;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoadmapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $rms = Roadmap::orderBy('created_at','desc')->paginate(10);
        return  view('admin.roadmaps.index',compact('rms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $cs = Circuit::all();
        return  view('admin.roadmaps.create',compact('cs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' =>'required|string',
            'circuit_id' =>'required|integer|exists:circuits,id',
        ]);

        Roadmap::create($data);
        session()->flash('success','success');
        return redirect()->route('admin.roadmaps.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Roadmap $roadmap
     * @return Response
     */
    public function show(Roadmap $roadmap)
    {
        return \view('admin.roadmaps.show',compact('roadmap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Roadmap $roadmap
     * @return Response
     */
    public function edit(Roadmap $roadmap)
    {
        $cs = Circuit::all();
        return \view('admin.roadmaps.edit',compact('roadmap','cs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Roadmap $roadmap
     * @return Response
     */
    public function update(Request $request, Roadmap $roadmap)
    {
        $data = $request->validate([
            'name' =>'required|string',
            'circuit_id' =>'required|integer|exists:circuits,id',
        ]);
        $roadmap->update($data);
        session()->flash('success','success');
        return redirect()->route('admin.roadmaps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Roadmap $roadmap
     * @return Response
     */
    public function destroy(Roadmap $roadmap)
    {
        $roadmap->delete();
        session()->flash('success','success');
        return redirect()->route('admin.roadmaps.index');
    }
}
