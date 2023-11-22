@extends('layouts.admin_base')

@section('title', 'Vartotojai')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Vartotojai</h2>
        </div>
    </div>
</div>

<div class="card">
    <h5 class="card-header">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Vardas</th>
                        <th>El.paštas</th>
                        <th>Vartotojo Kebabines</th>
                        <th>Veiksmai</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @foreach ($user->diners as $diner)
                            <a href="{{route('shops.show', $diner->id)}}">{{$diner->id}} - {{$diner->name}}</a> <br> 
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bx bx-trash me-1"></i> Trinti</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </h5>
</div>

@endsection

@section('styles')
@endsection

@section('scripts')
@endsection