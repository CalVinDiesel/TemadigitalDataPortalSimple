<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { padding: 20px; border: 1px solid #eee; border-radius: 10px; max-width: 600px; }
        .header { font-size: 20px; font-weight: bold; margin-bottom: 20px; color: #6366f1; }
        .field { margin-bottom: 10px; }
        .label { font-weight: bold; }
        .btn { display: inline-block; padding: 10px 20px; background: #6366f1; color: white !important; text-decoration: none; border-radius: 5px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">New Submission Received: {{ $submission->project_name }}</div>
        
        <div class="field"><span class="label">User:</span> {{ $submission->user->name }} ({{ $submission->user->email }})</div>
        <div class="field"><span class="label">Category:</span> {{ $submission->category }}</div>
        <div class="field"><span class="label">Camera:</span> {{ $submission->camera_config }}</div>
        <div class="field"><span class="label">Outputs Requested:</span> {{ $submission->output_category }}</div>
        <div class="field"><span class="label">Image Metadata:</span> {{ $submission->image_metadata }}</div>
        
        <div class="field" style="margin-top: 20px;">
            <span class="label">Dataset Link:</span><br>
            <a href="{{ $submission->google_drive_link }}">{{ $submission->google_drive_link }}</a>
        </div>

        <div class="field" style="margin-top: 20px;">
            <span class="label">Description:</span><br>
            {{ $submission->description ?: 'No description provided.' }}
        </div>

        <a href="{{ url('/admin/submissions') }}" class="btn" style="color: #ffffff; text-decoration: none;">Process in 3DHub Admin</a>
    </div>
</body>
</html>
