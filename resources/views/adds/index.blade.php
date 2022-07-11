@extends('layout')
@section('title', 'Home')
@section('content')
    @if(!empty($adds) && $adds->count())
        @foreach($adds as $add)
            <tr>
                <td>Title: {{ $add->title }}</td>
                <br>
                <td>Description: {{ $add->title }}</td>
                <br>
                <td>Username: {{ $add->user->username }}</td>
                <br>
                <td>Date: {{ date('d-m-Y', strtotime($add->created_at)) }}</td>
                <br>
                <a href="{{ route('show', ['id' => $add->id]) }}" class="btn btn-info">Show</a>
                @auth
                    @if(\Illuminate\Support\Facades\Auth::user()->id == $add->user->id)
                        <a href="{{ route('edit', ['id' => $add->id]) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('delete', ['id' => $add->id]) }}">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger delete-user" value="Delete">
                            </div>
                        </form>
                    @endif
                @endauth
            </tr>
            <br>
            <br>
        @endforeach
    @else
        <tr>
            <td colspan="10">There are no data.</td>
        </tr>
    @endif
    {!! $adds->links() !!}
@endsection


