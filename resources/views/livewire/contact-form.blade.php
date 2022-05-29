<div>

    <form wire:submit.prevent="save">
        @csrf
        <div class="form-group">
            <input type="text"  wire:model="name" class="form-control-input" placeholder="Name"  required>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <input type="email" wire:model="email"  class="form-control-input" placeholder="Email" required>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <textarea  wire:model="message" class="form-control-textarea" placeholder="Message" required></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="form-control-submit-button">Submit</button>
        </div>
    </form>
</div>
