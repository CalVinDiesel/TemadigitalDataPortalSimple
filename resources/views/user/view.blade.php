@extends('layouts.app')

@section('content')
<div class="card" style="min-height: calc(100vh - 200px); display: flex; flex-direction: column;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h1 style="font-size: 1.5rem; color: var(--text);">Viewer: {{ $submission->project_name }}</h1>
        <a href="{{ route('dashboard') }}" class="btn" style="width: auto; padding: 6px 16px; border: 1px solid var(--border); color: var(--text-dim); text-decoration: none;">&larr; Back to Dashboard</a>
    </div>

    <div style="flex-grow: 1; background: rgba(0,0,0,0.4); border: 2px dashed var(--border); border-radius: 20px; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; color: var(--text-dim);">
        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="var(--primary)" viewBox="0 0 256 256"><path d="M232,208a16,16,0,0,1-16,16H40a16,16,0,0,1-16-16V48A16,16,0,0,1,40,32H216a16,16,0,0,1,16,16ZM40,48V208H216V48Zm128,80a40,40,0,1,1-40-40A40,40,0,0,1,168,128Zm-56,0a16,16,0,1,0,16-16A16,16,0,0,0,112,128ZM200,80V176a8,8,0,0,1-16,0V80a8,8,0,0,1,16,0ZM72,80V176a8,8,0,0,1-16,0V80a8,8,0,0,1,16,0Z"></path></svg>
        <h2 style="margin-top: 24px; color: var(--text);">3D Viewer Placeholder</h2>
        <p style="margin-top: 8px; max-width: 400px; line-height: 1.6;">The processed 3D model for <strong>{{ $submission->project_name }}</strong> will be displayed here soon.</p>
        <div style="margin-top: 40px; font-family: monospace; background: rgba(255,255,255,0.05); padding: 12px 24px; border-radius: 8px; border: 1px solid var(--glass-border);">
            DATA SOURCE: {{ $submission->processed_data_path ?: 'Wait For Processing' }}
        </div>
    </div>
</div>
@endsection
