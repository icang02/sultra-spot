<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <img src="{{ asset('sneat/img/favicon/logo.png') }}" alt="logo" width="32">
              </span>
              <span class="app-brand-text demo text-body fw-bolder">SultraSpot</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Welcome to SultraSpot! 👋</h4>
          <p class="mb-4">Please sign-in to your account and start the adventure</p>

          {{-- Message Error --}}
          @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <form wire:submit.prevent="authCheck">
            <div class="mb-3">
              <label for="email" class="form-label">Email or Username</label>
              <input wire:model="email" wire:model="username" type="text"
                class="form-control {{ $errors->has('email') || $errors->has('username') ? ' is-invalid' : '' }}"
                id="email" placeholder="Enter your email or username" />
              @if ($errors->has('email') || $errors->has('username'))
                <div class="invalid-feedback"> {{ $errors->first('email') ?: $errors->first('username') }} </div>
              @endif
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="{{ route('forget.password') }}">
                  <small class="color-primary">Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input wire:model="password" type="password" id="password"
                  class="form-control @error('password') is-invalid @enderror"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" autocomplete="off" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                @error('password')
                  <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100 color-primary-bg color-primary-outline" type="submit">Sign
                in</button>
            </div>
          </form>

          <p class="text-center">
            <span>New on our platform?</span>
            <a href="{{ route('register') }}">
              <span class="color-primary">Create an account</span>
            </a>
          </p>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
