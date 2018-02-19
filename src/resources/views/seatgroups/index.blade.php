
@push('head')
    <link href="{{ asset('web/css/seat-groups.css') }}" rel="stylesheet">
@endpush
@extends('web::layouts.grids.4-4-4')

@section('title', trans('seat-groups::seat_groups_admin'))
@section('page_header', trans('seatgroups::seat.seat_groups_admin'))
@section('page_description', trans('web::seat.dashboard'))


@section('left')

 <h3>Auto-Groups</h3>

    @foreach($autogroups as $groupname)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">{{$groupname->name}}</h3>

                <!-- ToDo: Adapt to buttongroup -->
                <button class="btn btn-link pull-right">
                @if($groupname->isManager(auth()->user(),$groupname->id))

                        <a href="{{route('seatgroups.edit', $groupname->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>

                        <form action="{{route('seatgroups.destroy', $groupname->id)}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger pull-right" type="submit"><i class="fa fa-remove btn-danger"></i></button>
                        </form>

                @endif
                </button>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                {{$groupname->description}}

            </div>
            <!-- TODO: with Groupmanagers to extend
            <div class="panel-footer">

            </div>
            -->
        </div>
    @endforeach
@endsection

@section('center')

    <h3>Open Groups</h3>
    <p>In these Groups you can opt-in and opt-out as you like.</p>
    @foreach($opengroups as $groupname)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">{{$groupname->name}}</h3>

                @if($groupname->isManager(auth()->user(),$groupname->id))
                    <button class="btn btn-link pull-right">
                        <a href="{!! action('SeatGroupsController@edit', $groupname->id) !!}"><i class="fa fa-edit"></i></a>
                    </button>
                @endif

                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                {{$groupname->description}}

            </div>
        </div>
    @endforeach


    @if (auth()->user()->has('Superuser'))
    <a href="{!! 'seatgroups/create' !!}">New Group</a>
    @endif

@endsection

@section('right')
    <h3>Managed Groups</h3>
    <p>Here you can apply for certain groups. The managers of this
    group will approve or deny your request.</p>
    @foreach($managedgroups as $groupname)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">{{$groupname->name}}</h3>

                @if($groupname->isManager(auth()->user(),$groupname->id))
                    <button class="btn btn-link pull-right">
                        <a href="{!! url('seatgroups/edit',$groupname->id) !!}"><i class="fa fa-edit"></i></a>
                    </button>
                @endif

                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                {{$groupname->description}}
            </div>

        </div>
    @endforeach
@endsection