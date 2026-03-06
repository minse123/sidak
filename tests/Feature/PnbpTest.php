<?php

namespace Tests\Feature;

use App\Models\Pnbp;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PnbpTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $role = Role::create(['role_name' => 'user']);
        $this->user = User::factory()->create(['role_id' => $role->id]);

        $this->withoutMiddleware(ValidateCsrfToken::class);
    }

    public function test_can_access_pnbp_index(): void
    {
        $response = $this->actingAs($this->user)->get(route('pnbp.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pnbp.index');
    }

    public function test_can_create_pnbp(): void
    {
        $data = [
            'no_dokumen' => 'PNBP/2026/001',
            'nama_paket' => 'Paket A',
            'termin' => 'Termin 1',
            'persentase_tarif' => 10,
            'nominal_tarif' => 1000000,
            'status' => 'Pending',
        ];

        $response = $this->actingAs($this->user)->post(route('pnbp.store'), $data);

        $response->assertRedirect(route('pnbp.index'));
        $this->assertDatabaseHas('pnbps', [
            'no_dokumen' => 'PNBP/2026/001',
            'total_potongan' => 100000,
            'created_by' => $this->user->id,
        ]);
    }

    public function test_can_create_pnbp_with_zero_percentage(): void
    {
        $data = [
            'no_dokumen' => 'PNBP/2026/ZERO',
            'nama_paket' => 'Paket Zero',
            'termin' => 'Termin 1',
            'persentase_tarif' => 0,
            'nominal_tarif' => 1000000,
            'status' => 'Pending',
        ];

        $response = $this->actingAs($this->user)->post(route('pnbp.store'), $data);

        $response->assertRedirect(route('pnbp.index'));
        $this->assertDatabaseHas('pnbps', [
            'no_dokumen' => 'PNBP/2026/ZERO',
            'total_potongan' => 0,
            'created_by' => $this->user->id,
        ]);
    }

    public function test_can_update_pnbp(): void
    {
        $pnbp = Pnbp::create([
            'no_dokumen' => 'PNBP/2026/001',
            'nama_paket' => 'Paket A',
            'termin' => 'Termin 1',
            'persentase_tarif' => 10,
            'nominal_tarif' => 1000000,
            'total_potongan' => 100000,
            'status' => 'Pending',
            'created_by' => $this->user->id,
        ]);

        $updateData = [
            'no_dokumen' => 'PNBP/2026/001-EDIT',
            'nama_paket' => 'Paket A Edited',
            'termin' => 'Termin 1',
            'persentase_tarif' => 20,
            'nominal_tarif' => 2000000,
            'status' => 'Verifikasi',
        ];

        $response = $this->actingAs($this->user)->put(route('pnbp.update', $pnbp), $updateData);

        $response->assertRedirect(route('pnbp.index'));
        $this->assertDatabaseHas('pnbps', [
            'id' => $pnbp->id,
            'nama_paket' => 'Paket A Edited',
            'total_potongan' => 400000,
        ]);
    }

    public function test_can_delete_pnbp(): void
    {
        $pnbp = Pnbp::create([
            'no_dokumen' => 'PNBP/2026/001',
            'nama_paket' => 'Paket A',
            'termin' => 'Termin 1',
            'persentase_tarif' => 10,
            'nominal_tarif' => 1000000,
            'total_potongan' => 100000,
            'status' => 'Pending',
            'created_by' => $this->user->id,
        ]);

        $response = $this->actingAs($this->user)->delete(route('pnbp.destroy', $pnbp));

        $response->assertRedirect(route('pnbp.index'));
        $this->assertDatabaseMissing('pnbps', ['id' => $pnbp->id]);
    }
}
