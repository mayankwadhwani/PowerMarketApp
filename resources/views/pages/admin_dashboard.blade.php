@extends('layouts.app', [
'parentSection' => 'components',
'elementName' => 'item-management'])

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
        <div class="header-body text-center mb-7">
            <!-- <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">{{ __('Detailed Report') }}</h1>
                    </div>
                </div> -->
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>
<!-- Page content -->
<div class="container mt--8 pb-5">
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form method="POST" action="/admin/region/create">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <textarea class="form-control" type="text" name="geodata" id="exampleFormControlTextarea1" rows="13" placeholder="Input JSON data here">{{ old('geodata') }}</textarea>
                            @if ($errors->has('geodata'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('geodata') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 pt-4">
                            <input type="text" name="region_name" placeholder="Region name" class="form-control" value="{{ old('region_name') }}" />
                            @if ($errors->has('region_name'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('region_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        @if (isset($success))
                        <div class="col-12 pt-4">
                            <div class="alert alert-success alert-with-icon">
                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                                <span data-notify="icon" class="tim-icons icon-trophy"></span>
                                <span>Geodata has been successfully added</span>
                            </div>
                        </div>
                        @endif
                        <div class="col-12 pt-4">
                            <button type="submit" class="btn btn-success">Load data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection