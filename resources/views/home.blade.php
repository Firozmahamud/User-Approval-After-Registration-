@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}

            </div>

            @endif


            <div class="card">
                <div class="card-header">{{ __('welcome') }}
                    {{ Auth::user()->name }}

                   

                </div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}


                    {{-- {{ --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>status</td>
                                    <td>Action</td>

                                </tr>

                            </thead>
                            <tbody>
                                @foreach ( $users as $user )

                                <tr>
                                    <th>{{ $user->name }}</th>
                                    <th>{{ $user->email }}</th>
                                    <th> @if ( $user->status == 0)
                                             Inactive
                                        @else
                                             Active

                                        @endif
                                     </th>
                                    <th> <a href="{{ route('status',['id'=>$user->id]) }}">

                                        @if ( $user->status == 1)
                                             Inactive
                                        @else
                                             Active

                                        @endif

                                    </a></th>

                                </tr>

                                @endforeach
                            </tbody>

                        </table>

                    {{-- // }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
