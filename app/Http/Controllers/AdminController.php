<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function getProfile(Request $request)
    {
        return $request->user();
    }

}
