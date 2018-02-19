@extends('web::layouts.grids.12')


@section('title', trans('seat-groups::seat_groups_admin'))
@section('page_header', trans('seatgroups::seat.seat_groups_admin'))
@section('page_description', trans('web::seat.dashboard'))

@section('full')

    <h2>Editing {{$seatgroup->name}}</h2>

    <form method="post" action="{{route('seatgroups.update', $id)}}">
        {{csrf_field()}}
        <input name="_method3" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{$seatgroup->name}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="description">SeAT-Group Description:</label>
                <textarea type="text" class="form-control" rows="5" name="description" >{{$seatgroup->description}}</textarea>
            </div>
        </div>
        <!-- TODO: use data-icon-->
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="type">Select SeAT-Group Type</label>
                {{Form::select('type',[
                    'auto' => 'auto',
                    'hidden' => 'hidden',
                    'managed'=>[
                        'open'=>'open',
                        'managed'=>'managed'
                ]], $seatgroup->type,['class'=>'form-control'])}}

            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="role_id">Select corresponding SeAT-Role</label>
                {!! Form::select('role_id', $roles, $seatgroup->role_id, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success">Update SeatGroup</button>
            </div>
        </div>
    </form>


@stop