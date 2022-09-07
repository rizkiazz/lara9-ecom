<?php

namespace App\Http\Controllers\Admin;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }
    public function create()
    {
        return view('admin.sliders.create');
    }
    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();
        $slider = new Slider();
        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];
        if($request->hasFile('image')){
            $path =  'uploads/sliders/'.$slider->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/sliders/', $filename);
            $slider->image = $filename;
        }
        $slider->status = $request->status == true ? '1' : '0';
        $slider->save();
        
        return redirect('admin/sliders')->with('message', 'Sliders Success Added');
    }
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }
    public function update(SliderFormRequest $request, Slider $slider)
    {
        $validatedData = $request->validated();
        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/sliders/', $filename);
            $slider->image = $filename;
        }
        $slider->status = $request->status == true ? '1' : '0';
        $slider->update();
        return redirect('admin/sliders')->with('message', 'Sliders Success Updated');
    }
    public function destroy(Slider $slider)
    {
       if ($slider->count() > 0){
        $path = 'uploads/sliders/'.$slider->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $slider->delete();
        return redirect('admin/sliders')->with('message', 'Slider Deleted Successfully');
       }
        return redirect('admin/sliders')->with('message', 'Failed To deleted');
    }
}
