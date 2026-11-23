<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDokumenRequest;
use App\Http\Requests\StoreJadwalRequest;
use App\Models\Pengajuan;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\StoreSkripsiRequest;
use App\Http\Requests\UpdateDokumenRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use App\Http\Requests\UpdateSkripsiRequest;
use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = Pengajuan::all();

        return view('admin.pengajuan', compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create.pengajuan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengajuanRequest $request)
    {
        $validated = $request->validated();
        if($validated['jenis_pengajuan'] == 'dokumen' || $validated['jenis_pengajuan'] == 'skripsi'){
            return DB::transaction(function() use($request, $validated){
                $pengajuan = Pengajuan::create($validated);

                $request->merge([
                    'id_pengajuan' => $pengajuan->id,
                ]);

                [$formRequestClass, $controllerClass] = match ($validated['jenis_pengajuan']) {
                'dokumen' => [StoreDokumenRequest::class, DokumenController::class],
                'skripsi' => [StoreSkripsiRequest::class, SkripsiController::class],
                default   => [StoreJadwalRequest::class, JadwalController::class],
        };


                $subRequest = $formRequestClass::createFrom($request);
                $subRequest->setContainer(app())->validateResolved();

                return app($controllerClass)->store($subRequest);
            });
        }

        return DB::transaction(function () use ($request, $validated) {
        $pengajuan = Pengajuan::create($validated);

        $request->merge([
            'id_pengajuan' => $pengajuan->id,
        ]);

        $jadwalRequest = StoreJadwalRequest::createFrom($request);
        $jadwalRequest->setContainer(app())->validateResolved();

        $jadwalController = app(JadwalController::class);

        return $jadwalController->store($jadwalRequest);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanRequest $request, Pengajuan $pengajuan)
    {
        $validated = $request->validated();
        if($validated['jenis_pengajuan'] == 'dokumen' || $validated['jenis_pengajuan'] == 'skripsi'){
            return DB::transaction(function()use($validated, $request, $pengajuan){
            $pengajuan->update($validated);

            $request->merge([
                'id_pengajuan' => $pengajuan->id,
            ]);
            [$formRequestClass, $controllerClass, $relationName] = match ($validated['jenis_pengajuan']){
                'dokumen' => [UpdateDokumenRequest::class, DokumenController::class, 'dokumen'],
                'skripsi' =>[UpdateSkripsiRequest::class, SkripsiController::class, 'skripsi'],
            };
            $subRequest = $formRequestClass::createFrom($request);
            $subRequest->setContainer(app())->validateResolved();

            $secParameter = $pengajuan->$relationName;

            return app($controllerClass)->update($subRequest, $secParameter);

            });
        }

        return DB::transaction(function()use($validated, $request, $pengajuan){
        $pengajuan->update($validated);

        $request->merge([
            'id_pengajuan' => $pengajuan->id,
        ]);

        $jadwalRequest = UpdateJadwalRequest::createFrom($request);
        $jadwalRequest->setContainer(app()) ->validateResolved();

        $jadwal = $pengajuan->jadwal;

        $jadwalController = app(JadwalController::class);
        return $jadwalController->update($jadwalRequest, $jadwal);
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
