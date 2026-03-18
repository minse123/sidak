<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratPesanan\StoreSuratPesanan;
use App\Http\Requests\SuratPesanan\UpdateSuratPesanan;
use App\Models\SuratPesanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class SuratPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('viewAny', SuratPesanan::class);

        $suratPesanans = SuratPesanan::latest()->paginate(10);

        return view('surat-pesanan.index', compact('suratPesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create', SuratPesanan::class);

        return view('surat-pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuratPesanan $request): RedirectResponse
    {
        $this->authorize('create', SuratPesanan::class);

        SuratPesanan::create($request->validated());

        Alert::success('Berhasil', 'Data surat pesanan berhasil ditambahkan.');

        return redirect()->route('surat-pesanan.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratPesanan $suratPesanan): View
    {
        $this->authorize('update', $suratPesanan);

        return view('surat-pesanan.edit', compact('suratPesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuratPesanan $request, SuratPesanan $suratPesanan): RedirectResponse
    {
        $this->authorize('update', $suratPesanan);

        $suratPesanan->update($request->validated());

        Alert::success('Berhasil', 'Data surat pesanan berhasil diperbarui.');

        return redirect()->route('surat-pesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratPesanan $suratPesanan): RedirectResponse
    {
        $this->authorize('delete', $suratPesanan);

        $suratPesanan->delete();

        Alert::success('Berhasil', 'Data surat pesanan berhasil dihapus.');

        return redirect()->route('surat-pesanan.index');
    }
}
