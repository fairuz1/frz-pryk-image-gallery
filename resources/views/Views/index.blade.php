@extends('layouts.app')
@section('content')
<style>
    .alert {
        background: var(--primaryLightBlue);
        box-shadow: 0px 4px 20px -1px var(--secondaryLightBlue);
        border-radius: 20px;
        border: none;
        color: var(--calmBlack);
    }

    .buttonPrimary {
        background: var(--calmBlack);
        box-shadow: 0px 4px 20px -1px var(--lightPurple);
        border-radius: 10px;
        color: var(--primaryLightBlue);

        font-weight: 500;
        font-size: 1.2rem;
    }

    .buttonPrimary:hover {
        background: var(--primaryLightBlue);
        box-shadow: 0px 4px 20px -1px var(--lightPurple);
        border-radius: 10px;
        color: var(--calmBlack);
        border-color: var(--calmBlack);

        font-weight: 700;
        font-size: 1.2rem;
    }

    table {
        background: rgba(251, 252, 253, 0.6);
        box-shadow: 0px 4px 20px var(--lightPurple) !important;
        border-radius: 20px !important;
    }




    
</style>

<div class="alert alert-primary alert-dismissible fade show login-alert p-4" role="alert">
    @if (session('status'))
        <div class="alert alert-primary" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h4 class="alert-heading"><b>Logged In!</b></h4>
    <p> Congratulation <b>{{ Auth::user()->name }}</b>, you have successfuly logged in. Enjoy your time!</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal fade" tabindex="-1" id="addWebpages">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="h3 headingData mb-0" style="font-size: 2em;"><b>Add your <span style="color: #319DA0;">Web Pages</b></span></h3>
            </div>
            <div class="modal-body">
                <form action="{{ route('Views.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="pageName" class="form-label">Page name</label>
                        <input type="text" class="form-control" id="pageName" name="pageName" maxlength="50">
                        <div class="form-text" id="name_detail">Enter your page name</div>
                    </div>
                    <div class="mb-3">
                        <label for="data" class="form-label">Pages Data</label>
                        <textarea class="form-control" name="data" id="data" cols="10" rows="10"></textarea>
                        <div class="form-text" id="data_detail">Enter data in html and javascript. Do not enter PHP files as it will not be renderd in the back-end</div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="font-size: 1em;"><b>Add Data</b></button>
                    <button type="button" class="btn btn-secondary ms-2" style="font-size: 1em;" data-dismiss="modal"><b>Cancel</b></button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4 mb-4">
    <div class="row mx-auto my-auto">
        <h1 class="h1"><b>Enter Your Web Page Data here!</b></h1>
        <p style="font-size: 1.3em">
            Help remove many files to store web pages data, instead we could use database to store
            web pages data and just call the data whenever we need it. This way, there would be less
            files in the project directory and everything will be moved to a database and will be accessed
            from controller with the help of model.
        </p>
        <div class="mb-3">
            <button type="button" class="btn buttonPrimary p-3" data-toggle="modal" data-target="#addWebpages">Add Webpages</button>
        </div>
        <table class="table caption-top table-bordered table-hover text-center mt-2">
            <caption>List of preveously routed pages that has been moved to controller</caption>
            <thead style="background: var(--primaryLightBlue);">
                <tr>
                    <th scope="col">Date Created</th>
                    <th scope="col">Available web pages</th>
                </tr>
            </thead>
            <tbody>
                @if (count($views) > 0)
                    @foreach ($views as $view)
                    <tr>
                        <th scope="row">{{$view->created_at}}</th>
                        <td><b><a href="/Views/{{$view->id}}">{{$view->page}}</a></b></td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <th scope="row"></th>
                        <td colspan="3"> Nothing to be shown!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
