@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Token</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index=>$user)
                <tr>
                    <th scope="row">{{++$index}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$index}}">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$index}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('users.generate-token') }}" method="POST">
                                @csrf
                                <input type="hidden" name="userId" value="{{$user->id}}">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Generate API Token</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Assign permissions for {{$user->name}}</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="create" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Create
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="update" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Update
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="delete" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Delete
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
