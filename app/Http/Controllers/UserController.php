<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showSubmitForm()
    {
        return view('user.submit');
    }

    public function viewProject(Submission $submission)
    {
        // Only allow user to view their own projects or admin to view all
        if (Auth::user()->role !== 'admin' && $submission->user_id !== Auth::id()) {
            abort(403);
        }

        return view('portal.3D-viewer', compact('submission'));
    }
}
