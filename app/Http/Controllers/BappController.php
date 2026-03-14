<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bapp\StoreBappRequest;
use App\Http\Requests\Bapp\UpdateBappRequest;
use App\Models\Bapp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class BappController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('viewAny', Bapp::class);

        $bapp = Bapp::with('creator')->latest()->paginate(10);

        return view('bapp.index', compact('bapp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create', Bapp::class);

        return view('bapp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBappRequest $request): RedirectResponse
    {
        $this->authorize('create', Bapp::class);

        $data = $request->validated();

        if (! Auth::user()->isSuperAdmin()) {
            $data['status'] = 'Pending';
        }

        $data['created_by'] = Auth::id();

        Bapp::create($data);

        Alert::success('Berhasil', 'BAPP berhasil dibuat.');

        return redirect()->route('bapp.index');
    }

    public function edit(Bapp $bapp): View
    {
        $this->authorize('update', $bapp);

        return view('bapp.edit', compact('bapp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBappRequest $request, Bapp $bapp): RedirectResponse
    {
        $this->authorize('update', $bapp);

        $data = $request->validated();

        if (! Auth::user()->isSuperAdmin()) {
            $data['status'] = $bapp->status;
        }

        $bapp->update($data);

        Alert::success('Berhasil', 'BAPP berhasil diperbarui.');

        return redirect()->route('bapp.index');
    }

    public function verify(Bapp $bapp): RedirectResponse
    {
        $this->authorize('verify', $bapp);

        $bapp->update(['status' => 'Verifikasi']);

        Alert::success('Berhasil', 'BAPP berhasil diverifikasi.');

        return redirect()->route('bapp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bapp $bapp): RedirectResponse
    {
        $this->authorize('delete', $bapp);

        $bapp->delete();

        Alert::success('Berhasil', 'BAPP berhasil dihapus.');

        return redirect()->route('bapp.index');
    }
}
