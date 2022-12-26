<div>
    <form wire:submit.prevent="uploadFile" class="forms-sample">
        <div wire:loading>
            <span>Uploading please wait ...</span>
        </div>
        <div class="form-group">
            <label>Select Facility</label>
            <select class="js-example-basic-single w-100 @error('facility') is-invalid @enderror" name="district">
                @foreach ($facilities as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
            @error('facility')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">File Upload</label>
            <input type="file" wire:model="upload_file"
                class="form-control @error('upload_file') is-invalid @enderror" id="upload_file{{ $iteration }}">
            @error('upload_file')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" @if (!$button) disabled @endif>Upload &
            Update</button>
    </form>
</div>
