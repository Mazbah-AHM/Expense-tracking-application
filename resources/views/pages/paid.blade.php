@extends('pages.main')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight col-md-12">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Paid Loans</h5>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Cause</th>
                                <th>Debt</th>
                                <th>Duration</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key)
                                <tr>
                                    <td>{{ $key->id }}</td>
                                    <td>{{ $key->name }}</td>
                                    <td>{{ $key->cause }}</td>
                                    <td>{{ $key->amount }}</td>
                                    <td>{{ $key->duration }}</td>
                                    <td>{{ $key->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection