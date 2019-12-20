@extends('layouts.admin')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="row" style="padding-bottom: 25px">
                    <h3 class=" col-md-10">Calculators Groups</h3>
                    <div class="col-md-2" align="right">
                        <a href="{{route('addcalculator.group')}}" class="btn btn-primary " align="right"> Make Groups </a>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if(count($groups) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <th>No</th>
                                <th>Title</th>
                                <th>Code</th>
                                <th style="text-align: right; padding-right: 50px">Action</th>
                                </thead>
                                <tbody>

                                    @foreach($groups as $key => $group)
                                        <tr>
                                            <td>{{$key+1}}
                                            </td>
                                            <td>   <a href='{{url("/group/$group->id/edit")}}' >{{$group->title}} </a></td>
                                            <td>  <a href='{{url("/group/$group->id/edit")}}'>{{$group->unified_code}} </a></td>
                                            <td style="text-align: right">

                                                <a href='{{url("/group/$group->id/edit")}}' class="btn btn-warning btn-xs mb-3">Edit</a>
                                                <a href='{{url("/group/$group->id/delete")}}' class="btn btn-danger btn-xs mb-3">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                            @else
                            <p>No Calculators Groups Found!</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
