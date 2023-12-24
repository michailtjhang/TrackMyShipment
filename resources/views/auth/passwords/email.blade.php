<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TrackMyShipment - Reset Password</title>
    <link href="{{asset('logo/icon.png')}}" rel="icon">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <style>
      .newsletter-subscribe {
        color: #313437;
        background-color: #fff;
        padding: 50px 0;
      }

      .newsletter-subscribe p {
        color: #7d8285;
        line-height: 1.5;
      }

      .newsletter-subscribe h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 25px;
        line-height: 1.5;
        padding-top: 0;
        margin-top: 0;
        color: inherit;
      }

      .newsletter-subscribe .intro {
        font-size: 16px;
        max-width: 500px;
        margin: 0 auto 25px;
      }

      .newsletter-subscribe .intro p {
        margin-bottom: 35px;
      }

      .newsletter-subscribe form {
        justify-content: center;
      }

      .newsletter-subscribe form .form-control {
        background: #eff1f4;
        border: none;
        border-radius: 3px;
        box-shadow: none;
        outline: none;
        color: inherit;
        text-indent: 9px;
        height: 45px;
        margin-right: 10px;
        min-width: 250px;
      }

      .newsletter-subscribe form .btn {
        padding: 16px 32px;
        border: none;
        background: none;
        box-shadow: none;
        text-shadow: none;
        opacity: 0.9;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 13px;
        letter-spacing: 0.4px;
        line-height: 1;
      }

      .newsletter-subscribe form .btn:hover {
        opacity: 1;
      }

      .newsletter-subscribe form .btn:active {
        transform: translateY(1px);
      }

      .newsletter-subscribe form .btn-primary {
        background-color: #055ada !important;
        color: #fff;
        outline: none !important;
      }
    </style>
  </head>

  <body>
    <div class="newsletter-subscribe">
      <div class="container">
        <div class="intro">
          <h2 class="text-center">Reset Password</h2>
          <p class="text-center">Reset Password Anda!! Masukkan Email!!</p>
          @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif
        </div>
        <form method="POST" action="{{ route('password.email') }}" class="form-inline">
		@csrf
          <div class="form-group">
            <input
              class="form-control @error('email') is-invalid @enderror"
              type="email"
              name="email"
              placeholder="{{ __('Email Address') }}"
			  value="{{ old('email') }}"
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
          <div class="form-group">
            <button class="btn btn-primary" type="submit">
              {{ __('Kirim Link Reset Password') }}
            </button>
          </div>
        </form>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
