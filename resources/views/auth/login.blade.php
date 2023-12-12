<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل دخول</title>
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.rtl.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style-login.css')}}">
</head>
<body>
<div class="container">
    <div class="row" style="display: flex; align-items: center;">
      <div class="col-sm-6 col-md-4 hidden-xs hidden-sm"></div>
      
      
        <div class="col-sm-12 col-xs-12 col-md-4">            
          <div class="space-top" dir="rtl">
          
             
             <h3 class="text-center">{{ __('تسجيل دخول') }}</h3>
            
          <form class="form-signin form-horizontal" method="POST" action="{{ route('login') }}">
            @csrf
              <label class="">اسم المستخدم</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" style="direction: rtl !important" value="{{ old('email') }}" required  autofocus>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            
            <label class="">كلمة المرور</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                  <label class="form-check-label" style="font-size: 20px !important;" for="remember">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      {{ __('تذكرني') }}
                  </label>
            <button type="submit" class="btn btn-primary col-12" style="border-radius:20px ;">
                {{ __('تسجيل') }}
            </button>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- partial -->
  <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
