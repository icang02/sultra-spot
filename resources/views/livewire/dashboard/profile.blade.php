<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Profile</h4>

  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
          <a class="nav-link active color-primary-bg color-primary-outline" href="#"><i class="bx bx-user me-1"></i>
            Account</a>
        </li>
      </ul>

      {{-- Message Success --}}
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="{{ asset('sneat/img/avatars/profil.png') }}" alt="user-avatar" class="d-block rounded"
              height="100" width="100" id="uploadedAvatar" />
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-2 mb-4 color-primary-bg color-primary-outline"
                tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
              </label>
              <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
              </button>
              <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
            </div>
          </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
          <form wire:submit.prevent="updateUser({{ $userId }})">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Full Name</label>
                <input wire:model="name" class="form-control @error('name') is-invalid @enderror" type="text"
                  id="name" value="{{ $name }}" />
                @error('name')
                  <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
              </div>

              <div class="mb-3 col-md-6">
                <label for="username" class="form-label">User name</label>
                <input class="form-control" type="text" id="username" value="{{ $username }}" readonly />
              </div>

              <div class="mb-3 col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input wire:model="email" class="form-control @error('email') is-invalid @enderror" type="text"
                  id="email" value="{{ $email }}" />
                @error('email')
                  <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
              </div>

              <div class="mb-3 col-md-6">
                <label for="user_type" class="form-label">User Type</label>
                <input type="text" class="form-control" id="user_type" value="{{ str()->title($userType) }}"
                  readonly />
              </div>
            </div>

            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2 color-primary-bg color-primary-outline">Save
                changes</button>
              <button wire:click="resetForm" type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
      <div class="card">
        <h5 class="card-header">Delete Account</h5>
        <div class="card-body">
          <div class="mb-3 col-12 mb-0">
            <div class="alert alert-warning">
              <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
              <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
          </div>
          <form id="formAccountDeactivation" onsubmit="return false">
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
              <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
            </div>
            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
