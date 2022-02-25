@extends('pages.main')

@section('content')
    @if (!$yearly_data->isEmpty())
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12 col-md-offset-1">
                    <div class="alert alert-warning text-center" role="alert">
                        Record for Current year already exists! <a href="{{ route('yearlyexpense') }}">Click
                            here</a> to see your records
                    </div>
                </div>

            </div>
        </div>
    @else

        <div class="ibox-content col-md-12">

            <form method="post" action="{{ route('postyearly') }}">
                @csrf
                <div class="form-group row"><label class="col-sm-12 col-form-label" style="text-align:center;"><strong>Rent
                            for
                            current year (20{{ $year }})</strong></label>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-addon">RM</span>
                            </div>
                            <input type="number" step='0.05' name='rent' class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group row"><label class="col-sm-12 col-form-label" style="text-align:center;"><strong>Food
                            for
                            current year (20{{ $year }})</strong></label>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-addon">RM</span>
                            </div>
                            <input type="number" step='0.05' name='food' class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group row"><label class="col-sm-12 col-form-label"
                        style="text-align:center;"><strong>Travel
                            for current year (20{{ $year }})</strong></label>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-addon">RM</span>
                            </div>
                            <input type="number" step='0.05' name='travel' class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group row"><label class="col-sm-12 col-form-label" style="text-align:center;"><strong>Car
                            for
                            current year (20{{ $year }})</strong></label>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-addon">RM</span>
                            </div>
                            <input type="number" step='0.05' name='car' class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group row"><label class="col-sm-12 col-form-label"
                        style="text-align:center;"><strong>Tution
                            for current year (20{{ $year }})</strong></label>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-addon">RM</span>
                            </div>
                            <input type="number" step='0.05' name='tution' class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group row"><label class="col-sm-12 col-form-label"
                        style="text-align:center;"><strong>Others
                            for current year (20{{ $year }})</strong></label>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-addon">RM</span>
                            </div>
                            <input type="number" step='0.05' name='others' class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group row"><label class="col-sm-12 col-form-label"
                        style="text-align:center;"><strong>Target
                            for current year (20{{ $year }})</strong></label>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="input-group m-b">
                            <div class="input-group-prepend">
                                <span class="input-group-addon">RM</span>
                            </div>
                            <input type="number" step='0.05' name='target' class="form-control">
                        </div>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>

                <div class="hr-line-dashed"></div>
                <div class="form-group row">
                    <div class="col-sm-12 col-sm-offset-2">

                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    @endif


@endsection
