<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-md-4">
      <div class="card shadow">
        <div class="card-header">Alert</div>
        <div class="card-body">
          <form wire:submit.prevent="storePost">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" wire:model="title" autofocus>
            @error('title')
              <div class="text-muted"> {{ $message }} </div>
            @enderror
            <button class="btn btn-primary mt-3" type="submit">Add Post</button>
            <button class="btn btn-danger mt-3" type="button" wire:click="deleteConfirm(10)">Delete Alert</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
