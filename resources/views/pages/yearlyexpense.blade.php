@extends('pages.main')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight col-md-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Yearly Expense for 20{{ $year }}</h5>

                    </div>
                    <div class="ibox-content">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Rent</th>
                                    <th>Food</th>
                                    <th>travel</th>
                                    <th>Car</th>
                                    <th>Tution</th>
                                    <th>Others</th>
                                    <th>Target</th>
                                    <th>Condition</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($year_data as $key)
                                    <tr>

                                        <td>{{ $key->id }}</td>
                                        <td>{{ $key->rent }}</td>
                                        <td>{{ $key->food }}</td>
                                        <td>{{ $key->travel }}</td>
                                        <td>{{ $key->car }}</td>
                                        @if (empty($key->tution))
                                            <td>Not Applicable</td>
                                        @else
                                            <td>{{ $key->tution }}</td>
                                        @endif
                                        <td>{{ $key->others }}</td>
                                        <td>{{ $key->target }}</td>
                                        @if ($key->y_condition == 'Over Budget')
                                            <td class='text text-danger'>{{ $key->y_condition }}</td>
                                        @elseif ($key->y_condition == "Critical")
                                            <td class='text text-warning'>{{ $key->y_condition }}</td>
                                        @elseif ($key->y_condition == "Healthy")
                                            <td class='text text-success'>{{ $key->y_condition }}</td>
                                        @else
                                            <td class='text text-info'>{{ $key->y_condition }}</td>
                                        @endif

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
