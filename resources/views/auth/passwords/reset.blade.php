<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TrackMyShipment - Reset Password</title>
    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
    ></script>
    <style>
      ::-webkit-scrollbar {
        width: 8px;
      }
      /* Track */
      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: #888;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #555;
      }
      body {
        font-family: "Lato", sans-serif;
      }

      h1 {
        margin-bottom: 40px;
      }

      label {
        color: #333;
      }

      .btn-send {
        font-weight: 300;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        width: 80%;
        margin-left: 3px;
      }
      .help-block.with-errors {
        color: #ff5050;
        margin-top: 5px;
      }

      .card {
        margin-left: 10px;
        margin-right: 10px;
      }
    </style>
  </head>
  <body className="snippet-body">
    <div class="container">
      <div class="text-center mt-5">
        <h1>{{ __('Reset Password') }}</h1>
      </div>

      <div class="row">
        <div class="col-lg-7 mx-auto">
          <div class="card mt-2 mx-auto p-4 bg-light">
            <div class="card-body bg-light">
              <div class="container">
                <form
                  id="contact-form"
                  role="form"
                  method="POST"
                  action="{{ route('password.update') }}"
                >
                  @csrf
                  <div class="controls">
                    <div class="row">
                      <input type="hidden" name="token" value="{{ $token }}" />
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="email">{{ __('Email Address') }}</label>
                          <input
                            id="email"
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ $email ?? old('email') }}"
                            required
                            autocomplete="email"
                            autofocus
                          />
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="password">{{ __('Password') }}</label>
                          <input
                            id="password"
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            required
                            autocomplete="new-password"
                          />
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="password-confirm">{{ __('Confirm Password') }}</label>
                          <input
                            id="password-confirm"
                            type="password"
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            class="form-control"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <input
                          type="submit"
                          class="btn btn-primary btn-send pt-2 btn-block"
                          value="{{ __('Reset Password') }}"
                        />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.8 -->
        </div>
        <!-- /.row-->
      </div>
    </div>

    <script
      type="text/javascript"
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"
    ></script>
    <script type="text/javascript">
      var myLink = document.querySelector('a[href="#"]');
      myLink.addEventListener("click", function (e) {
        e.preventDefault();
      });
    </script>
  </body>
</html>
