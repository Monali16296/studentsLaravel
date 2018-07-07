@extends('layouts.app')

@section('content')
<div class="row">
    @if(isset($msg))
    <div class="alert alert-success">
        {{ $msg }}
    </div>
    @endif
    <a href="{{ URL::to('/view') }} ">View All Students</a>
    <form method="post" action="{{route('insert')}}">
        <div class="form-group">
            
            <!--After form submission i don't want token getting matched so I added exception in
            verifycsrftoken-->
<!--            <input type="hidden" value="{{csrf_token()}}" name="_token"/>-->
            {{ Form::label("Random Id:", null, ['class' => 'control-label']) }}
            {{ Form::number("randomId", $randomId, ['class' => 'form-control', 'readonly']) }}
<!--            <label for="randomId">Random Id:</label>
            <input type="number" name="randomId" value="{{ $randomId }}" class="form-control" readonly="">            -->
        </div>
        <div class="form-group">
            {{ Form::label("First Name:", null, ['class' => 'control-label']) }}
            {{ Form::text("firstName", null, ['class' => 'form-control']) }}
<!--            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" class="form-control">-->
            @if($errors->has('firstName'))<p class="error-msg">{{ $errors->first('firstName') }}</p>@endif
        </div>
        <div class="form-group">
            {{ Form::label("Last Name:", null, ['class' => 'control-label']) }}
            {{ Form::text("lastName", null, ['class' => 'form-control']) }}
<!--            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" class="form-control">-->
            @if($errors->has('lastName'))<p class="error-msg">{{ $errors->first('lastName') }}</p>@endif
        </div>
        <div class="form-group">
            {{ Form::label("Address:", null, ['class' => 'control-label']) }}
            {{ Form::textarea("address", null, ['class' => 'form-control']) }}
<!--            <label for="address">Address:</label>
            <textarea name="address" class="form-control"></textarea>-->
            @if($errors->has('address'))<p class="error-msg">{{ $errors->first('address') }}</p>@endif
        </div>
        <div class="form-group">
            {{ Form::label("Dob:", null, ['class' => 'control-label']) }}
            {{ Form::date("dob", null, ['class' => 'form-control']) }}
<!--            <label for="dob">Dob:</label>
            <input type="date" name="dob" class="form-control">-->
            @if($errors->has('dob'))<p class="error-msg">{{ $errors->first('dob') }}</p>@endif
        </div>
        <div class="form-group">
            {{ Form::label("Passport size photo:", null, ['class' => 'control-label']) }}
            {{ Form::file("img", null, ['class' => 'form-control']) }}
<!--            <label for="dob">Dob:</label>
            <input type="date" name="dob" class="form-control">-->
            @if($errors->has('img'))<p class="error-msg">{{ $errors->first('img') }}</p>@endif
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection