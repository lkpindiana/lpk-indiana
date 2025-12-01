<?php

namespace App\Http\Controllers;

use App\Models\siswaModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use function PHPUnit\Framework\fileExists;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $siswa = siswaModel::where('nama', 'like', "%{$cari}%")->orderBy('nama', 'asc')->paginate(10);
        return view('siswa.index', compact('siswa', 'cari'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'                => 'string|required|max:50',
            'jenis_kelamin'       => 'required',
            'tempat_lahir'        => 'required',
            'tanggal_lahir'       => 'date|required',
            'alamat'              => 'string|required|max:100',
            'telepon'             => 'numeric|required|max:999999999999',
            'pendidikan_terakhir' => 'required',
            'mapel'               => 'required',
            'foto'                => 'required|image'
        ]);

        $foto = $request->file('foto');
        $namaFoto = time() . '_' . str_replace(' ', '-', strtolower($request->nama)) . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('assets/img/foto-siswa'), $namaFoto);

        $data = [
            'nama'                => strtolower($request->nama),
            'jenis_kelamin'       => strtolower($request->jenis_kelamin),
            'tempat_lahir'        => strtolower($request->tempat_lahir),
            'tanggal_lahir'       => strtolower($request->tanggal_lahir),
            'alamat'              => strtolower($request->alamat),
            'telepon'             => strtolower($request->telepon),
            'telepon'             => strtolower($request->telepon),
            'pendidikan_terakhir' => strtolower($request->pendidikan_terakhir),
            'mapel'               => strtolower($request->mapel),
            'foto'                => $namaFoto
        ];

        siswaModel::create($data);
        return redirect()->route('siswa.index')->with('success', 'data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = siswaModel::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = siswaModel::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = siswaModel::findOrFail($id);

        $request->validate([
            'nama'                => 'string|required|max:50',
            'jenis_kelamin'       => 'required',
            'tempat_lahir'        => 'required',
            'tanggal_lahir'       => 'date|required',
            'alamat'              => 'string|required|max:100',
            'telepon'             => 'numeric|required|max:999999999999',
            'pendidikan_terakhir' => 'required',
            'mapel'               => 'required',
            'foto'                => 'image'
        ]);

        $foto           = $request->file('foto');
        $fotoLama       = $request->fotoLama;
        $folder         = public_path('assets/img/foto-siswa/');
        $namaFileBaru   = time() . '_' . str_replace(' ', '-', strtolower($request->nama));

        if ($foto) {
            if ($fotoLama && file_exists($folder . $fotoLama)) {
                unlink($folder . $fotoLama);
            }

            $namaFoto = $namaFileBaru . '.' . $foto->getClientOriginalExtension();
            $foto->move($folder, $namaFoto);
        } else {
            $ext      = pathinfo($fotoLama, PATHINFO_EXTENSION);
            $namaFoto = $namaFileBaru . '.' . $ext;
            $oldPath  = $folder . $fotoLama;
            $newPath  = $folder . $namaFoto;

            if ($request->nama !== $siswa->nama && file_exists($oldPath)) {
                rename($oldPath, $newPath);
            }
        }

        $siswa->nama                = strtolower($request->nama);
        $siswa->jenis_kelamin       = strtolower($request->jenis_kelamin);
        $siswa->tempat_lahir        = strtolower($request->tempat_lahir);
        $siswa->tanggal_lahir       = strtolower($request->tanggal_lahir);
        $siswa->alamat              = strtolower($request->alamat);
        $siswa->telepon             = strtolower($request->telepon);
        $siswa->pendidikan_terakhir = strtolower($request->pendidikan_terakhir);
        $siswa->mapel               = strtolower($request->mapel);
        $siswa->foto                = strtolower($namaFoto);
        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = siswaModel::findOrfail($id);

        if ($siswa->foto !== null) {
            unlink(public_path('assets/img/foto-siswa/' . $siswa->foto));
        }

        $siswa->delete();
        return redirect()->route('siswa.index')->with('delete', 'data berhasil di hapus');
    }


    public function export()
    {
        $data = [
            'text' => "contoh hasil"
        ];

        $pdf = Pdf::loadView('siswa.export', $data);
        return $pdf->stream('invoice.pdf');
    }
}
