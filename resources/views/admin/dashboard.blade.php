@extends('layouts.app')

@section('content')
<div class="grid-2">
    <div class="card" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; height: 300px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#6366f1" viewBox="0 0 256 256"><path d="M229.19,213c-15.81-27.32-40.63-46.49-69.47-54.62a72,72,0,1,0-63.44,0c-28.84,8.13-53.66,27.3-69.47,54.62a8,8,0,1,0,13.85,8c18.79-32.47,50.14-53,87.34-53s68.55,20.53,87.34,53a8,8,0,1,0,13.85-8ZM72,104a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,104Z"></path></svg>
        <h2 style="margin-top: 20px;">User Management</h2>
        <p style="color: var(--text-dim); margin-bottom: 24px;">Create and manage user accounts</p>
        <a href="{{ route('admin.users') }}" class="btn btn-primary">Manage Users</a>
    </div>

    <div class="card" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; height: 300px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#ec4899" viewBox="0 0 256 256"><path d="M224,128v80a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V128A16,16,0,0,1,48,112H208A16,16,0,0,1,224,128Zm-16,0H48v80H208Zm-40-72v32a8,8,0,0,1-16,0V56H88v32a8,8,0,0,1-16,0V56A24,24,0,0,1,96,32h64A24,24,0,0,1,168,56Z"></path></svg>
        <h2 style="margin-top: 20px;">Submissions</h2>
        <p style="color: var(--text-dim); margin-bottom: 24px;">View and process data submissions</p>
        <a href="{{ route('admin.submissions') }}" class="btn btn-primary" style="background: linear-gradient(to right, var(--secondary), #f43f5e);">Manage Submissions</a>
    </div>
</div>
@endsection
