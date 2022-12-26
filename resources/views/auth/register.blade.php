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

    .input-custom-email {
        padding-left: 72px !important;
        background: url('{{ asset("icons/ic_email.svg") }}') no-repeat 24px;  
        background-color: var(--primaryLightBlue);
        box-shadow: 0px 4px 20px -1px var(--primaryLightBlue);
        border-radius: 10px;
        border: none;
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

    ::placeholder { 
        color: var(--hintColor); 
    }

    ::-ms-input-placeholder { 
        color: var(--hintColor); 
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

</style>

<div class="row my-auto" style="height: 100vh; width: 100vw;">
    <div class="container container-login p-4">
        {{-- Register header text --}}
        <h3 style="font-weight: 700;">Register</h3>
        <p style="font-weight: 400; ">Please insert your credentials</p>
    
        {{-- register form --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- username --}}
            <div class="form-group row mb-3">
                <input id="name" type="text" class="@error('name') is-invalid @enderror input-custom-user p-4" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="username">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong id="nameError" hidden>{{ $message }}</strong>
                        <div class="alert alert-primary alert-dismissible fade show login-alert" role="alert">
                            <h4 class="alert-heading"><b>{{ $message }}</b></h4>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </span>
                @enderror
            </div>
    
            {{-- email --}}
            <div class="form-group row mb-3">
                <input id="email" type="email" class="@error('email') is-invalid @enderror input-custom-email p-4" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">
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

            {{-- password --}}
            <div class="form-group row mb-3">
                <input id="password" type="password" class="@error('password') is-invalid @enderror input-custom-password p-4" name="password" required autocomplete="new-password" placeholder="password">
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

            {{-- password confirmation --}}
            <div class="form-group row mb-3">
                <input id="password-confirm" type="password" class="input-custom-password p-4" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
            </div>
    
            <div class="row mb-0">
                <button type="submit" class="button-logo btn-custom p-3 mt-4 mb-3"> Submit </button>
                <p class="mx-auto">Already have an account ? <a href="{{ route('login') }}"><b>Login here</b></a> instead</p>
            </div>
        </form>
    </div>
</div>

@endsection
