<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Pengajuan;
use App\Models\Jadwal;

class ProfileController extends Controller
{
    public function index(): View
    {
        $counts = [
            'pending' => Pengajuan::where('is_active', true)->where('status_pengajuan', 'pending')->count(),
            'approved' => Pengajuan::where('is_active', true)->where('status_pengajuan', 'approved')
                ->whereDoesntHave('jadwal')->whereDoesntHave('seminar_proposal')->whereDoesntHave('skripsi')->count(),
            'today' => Jadwal::whereDate('tanggal_jadwal', now()->toDateString())->count()
                + \App\Models\Seminar_Proposal::whereDate('tanggal_sidang', now()->toDateString())->count()
                + \App\Models\Skripsi::whereDate('tanggal_sidang', now()->toDateString())->count(),
        ];

        return view('admin.dashboard', compact('counts'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ])->with('200');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
