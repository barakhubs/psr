<div>
    <form class="forms-sample" wire:submit.prevent="sendSms">
        <div class="row">
            <div class="form-group col-md-2">
                <div class="form-check">
                    <label class="form-check-label">
                        <input wire:click="activateSingleForm" type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2"
                            value="option2" checked="">
                        Single
                        <i class="input-helper"></i>
                    </label>
                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="form-check">
                    <label class="form-check-label">
                        <input wire:click="activateGroupForm" type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2"
                            value="option">
                        Group
                        <i class="input-helper"></i>
                    </label>
                </div>
            </div>
            <div class="form-group col-md-2">
                <div class="form-check">
                    <label class="form-check-label">
                        <input wire:click="activateCategoryForm" type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2"
                            value="option">
                        Category
                        <i class="input-helper"></i>
                    </label>
                </div>
            </div>
        </div>

        @if ($singleRecipient)
        <div class="row">
            <div class="form-group col-md-7">
                <label>Select Client</label>
                <select multiple="" class="js-example-basic-multiple w-100 @error('client') is-invalid @enderror" wire:model="client">
                    @if ($clients !== null)
                        @foreach ($clients as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->family_name . ' ' . $item->given_name . ' - ' . $item->hiv_clinic_no }}
                            </option>
                        @endforeach
                    @else
                        <option>No Client found</option>
                    @endif
                </select>
                @error('client')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-7">
                <label for="exampleTextarea1">Message</label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="exampleTextarea1" rows="4" wire:model="message"></textarea>
                <small class="text-muted">Use [name], [hiv_clinic_number] short codes in your message. E.g: Hello [name], ....</small>
                @error('message')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>
        @elseif($groupRecipient)
        <div class="row">
            <div class="form-group col-md-7">
                <label>Select Client</label>
                <select multiple="" class="js-example-basic-multiple w-100 @error('client') is-invalid @enderror" wire:model="client">
                    @if ($clients !== null)
                        @foreach ($clients as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->family_name . ' ' . $item->given_name . ' - ' . $item->hiv_clinic_no }}
                            </option>
                        @endforeach
                    @else
                        <option>No Client found</option>
                    @endif
                </select>
                @error('client')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-7">
                <label for="exampleTextarea1">Message</label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="exampleTextarea1" rows="4" wire:model="message"></textarea>
                <small class="text-muted">Use [name], [hiv_clinic_number] short codes in your message. E.g: Hello [name], ....</small>
                @error('message')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>
        @elseif($categoryRecipient)
        <div class="row">
            <div class="form-group col-md-7">
                <label>Select Category</label>
                <select class="js-example-basic-single w-100 @error('client') is-invalid @enderror" wire:model="client">
                    <option value="">Clients with upcoming Appointments</option>
                    <option value="">Clients with upcoming Appointments</option>
                    <option value="">Clients with upcoming Appointments</option>
                </select>
                @error('client')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-7">
                <label for="exampleTextarea1">Message</label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="exampleTextarea1" rows="4" wire:model="message"></textarea>
                <small class="text-muted">Use [name], [hiv_clinic_number] short codes in your message. E.g: Hello [name], ....</small>
                @error('message')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>
        @endif

        <div class="pl-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
