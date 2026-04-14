@extends('layouts.app')

@section('content')
<div class="card" style="min-height: calc(100vh - 200px); display: flex; flex-direction: column;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h1 style="font-size: 1.5rem; color: var(--text);">Viewer: {{ $submission->project_name }}</h1>
        <a href="{{ route('dashboard') }}" class="btn" style="width: auto; padding: 6px 16px; border: 1px solid var(--border); color: var(--text-dim); text-decoration: none;">&larr; Back to Dashboard</a>
    </div>

    <div id="root" 
         data-tileset-url="{{ $submission->processed_data_path }}" 
         data-site-title="{{ $submission->project_name }}" 
         style="width: 100%; height: calc(100vh - 200px); min-height: 600px; border-radius: 20px; overflow: hidden; position: relative;">
    </div>
</div>

@push('scripts')
    @vite('resources/js/viewer/main.tsx')
@endpush
@endsection
