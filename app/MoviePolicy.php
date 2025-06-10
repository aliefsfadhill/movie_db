<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Movie;

class MoviePolicy
{
    public function delete(User $user, Movie $movie)
    {
        return $user->role === 'admin';
    }
}
