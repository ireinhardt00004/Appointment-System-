 <div>
        <form wire:submit.prevent="updatedQuery">
            <input wire:model.debounce.300ms="query" type="search" placeholder="Search..." class="form-control">
            <!-- No need for a submit button -->
        </form>
    </div>
