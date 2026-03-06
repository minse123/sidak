<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pnbp\StorePnbpRequest;
use App\Http\Requests\Pnbp\UpdatePnbpRequest;
use App\Models\Pnbp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class PnbpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('viewAny', Pnbp::class);

        $pnbps = Pnbp::with('creator')->latest()->paginate(10);

        return view('pnbp.index', compact('pnbps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create', Pnbp::class);

        return view('pnbp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePnbpRequest $request): RedirectResponse
    {
        $this->authorize('create', Pnbp::class);

        $validated = $request->validated();

        if (! Auth::user()->isSuperAdmin()) {
            $validated['status'] = 'Pending';
        }

        $validated['total_potongan'] = $validated['persentase_tarif'] == 0 ? 0 : $validated['nominal_tarif'] * ($validated['persentase_tarif'] / 100);
        $validated['created_by'] = Auth::id();

        Pnbp::create($validated);
        Alert::success('Berhasil', 'Data PNBP berhasil ditambahkan.');

        return redirect()->route('pnbp.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pnbp $pnbp): View
    {
        $this->authorize('update', $pnbp);

        return view('pnbp.edit', compact('pnbp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePnbpRequest $request, Pnbp $pnbp): RedirectResponse
    {
        $this->authorize('update', $pnbp);

        $validated = $request->validated();

        $validated['total_potongan'] = $validated['persentase_tarif'] == 0 ? 0 : $validated['nominal_tarif'] * ($validated['persentase_tarif'] / 100);

        $pnbp->update($validated);

        Alert::success('Berhasil', 'Data PNBP berhasil diperbarui.');

        return redirect()->route('pnbp.index');
    }

    /**
     * Verify the specified resource in storage.
     */
    public function verify(Pnbp $pnbp): RedirectResponse
    {
        $this->authorize('verify', $pnbp);

        $pnbp->update(['status' => 'Verifikasi']);

        Alert::success('Berhasil', 'Data PNBP berhasil diverifikasi.');

        return redirect()->route('pnbp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pnbp $pnbp): RedirectResponse
    {
        $this->authorize('delete', $pnbp);

        $pnbp->delete();

        Alert::success('Berhasil', 'Data PNBP berhasil dihapus.');

        return redirect()->route('pnbp.index');
    }
}
