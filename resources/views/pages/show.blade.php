@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container mt-3" style="overflow: auto; height: 74vh;">
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">Card ID</th>
                    <th scope="col">Full name</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->cin }}</th>
                        <td>{{ $user->name }}</td>
                        <td style='display: flex; justify-content: center'>
                            <form action="{{ route('delete.user', ['userId' => $user->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn" style='margin-left: 4px; width: 60px; height: 60px'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>

                            
                            <a class="btn" href="{{ route('update.userview', ['userId' => $user->id]) }}" style="display: flex; justify-content: center;width: 60px; height: 60px">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>

    <div style="width: 100%; display: flex; justify-content: center;" class="pt-3">
        {{ $users->withQueryString()->links() }}
    </div>
@endsection
