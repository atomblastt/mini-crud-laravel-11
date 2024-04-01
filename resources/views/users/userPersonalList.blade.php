
@extends('users/userPersonalLayout')

@section('content')
    <div>
        <h3> {{ $title }} </h3>
        <br>
        <table id="userPersonalTable" class="table table-striped" style="width:100%">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Phone</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)   
                    <tr style="text-align: center;">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>
                            @if($data->phone)
                                {{ $data->phone }}
                            @else
                                <span style="color: #9b9b9b">no phone number</span>
                            @endif
                        </td>
                        <td>{{$data->created_at->format('d F Y H:i:s')}}</td>
                        <td>
                            <span style="cursor: pointer; color:#06788f; text-decoration: underline;" class="user-personal-view" data-user-id="{{ encrypt($data->id) }}" data-name="{{ $data->name }}">View</span> | 
                            <span style="cursor: pointer; color:#b08504; text-decoration: underline;" class="user-personal-edit" data-user-id="{{ encrypt($data->id) }}">Edit</span> | 
                            <span style="cursor: pointer; color:#9d0312; text-decoration: underline;" class="user-personal-delete" data-id="{{ encrypt($data->id) }}" data-name="{{ $data->name }}" data-bs-toggle="modal" data-bs-target="#userPersonalDeleteModal">Delete</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection