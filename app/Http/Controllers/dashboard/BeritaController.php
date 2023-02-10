<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\User;
use App\ModelBerita;
use App\ModelBeritaKategori;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = ModelBerita::get();
        $kategori = ModelBeritaKategori::get();
        return view('dashboard.home.berita', compact('kategori', 'berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Request()->validate(
            [
                'judul' => 'required',
            ],
            [
                'judul.required' => 'Wajib diisi!!!',
            ],
        );

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
        // $image = $request->poto->store('thumbnail');
        ModelBerita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'body' => $request->body,
            'kategori_id' => $request->kategori_id,
            'user_id' => Auth::user()->id,
            'gambar' => 'gambar/' . $file_name,
            'is_active' => $request->is_active,
            'view' => '0',
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/berita');
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
        Request()->validate(
            [
                'judul' => 'required',
            ],
            [
                'judul.required' => 'Wajib diisi!!!',
            ],
        );

        $berita = ModelBerita::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($berita->gambar)) {
                Storage::delete($berita->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
            $berita->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'user_id' => Auth::id(),
                'gambar' => 'gambar/' . $file_name,
                'is_active' => $request->is_active,
            ]);
        } else {
            $berita->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'user_id' => Auth::id(),
                'is_active' => $request->is_active,
            ]);
        }

        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect('/admin/berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelBerita::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/berita');
    }

    //Kategori

    public function indexkategori()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createkategori()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storekategori(Request $request)
    {
        Request()->validate(
            [
                'nama_kategori' => 'required',
            ],
            [
                'email.nama_kategori' => 'Wajib diisi!!!',
            ],
        );

        ModelBeritaKategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showkategori($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editkategori($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatekategori(Request $request, $id)
    {
        Request()->validate(
            [
                'nama_kategori' => 'required',
            ],
            [
                'email.nama_kategori' => 'Wajib diisi!!!',
            ],
        );

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ];
        ModelBeritaKategori::find($id)->update($data);

        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect('/admin/berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroykategori($id)
    {
        ModelBeritaKategori::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/berita');
    }
}
