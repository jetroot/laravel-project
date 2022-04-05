@extends('layouts.app')

@section('content')

    <div class="container mt-3" style="overflow: auto; height: 74vh;">

        <!-- Search form -->
        <form class="form-inline active-cyan-4" method="get" action="{{route('home')}}">
            <input class="form-control col" name="search" type="text" placeholder="Search by CIN or last name" aria-label="Search">
            <button class="btn  btn-outline-primary col-md-6 col-sm-12 col-lg-4" type="submit">Search</button>
        </form>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block mt-2">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block mt-2">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if($found)
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">Card ID</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Birth date</th>
                        <th scope="col">Birth place</th>
                        <th scope="col">Father name</th>
                        <th scope="col">Mother name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Profession</th>
                        <th scope="col">Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->card_id }}</th>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->birth_date }}</td>
                            <td>{{ $user->birth_place }}</td>
                            <td>{{ $user->father_name }}</td>
                            <td>{{ $user->mother_name }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->profession }}</td>
                            <td>
                                <div style="width: 150px; height: 200px; overflow: auto">
                                    {{ $user->note }}
                                </div>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('update.view.user', ['userId' => $user->id]) }}" class="btn" style='margin-right: 4px; width: 60px; height: 60px'>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <!-- <a href="{{ route('update.view.user', ['userId' => $user->id]) }}" class="btn btn-danger" style='margin-right: 4px; margin-top: 2px'>حذف</a> -->
                                <form action="{{ route('delete.people', ['userId' => $user->id]) }}" method="post" style='margin-right: 4px; margin-top: 2px'>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" style='margin-left: 4px; width: 60px; height: 60px'>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            <!-- <td class="text-right"><a href="{{ route('update.view.user', ['userId' => $user->id]) }}" class="btn btn-danger">تعديل</a></td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <div class="position-absolute d-flex justify-content-center w-100 mt-4">

                @if($isSearching)
                    <h4>No result found</h4>
                @endif
            </div>
        @endif

    </div>

    <div style="width: 100%; display: flex; justify-content: center;" class="pt-3">
        @if($canPaginate)
            {{ $users->withQueryString()->links() }}
        @endif
    </div>
@endsection
