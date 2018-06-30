@extends('layouts.app')

@section('content')
<div class="row">

    <form method="post" action="{{URL::to('update', $data->randomId)}}">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token"/>
            {{ Form::label("Random Id:", null, ['class' => 'control-label']) }}
            {{ Form::number("randomId", $data->randomId, ['class' => 'form-control', 'readonly']) }}

            <!--            <label for="randomId">Random Id:</label>
                        <input type="number" name="randomId" value="{{ $data->randomId }}" class="form-control" readonly="">            -->
        </div>
        <div class="form-group">
            {{ Form::label("First Name:", null, ['class' => 'control-label']) }}
            {{ Form::text("firstName", $data->firstName, ['class' => 'form-control']) }}

            <!--            <label for="firstName">First Name:</label>
                        <input type="text" name="firstName" value="{{ $data->firstName }}" class="form-control">-->
            @if($errors->has('firstName'))<p class="error-msg">{{ $errors->first('firstName') }}</p>@endif
        </div> 
        <div class="form-group">
            {{ Form::label("Last Name:", null, ['class' => 'control-label']) }}
            {{ Form::text("lastName", $data->lastName, ['class' => 'form-control']) }}
            <!--            <label for="lastName">Last Name:</label>
                        <input type="text" name="lastName" value="{{ $data->lastName }}" class="form-control">-->
            @if($errors->has('lastName'))<p class="error-msg">{{ $errors->first('lastName') }}</p>@endif
        </div>
        <div class="form-group">
            {{ Form::label("Address:", null, ['class' => 'control-label']) }}
            {{ Form::textarea("address", $data->address, ['class' => 'form-control']) }}

            <!--            <label for="address">Address:</label>
                        <textarea name="address" value="{{ $data->address }}" class="form-control"></textarea>-->
            @if($errors->has('address'))<p class="error-msg">{{ $errors->first('address') }}</p>@endif
        </div>
        <div class="form-group">
            {{ Form::label("Dob:", null, ['class' => 'control-label']) }}
            {{ Form::date("dob", $data->dob, ['class' => 'form-control']) }}

            <!--            <label for="dob">Dob:</label>
                        <input type="date" name="dob" value="{{ $data->dob }}" class="form-control">-->
            @if($errors->has('dob'))<p class="error-msg">{{ $errors->first('dob') }}</p>@endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection