<?php

namespace App\Policies;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JadwalPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Jadwal $jadwal): bool
    {
        if($user->role === 'admin') {
            return true;
        }elseif($user->role === 'dosen') {
            return $jadwal->dosen->id_pengguna === $user->id;
        }elseif($user->role === 'mahasiswa') {
            return $jadwal->pengajuan?->mahasiswa->id_pengguna === $user->id;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->role === 'dosen'){
            return false;
        }
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Jadwal $jadwal): bool
    {
        if($user->role === 'admin') {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Jadwal $jadwal): bool
    {
        if($user->role === 'admin') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Jadwal $jadwal): bool
    {
        if($user->role === 'admin') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Jadwal $jadwal): bool
    {
        return false;
    }
}
