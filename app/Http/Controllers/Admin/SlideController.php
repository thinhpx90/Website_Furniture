<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SlideServiceInterface;
use Illuminate\Http\Request;
use Session;

class SlideController extends Controller
{
    protected $slideService;

    /**
     * Undocumented function
     */
    public function __construct(SlideServiceInterface $slideService)
    {
        $this->slideService = $slideService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->slideService->GetSlide();
        return view('admin.slide.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $fileNameWithExtention = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenametostore = $fileName.'_'.time().'.'.$extension;
            $request->file('image')->storeAs('public/uploads', $filenametostore);
            $this->slideService->CreateSlide([
                'name' => $request->name,
                'link' => $request->link,
                'description' => $request->description,
                'image' => $filenametostore,
                'status' => 0,
            ]);
            Session::flash('success', 'Thêm mới thành công!');
            return redirect()->route('slide.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Thêm mới không thành công!');
            return back();
        }
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
        $slide = $this->slideService->GetDetail($id);
        return view('admin.slide.edit', compact('slide'));
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
        try {
            if (isset($request->image)) {
                $fileNameWithExtention = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenametostore = $fileName.'_'.time().'.'.$extension;
                $request->file('image')->storeAs('public/uploads', $filenametostore);
                $this->slideService->UpdateSlide($id, [
                    'name' => $request->name,
                    'link' => $request->link,
                    'description' => $request->description,
                    'image' => $filenametostore,
                ]);
            } else {
                $this->slideService->UpdateSlide($id, $request->all());
            }
            Session::flash('success', 'Sửa thành công!');
            return redirect()->route('slide.index');
        } catch (Exception $ex) {
            Session::flash('error', 'Sửa không thành công!');
            return back();
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
        try {
            $this->slideService->DeleteSlide($id);
            //Session::flash('success', 'Xóa thành công!');
            return response()->json([
                'message' => 'Xóa thành công'
            ]);
        } catch (Exception $ex) {
            //Session::flash('error', 'Xóa không thành công!');
            return response()->json([
                'message' => 'Xóa không thành công'
            ]);
        }
    }
}
