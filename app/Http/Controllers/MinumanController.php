<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minuman;
use Illuminate\Support\Facades\Storage;

class MinumanController extends Controller
{
    public function select($id)
    {
        $data_minuman = Minuman::find($id);

        return view('minuman.edit', [
            'data_minuman' => $data_minuman,
        ]);
    }


    public function add_minuman(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'keterangan' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $foto = $request->file('foto')->store('foto', 'public');

        // Tambahkan data minuman
        Minuman::create([
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'keterangan' => $request->input('keterangan'),
            'foto' => $foto,
        ]);

        return redirect('/data-minuman')->with('alert', 'Data minuman berhasil ditambahkan.');
    }

    // UPDATE minuman
    // UPDATE minuman
public function update_minuman(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string',
        'harga' => 'required|numeric',
        'keterangan' => 'required|string',
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $data_minuman = Minuman::find($id);

    if (!$data_minuman) {
        // Handle the case where the data with $id is not found
        abort(404); // or redirect, show an error, etc.
    }

    // Inisialisasi variabel $path
    $path = $data_minuman->foto; // Default path is the current path

    // Proses upload foto
    if ($request->hasFile('foto')) {
        // If a new file is uploaded, store it and update the path
        $path = $request->file('foto')->store('foto');
        // Delete the previous file if it exists
        if ($data_minuman->foto && Storage::exists($data_minuman->foto)) {
            Storage::delete($data_minuman->foto);
        }
    }

    // Update data
    $data_minuman->nama = $request->input('nama');
    $data_minuman->harga = $request->input('harga');
    $data_minuman->keterangan = $request->input('keterangan');
    $data_minuman->foto = $path; // Update the path with the new or existing path
    $data_minuman->save();

    // Redirect with a message
    return redirect('/data-minuman')->with('alert', 'Data minuman berhasil diupdate.');
}


    // DELETE minuman
    public function delete_minuman($id)
    {
        $data_minuman = Minuman::findOrFail($id);

        if ($data_minuman->foto) {
            // Hapus foto dari penyimpanan jika ada
            Storage::delete($data_minuman->foto);
        }

        $data_minuman->delete();

        return redirect('/data-minuman')->with('alert', 'Data minuman berhasil didelete.');
    }
}
