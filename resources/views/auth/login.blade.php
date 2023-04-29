
<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <x-layouts.header-component />
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <span class="app-brand-logo demo">
                   <!-- Logo -->
                </span>
                <span class="app-brand-text text-body fw-bolder">{{ __('Hotel Booking') }}</span>
              </div>
              <!-- /Logo -->

              <x-alert.alert-component />

              <p class="mb-4">{{ __('Please sign in and start the adventure') }}</p>

              <form 
                  action="{{ route('login') }}" 
                  method="POST"
                  class="mb-3 needs-validation" 
                  role="form"
                  novalidate
                >
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">{{ __('Email') }}</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    autofocus
                    required
                  />
                  <div class="invalid-tooltip">{{ __('This field is required') }}</div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Password') }}</label>
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                    />
                    <div class="invalid-tooltip">{{ __('This field is required') }}</div>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Sign in') }}</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->
    <x-layouts.footer-component />
  </body>
</html>
