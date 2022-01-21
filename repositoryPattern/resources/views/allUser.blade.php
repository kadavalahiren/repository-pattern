@extends('layout')
@section('content')
    <table>
        <thead>
            <th>No.</th>
            <th>NAME</th>
            <th>EMAIL</th>
        </thead>
        <tbody>
            @foreach($all_user as $user)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>

        </tfoot>
    </table>
@endsection