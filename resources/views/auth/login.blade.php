@extends('layouts.app')

@section('content')

<style>
    .container-login {
        margin-top: auto !important;
        margin-bottom: auto !important;
        background: #FFFFFF;
        border: 3px solid var(--calmBlack);
        box-shadow: 0px 4px 20px -1px var(--calmBlack);
        border-radius: 20px;
    }

    .btn-custom {
        color: var(--primaryLightBlue);
        background-image: url('{{ asset("icons/ic_send.svg") }}') no-repeat;
        background: var(--calmBlack);
        box-shadow: 0px 4px 20px -1px var(--calmBlack);
        border-radius: 10px;
        width: 100vw;
        font-weight: 700;
        font-size: 24px;
    }

    .input-custom-user {
        padding-left: 72px !important;
        background: url('{{ asset("icons/ic_user.svg") }}') no-repeat 24px;  
        background-color: var(--primaryLightBlue);
        box-shadow: 0px 4px 20px -1px var(--primaryLightBlue);
        border-radius: 10px;
        border: none;
        font-size: 1rem;
        font-weight: 500;
        width: 100vw;
    }

    .input-custom-user-danger {
        color: var(--warningRed);
        padding-left: 72px !important;
        background: url('{{ asset("icons/ic_danger_user.svg") }}') no-repeat 24px;  
        background-color: var(--primaryLightBlue);
        box-shadow: 0px 4px 20px -1px var(--primaryLightBlue);
        border-radius: 10px;
        border: 3px solid var(--warningRed);
        font-size: 1rem;
        font-weight: 500;
        width: 100vw;
    }

    .input-custom-password {
        padding-left: 72px !important;
        background: url('{{ asset("icons/ic_lock.svg") }}') no-repeat 24px;  
        background-color: var(--primaryLightBlue);
        box-shadow: 0px 4px 20px -1px var(--primaryLightBlue);
        border-radius: 10px;
        border: none;
        font-size: 1rem;
        font-weight: 500;
        width: 100vw;
    }

    .input-custom-password-danger {
        padding-left: 72px !important;
        color: var(--warningRed);
        background: url('{{ asset("icons/ic_danger_lock.svg") }}') no-repeat 24px;  
        background-color: var(--primaryLightBlue);
        box-shadow: 0px 4px 20px -1px var(--primaryLightBlue);
        border-radius: 10px;
        border: 3px solid var(--warningRed);
        font-size: 1rem;
        font-weight: 500;
        width: 100vw;
    }

    ::placeholder {
        color: var(--hintColor);
    }

    ::-ms-input-placeholder {
        color: var(--hintColor);
    }

    .input-custom-password-danger::placeholder {
        color: var(--warningRed);
    }

    .input-custom-user-danger::placeholder {
        color: var(--warningRed);
    }

    .input-custom-password-danger::-ms-input-placeholder {
        color: var(--warningRed);
    }

    .input-custom-user-danger::-ms-input-placeholder {
        color: var(--warningRed);
    }

    img {
        width: 20px;
        height: 20px;
    }

    textarea:focus, input:focus {
        outline: none;
    }

    a {
        color: var(--calmBlack);
    }

    a:hover {
        color: var(--calmBlack);
    }

    .col-custom {
        max-width: 40px;
        max-height: 40px;
        
    }

    .col-custom:hover {
        transform: scale(1.3);
    }

</style>

<div class="row my-auto" style="height: 100vh; width: 100vw;">
    <div class="container container-login p-4">
        {{-- header --}}
        <div class="mb-2">
            <div class="row justify-content-end">
                {{-- login header text --}}
                <div class="col">
                    <h3 style="font-weight: 700;">Login</h3>
                    <p class="mb-4" style="font-weight: 400;">Please insert Your Creedentials</p>
                </div>

                {{-- navigation --}}
                <div class="col col-custom no-gutters">
                    <a href=""><img src="{{ asset('icons/ic_medium_email.svg') }}" alt=""></a>
                </div>
                <div class="col col-custom no-gutters">
                    <a href="{{ url('/gallery') }}"><img src="{{ asset('icons/ic_medium_images.svg') }}" alt=""></a>
                </div>
                <div class="col col-custom no-gutters">
                    <a href=""><img src="{{ asset('icons/ic_medium_user_manual.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    
        {{-- login form --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row mb-3">
                <input id="email" type="email" class="@error('email') is-invalid @enderror input-custom-user p-4" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="User Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong id="emailError" hidden>{{ $message }}</strong>
                        <div class="alert alert-primary alert-dismissible fade show login-alert" role="alert">
                            <h4 class="alert-heading"><b>{{ $message }}</b></h4>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </span>
                @enderror
            </div>
    
            <div class="form-group row mb-3">
                <input id="password" type="password" class="@error('password') is-invalid @enderror input-custom-password p-4" name="password" required autocomplete="current-password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong id="passwordError" hidden>{{ $message }}</strong>
                            <div class="alert alert-primary alert-dismissible fade show login-alert" role="alert">
                                <h4 class="alert-heading"><b>{{ $message }}</b></h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </span>
                    @enderror
            </div>
    
            <div class="row mb-0">
                <button type="submit" class="button-logo btn-custom p-3 mt-4 mb-3"> Submit </button>
                <p class="mx-auto">Doesn`t have an account ? <a href="{{ route('register') }}"><b>Register here</b></a> instead</p>
            </div>
        </form>
    </div>
</div>


<script>
    if (document.getElementById('emailError') != null) {
        validate();
    }
    
    function validate() {
        var validate1 = document.getElementById('emailError');
        var validate2 = document.getElementById('passwordError');
        var emailInput = document.getElementById('email');
        var passwordInput = document.getElementById('password');

        emailInput.className = "@error('email') is-invalid @enderror input-custom-user-danger p-4";
        passwordInput.className = "@error('password') is-invalid @enderror input-custom-password-danger p-4";
    }

</script>

@endsection

