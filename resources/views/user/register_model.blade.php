@extends('layouts.app')

@section('content')
<div class="glass-card" style="max-width: 600px; margin: 0 auto;">
    <div class="logo-section" style="text-align: center;">
        <h1 style="font-size: 1.8rem; line-height: 1.2; margin-bottom: 8px;">Register Existing 3D Model</h1>
        <p>Provide your existing 3D tileset URLs to use our analysis tools</p>
    </div>

    <form method="POST" action="{{ route('user.register_model.submit') }}">
        @csrf
        <div class="form-group">
            <label for="project_name">Project Name *</label>
            <input type="text" name="project_name" id="project_name" value="{{ old('project_name') }}" required placeholder="e.g. My External Site Scan">
        </div>

        <div class="form-group">
            <label for="description">Description (Optional)</label>
            <textarea name="description" id="description" rows="2" placeholder="Describe the project...">{{ old('description') }}</textarea>
        </div>

        <div style="background: rgba(255,255,255,0.03); padding: 20px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); margin-bottom: 25px;">
            <label style="display: block; font-size: 0.8rem; color: var(--secondary); text-transform: uppercase; letter-spacing: 1px; font-weight: 700; margin-bottom: 15px;">Data Source Method</label>
            <div style="display: flex; gap: 10px;">
                <button type="button" id="btnUrl" onclick="switchMethod('url')" style="flex: 1; padding: 12px; background: var(--primary); border: none; border-radius: 8px; color: white; cursor: pointer; font-weight: 600; transition: all 0.3s;">
                    I have a Direct URL
                </button>
                <button type="button" id="btnFiles" onclick="switchMethod('files')" style="flex: 1; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white; cursor: pointer; font-weight: 600; transition: all 0.3s;">
                    Send Files (G-Drive/SFTP)
                </button>
            </div>
        </div>

        <!-- SECTION 1: DIRECT URLS -->
        <div id="sectionUrl">
            <div style="background: rgba(59, 130, 246, 0.05); padding: 20px; border-radius: 12px; border: 1px solid rgba(59, 130, 246, 0.2); margin-bottom: 25px;">
                <h3 style="font-size: 0.75rem; color: #3b82f6; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                    External Data Links
                </h3>

                <div class="form-group">
                    <label>3D Tiles URL (tileset.json) <span style="color: #ef4444">*</span></label>
                    <input type="url" name="processed_data_path" placeholder="https://example.com/tiles/tileset.json" value="{{ old('processed_data_path') }}" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Terrain URL (Optional)</label>
                    <input type="url" name="terrain_path" placeholder="https://example.com/terrain/" value="{{ old('terrain_path') }}" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Building URL (Optional)</label>
                    <input type="url" name="building_path" placeholder="https://example.com/building.geojson" value="{{ old('building_path') }}" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Orthophoto URL (Optional)</label>
                    <input type="url" name="orthophoto_path" placeholder="https://example.com/ortho/" value="{{ old('orthophoto_path') }}" autocomplete="off">
                </div>
            </div>
        </div>

        <!-- SECTION 2: SEND FILES -->
        <div id="sectionFiles" style="display: none;">
            <div style="background: rgba(16, 185, 129, 0.05); padding: 20px; border-radius: 12px; border: 1px solid rgba(16, 185, 129, 0.2); margin-bottom: 25px;">
                <h3 style="font-size: 0.75rem; color: #10b981; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                    Transfer Processed Files
                </h3>
                
                <p style="color: var(--text-dim); font-size: 0.8rem; margin-bottom: 20px;">Use this option if you have the processed 3D model folder but need us to host it on our servers.</p>

                <div class="form-group">
                    <label>Google Drive Folder Link</label>
                    <input type="url" name="google_drive_link" placeholder="https://drive.google.com/..." value="{{ old('google_drive_link') }}" autocomplete="off">
                    <small style="color: var(--text-dim); display: block; margin-top: 4px;">Please ensure the link is set to <span style="color: #3b82f6; font-weight: bold;">"Anyone with the link"</span>.</small>
                </div>

                <div style="margin: 25px 0; display: flex; align-items: center; gap: 15px;">
                    <div style="flex: 1; height: 1px; background: rgba(255,255,255,0.1);"></div>
                    <span style="font-size: 0.7rem; color: var(--text-dim); text-transform: uppercase; letter-spacing: 1px;">OR USE SFTP</span>
                    <div style="flex: 1; height: 1px; background: rgba(255,255,255,0.1);"></div>
                </div>

                    <div style="display: grid; grid-template-columns: 3fr 1fr; gap: 15px;">
                        <div class="form-group">
                            <label>Host (IP or Domain) <span style="color: #ef4444">*</span></label>
                            <input type="text" name="sftp_host" placeholder="e.g. 122.45.67.89" value="{{ old('sftp_host') }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Port</label>
                            <input type="number" name="sftp_port" placeholder="22" value="{{ old('sftp_port', 22) }}" autocomplete="off">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div class="form-group">
                            <label>Username <span style="color: #ef4444">*</span></label>
                            <input type="text" name="sftp_username" placeholder="sftp_user" value="{{ old('sftp_username') }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Password <span style="color: #ef4444">*</span></label>
                            <input type="password" name="sftp_password" placeholder="........" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Data Path (Optional)</label>
                        <input type="text" name="sftp_path" placeholder="e.g. /home/data/project1" value="{{ old('sftp_path') }}" autocomplete="off">
                    </div>
            </div>
        </div>

        <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; padding: 15px; display: flex; gap: 15px; align-items: flex-start; margin-bottom: 25px;">
            <div style="background: rgba(59, 130, 246, 0.1); color: #3b82f6; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 0.8rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v32A8,8,0,0,1,144,176Zm-28-80a12,12,0,1,1,12,12A12,12,0,0,1,116,96Z"></path></svg>
            </div>
            <p style="margin: 0; font-size: 0.75rem; color: var(--text-dim); line-height: 1.5;">
                Your model will be added to your dashboard after a quick verification by our Admin team.
            </p>
        </div>

        <div style="display: flex; gap: 15px;">
            <a href="{{ route('dashboard') }}" class="btn" style="flex: 1; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); text-align: center; text-decoration: none; padding: 14px; color: white;">Cancel</a>
            <button type="submit" class="btn btn-primary" style="flex: 2; padding: 14px;">Register Model</button>
        </div>
    </form>
</div>

<script>
    function switchMethod(method) {
        const btnUrl = document.getElementById('btnUrl');
        const btnFiles = document.getElementById('btnFiles');
        const sectionUrl = document.getElementById('sectionUrl');
        const sectionFiles = document.getElementById('sectionFiles');

        if (method === 'url') {
            btnUrl.style.background = 'var(--primary)';
            btnUrl.style.border = 'none';
            btnFiles.style.background = 'rgba(255,255,255,0.05)';
            btnFiles.style.border = '1px solid rgba(255,255,255,0.1)';
            
            sectionUrl.style.display = 'block';
            sectionFiles.style.display = 'none';
        } else {
            btnFiles.style.background = '#10b981';
            btnFiles.style.border = 'none';
            btnUrl.style.background = 'rgba(255,255,255,0.05)';
            btnUrl.style.border = '1px solid rgba(255,255,255,0.1)';
            
            sectionUrl.style.display = 'none';
            sectionFiles.style.display = 'block';
        }
    }
</script>
@endsection
