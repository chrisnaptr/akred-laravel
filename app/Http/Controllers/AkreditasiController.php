<?php

namespace App\Http\Controllers;

//import Model "akreditasi
use App\Models\akreds;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class AkreditasiController extends Controller
{
   /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get akreds
        $akreditasi = akreds::latest()->paginate(10);

        //render view with akreds
        return view('akreditasi.index', compact('akreditasi'));
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('akreditasi.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'prodi'     => 'required|min:5',
            'sk'        => 'required|min:5',
            'awal'      => 'required|min:10',
            'akhir'     => 'required|min:10'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/akreditasi', $image->hashName());

        //create akreditasi
        akreds::create([
            'image'     => $image->hashName(),
            'prodi'     => $request->prodi,
            'sk'        => $request->sk,
            'awal'      => $request->awal,
            'akhir'     => $request->akhir
        ]);

        //redirect to index
        return redirect()->route('akreditasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get akreditasi by ID
        $akreditasi = akreds::findOrFail($id);

        //render view with akreditasi
        return view('akreditasi.show', compact('akreditasi'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get akreditasi by ID
        $akreditasi = akreds::findOrFail($id);

        //render view with akreditasi
        return view('akreditasi.edit', compact('akreditasi'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'prodi'     => 'required|min:5',
            'sk'        => 'required|min:5',
            'awal'      => 'required|min:10',
            'akhir'     => 'required|min:10'
        ]);

        //get akreditasi by ID
        $akreditasi = akreds::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/akreditasi', $image->hashName());

            //delete old image
            Storage::delete('public/akreditasi/'.$akreditasi->image);

            //update akreditasi with new image
            $akreditasi->update([
                'image'     => $image->hashName(),
                'prodi'     => $request->prodi,
                'sk'        => $request->sk,
                'awal'      => $request->awal,
                'akhir'     => $request->akhir
            ]);

        } else {

            //update akreditasi without image
            $akreditasi->update([
                'prodi'     => $request->prodi,
                'sk'        => $request->sk,
                'awal'      => $request->awal,
                'akhir'     => $request->akhir
            ]);
        }

        //redirect to index
        return redirect()->route('akreditasi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

     /**
     * destroy
     *
     * @param  mixed $akreditasi
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get akreditasi by ID
        $akreditasi = akreds::findOrFail($id);

        //delete image
        Storage::delete('public/akreditasi/'. $akreditasi->image);

        //delete akreditasi
        $akreditasi->delete();

        //redirect to index
        return redirect()->route('akreditasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    /**
     * index
     *
     * @return View
     */
    public function frontend(): View
    {
        //get akreds
        $akreditasi1 = akreds::latest()->paginate(10);

        //render view with akreds
        return view('akreditasi.frontend', compact('akreditasi'));
    }
}

