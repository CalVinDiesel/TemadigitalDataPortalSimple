<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manageUsers()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users', compact('users'));
    }

    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'user',
        ]);

        return back()->with('success', 'User account created successfully!');
    }

    public function deleteUser(User $user)
    {
        if ($user->role === 'admin') {
            return back()->withErrors(['error' => 'Cannot delete admin account.']);
        }
        $user->delete();
        return back()->with('success', 'User account deleted successfully!');
    }

    public function manageSubmissions()
    {
        $submissions = Submission::with('user')->latest()->get();
        return view('admin.submissions', compact('submissions'));
    }

    public function updateSubmission(Request $request, Submission $submission)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,rejected',
            'processed_data_path' => 'nullable|string',
            'admin_drive_link' => 'nullable|url',
            'rejection_reason' => 'nullable|string',
        ]);

        $submission->update($validated);

        return back()->with('success', 'Submission updated successfully!');
    }
}
