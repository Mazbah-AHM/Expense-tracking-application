@extends('pages.main')
@section('content')
    <div class="wrapper border-bottom white-bg page-heading col-lg-12 col-md-12 col-sm-12">
        <div class="col-lg-12">
            <h2>Loan Overview</h2>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
    @foreach ($data as $key)
        @if ($key->amount > 0)
            <div class="fh-breadcrumb">
                <div class="fh-column">
                    <div class="full-height-scroll">
                        <ul class="list-group elements-list">
                            <li class="list-group-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1">
                                    <strong>{{ $key->name }}</strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="full-height">
                    <div class="full-height-scroll white-bg border-left">
                        <div class="element-detail-box">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <p>
                                        O you who believe! When you contract a debt for a fixed period, write it down. Let a
                                        scribe
                                        write it down in justice between you. Let not the scribe refuse to write as Allah
                                        has
                                        taught
                                        him, so let him write. Let him (the debtor) who incurs the liability dictate, and he
                                        must
                                        fear Allah, his Lord, and diminish not anything of what he owes. But if the debtor
                                        is of
                                        poor understanding, or weak, or is unable himself to dictate, then let his guardian
                                        dictate
                                        in justice. And get two witnesses out of your own men. And if there are not two men
                                        (available), then a man and two women, such as you agree for witnesses, so that if
                                        one
                                        of
                                        them (two women) errs, the other can remind her. And the witnesses should not refuse
                                        when
                                        they are called on (for evidence). You should not become weary to write it (your
                                        contract),
                                        whether it be small or big, for its fixed term, that is more just with Allah; more
                                        solid
                                        as
                                        evidence, and more convenient to prevent doubts among yourselves, save when it is a
                                        present
                                        trade which you carry out on the spot among yourselves, then there is no sin on you
                                        if
                                        you
                                        do not write it down. But take witnesses whenever you make a commercial contract.
                                        Let
                                        neither scribe nor witness suffer any harm, but if you do (such harm), it would be
                                        wickedness in you. So be afraid of Allah; and Allah teaches you. And Allah is the
                                        All-Knower
                                        of each and everything.
                                        <br>
                                        <br>
                                        Surah Al-Baqara (Q2:282)
                                    </p>
                                    <div class="ibox-content col-md-12">
                                        <form method="post" action="{{ url('loan/repay/post/' . $key->id) }}">
                                            @csrf
                                            <div class="form-group row" hidden><label class="col-sm-12 col-form-label"
                                                    style="text-align:center;"><strong>ID</strong></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="input-group m-b">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" name='name' value="{{ $key->id }}"
                                                            disabled="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-12 col-form-label"
                                                    style="text-align:center;"><strong>Name</strong></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="input-group m-b">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" name='name' value="{{ $key->name }}"
                                                            disabled="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-12 col-form-label"
                                                    style="text-align:center;"><strong>Cause</strong></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="input-group m-b">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" name='cause' value={{ $key->cause }}
                                                            disabled="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-12 col-form-label"
                                                    style="text-align:center;"><strong>Due</strong></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="input-group m-b">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-addon">RM</span>
                                                        </div>
                                                        <input type="number" value="{{ $key->amount }}" disabled=""
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-12 col-form-label"
                                                    style="text-align:center;"><strong>Amount</strong></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="input-group m-b">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-addon">RM</span>
                                                        </div>
                                                        <input type="number" step='0.01' name='amount'
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-12 col-form-label"
                                                    style="text-align:center;"><strong>Duration</strong></label>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="input-group m-b">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" name='duration' value={{ $key->duration }}
                                                            disabled="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 col-sm-offset-2">
                                                    <button class="btn btn-primary btn-block" type="submit">Pay</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
