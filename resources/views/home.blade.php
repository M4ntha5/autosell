@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 pt-5">
            <div class="card">
                <div class="card-header">Dashboard</div>


                <div class="card-body">
                  <div class="panel-body">

                  </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="pt-5">You are logged in!</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
