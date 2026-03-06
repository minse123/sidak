Saya ingin membuat fitur CRUD untuk data PNBP.

Struktur tabel PNBP yang dibutuhkan:

- id
- no_dokumen
- nama_paket
- termin
- persentase_tarif
- nominal_tarif
- total_potongan
- status(Pending/Verifikasi)
- created_by (relasi ke tabel users)
- created_at
- updated_at

Ketentuan:

- total_potongan dihitung dari nominal_tarif × persentase_tarif / 100
- created_by diisi dari user yang sedang login
- gunakan Laravel migration, model, controller, dan blade
- manfaatkan design tabel nya menggunakan bootsrap5 dan menggunakan sass dan vite

Tolong buatkan:

1. Migration tabel pnbp
2. Model Pnbp
3. Controller PnbpController dengan method CRUD
4. Validasi request
5. Contoh form blade untuk create dan edit
