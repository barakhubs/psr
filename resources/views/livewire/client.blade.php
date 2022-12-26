<div>
    <form wire:submit.prevent="uploadFile">
        <div wire:loading>
            <span>Uploading please wait ...</span>
        </div>
        
        <div class="form-group">
            <label for="name">File Upload</label>
            <input type="file" wire:model="upload_file"
                class="form-control @error('upload_file') is-invalid @enderror" id="upload_file{{ $iteration }}">
            @error('upload_file')
                <span class="invalid-feedback" role="alert">{{ $message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" @if(!$button) disabled @endif>Upload & Update</button>
    </form>
</div>
