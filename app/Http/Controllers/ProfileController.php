<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    //
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function show($id)
    {
        $user = $this->user->findOrFail($id);

        return view('profile.show')
                ->with('user',$user);
    }

}
