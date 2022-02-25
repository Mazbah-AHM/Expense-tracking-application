@extends('pages.main')

@section('content')

    <div class="ibox-content col-md-12">

        <form method="post" action="{{ route('postloan') }}">
            @csrf
            <div class="form-group row"><label class="col-sm-12 col-form-label" style="text-align:center;"><strong>Name</strong></label>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group m-b">
                        <div class="input-group-prepend">
                            <span class="input-group-addon">RM</span>
                        </div>
                        <input type="text"  name='name' class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group row"><label class="col-sm-12 col-form-label" style="text-align:center;"><strong>cause</strong></label>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group m-b">
                        <div class="input-group-prepend">
                            <span class="input-group-addon">RM</span>
                        </div>
                        <input type="text"  name='cause' class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group row"><label class="col-sm-12 col-form-label" style="text-align:center;"><strong>amount</strong></label>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group m-b">
                        <div class="input-group-prepend">
                            <span class="input-group-addon">RM</span>
                        </div>
                        <input type="number" step='0.01' name='amount' class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group row"><label class="col-sm-12 col-form-label" style="text-align:center;"><strong>duration</strong></label>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="input-group m-b">
                        <div class="input-group-prepend">
                            <span class="input-group-addon">RM</span>
                        </div>
                        <input type="text" name='duration' class="form-control">
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


@endsection
