@extends('welcome')
@section('content')
<div class="container py-1">
    <div class="row">
        <div class="col-12">
            <div class="mx-2 sharethis-inline-share-buttons"></div>
        </div>
    </div>
</div>
<service-show :service_id="{{$id}}"></service-show>
@endsection