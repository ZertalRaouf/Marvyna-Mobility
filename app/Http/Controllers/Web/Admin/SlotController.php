<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SlotController extends Controller
{


    public function index()
    {
        $slots = Slot::latest()->paginate(10)->withQueryString();
        return view('admin.slots.index',compact('slots'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:200|unique:slots,name',
                'note' => 'Sometimes|nullable|string|max:200'
            ]);
        $data['state'] = $request->has('state');
        try {
            Slot::create($data);
            session()->flash('success','Slot Has been Created Successfully');
            return redirect()->route('admin.slots.index');
        }catch (Exception $exception){
            session()->flash('error','Oops! Something went wrong, Please try again');
            return redirect()->back();
        }
    }


    public function show($id)
    {
        $slot = Slot::with('times')->findOrFail($id);
        $slots = Slot::active()->get();
        return view('admin.slots.show',compact('slot','slots'));
    }


    public function edit($id)
    {
        $slot = Slot::findOrFail($id);
        return view('admin.slots.edit',compact('slot'));
    }


    public function update($id,Request $request): RedirectResponse
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:200|unique:slots,name,'.$id,
                'note' => 'Sometimes|nullable|string|max:200'
            ]
        );
        $data['state'] = $request->has('state');
        try {
            $s = Slot::findOrFail($id);
            $s->update($data);
            session()->flash('success','Slot Has been Updated Successfully');
            return redirect()->route('admin.slots.show',$id);
        }catch (Exception $exception){
            session()->flash('error','Oops! Something went wrong, Please try again');
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        try {
            Slot::destroy($id);
            session()->flash('success','Slot Has been Deleted Successfully');
            return redirect()->route('admin.slots.index');
        }catch (Exception $exception){
            session()->flash('error','Oops! Something went wrong, Please try again');
            return redirect()->back();
        }
    }

}
