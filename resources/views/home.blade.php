@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" rol    e="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                     Token:   {{ request()->user()->api_token ?? 'N/A' }}
                    </p>
                     <p>
                     Encrypt:   {{ request()->user()->secret ?? 'N/A' }}
                    </p>
                     <p>
                     Decrypt:   {{ $secret ?? 'N/A' }}
                    </p>
                   <form action="{{route('home')}}" method="post">
                        @csrf
                        <input type="text" name="secret" class="form-control">
                        <input type="submit" value="Generate Token" class="btn btn-outline-primary mt-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
