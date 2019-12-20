@extends('layouts.admin')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="row" style="padding-bottom: 25px">
                    <h3 class=" col-md-10">Calculators</h3>
                    <div class="col-md-2" align="right">
                        <a href="{{route('addcalculator')}}" class="btn btn-primary " align="right"> Add Calculators </a>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" style="max-width: 100%">
                                <thead>
                                <th>Calculators</th>
                                <th>Code</th>
                                <th style="text-align: right; padding-right: 50px">Action</th>
                                </thead>
                                <tbody>
                                @if(count($calculators) > 0)
                                    @foreach($calculators as $calculator)
                                        <tr>
                                            <td>

                                                <a href='{{url("/calculator/$calculator->id/edit")}}' >{{$calculator->title}}</a>
                                            </td>
                                            <td>
                                                <a href='{{url("/calculator/$calculator->id/edit")}}' class="">
                                                {{$calculator->unified_code}}
                                                </a>
                                            </td>
                                            <td style="text-align: right">
                                                <a href='{{url("/calculator/$calculator->id/edit")}}' class="btn btn-warning btn-xs mb-3">Edit</a>
                                                <a href='{{url("/calculator/$calculator->id/delete")}}' class="btn btn-danger btn-xs mb-3">Delete</a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
