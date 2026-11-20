<?php

namespace App\Policies;

use App\Models\Plotting_Dosen_Pengajuan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlottingDosenPengajuanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Plotting_Dosen_Pengajuan $plottingDosenPengajuan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Plotting_Dosen_Pengajuan $plottingDosenPengajuan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Plotting_Dosen_Pengajuan $plottingDosenPengajuan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Plotting_Dosen_Pengajuan $plottingDosenPengajuan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Plotting_Dosen_Pengajuan $plottingDosenPengajuan): bool
    {
        return false;
    }
}
