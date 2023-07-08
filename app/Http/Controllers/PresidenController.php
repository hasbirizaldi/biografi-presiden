<?php

namespace App\Http\Controllers;

use pagination;
use App\Models\Presiden;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PresidenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {

        $presidents = Presiden::first()->when(request()->query('search'), function($query){

            $search = request()->query('search');
            return $query->where('nama_tokoh', 'LIKE', "%{$search}%");
        })->paginate(5);


        return view('biografi.index', compact('presidents'));


        // $search = request()->query('search'); 
        // if($request->filled('search')){
        //     $presidents = Presiden::search($request->search)->paginate(5);
        // }else{
        //     $presidents = Presiden::latest()->paginate(5);
        // }
        // $presidents = Presiden::latest()->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('biografi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
         $this->validate($request, [
            'nama_tokoh'               =>'required',
            'image'                 => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'orientasi'             => 'required',
            'peristiwa_penting'     => 'required',
            'reorientasi'           => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/presidens', $image->hashName());

        Presiden::create([
            'nama_tokoh'=>$request->nama_tokoh,
            'image'     => $image->hashName(),
            'orientasi'     => $request->orientasi,
            'peristiwa_penting'   => $request->peristiwa_penting,
            'reorientasi'     => $request->reorientasi,

        ]);

        return redirect()->route('presiden.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $presiden = Presiden::findOrFail($id);
        
        

        return view('biografi.show', compact('presiden'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $presiden = Presiden::findOrFail($id);

        return view('biografi.edit', compact('presiden'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_tokoh'               =>'required',
            'image'                 => 'image|mimes:jpeg,jpg,png|max:2048',
            'orientasi'             => 'required',
            'peristiwa_penting'     => 'required',
            'reorientasi'           => 'required',
        ]);

        $presiden = Presiden::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/presidens', $image->hashName());

            //delete old image
            Storage::delete('public/presidens/'.$presiden->image);

            $presiden->update([
                'nama_tokoh'        => $request->nama_tokoh,
                'image'             => $image->hashName(),
                'orientasi'          => $request->orientasi,
                'peristiwa_penting'   => $request->peristiwa_penting,
                'reorientasi'        => $request->reorientasi
            ]);

        } else {

            $presiden->update([
                'nama_tokoh'         => $request->nama_tokoh,
                'orientasi'          => $request->orientasi,
                'peristiwa_penting'   => $request->peristiwa_penting,
                'reorientasi'           => $request->reorientasi
            ]);
        }

        //redirect to index
        return redirect()->route('presiden.index')->with(['success' => 'Data Berhasil Diubah!']);
    
    }

    public function destroy(string $id)
    {
        $presiden = Presiden::findOrFail($id);

        Storage::delete('public/presidens/'. $presiden->image);

        $presiden->delete();

        return redirect()->route('presiden.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    }