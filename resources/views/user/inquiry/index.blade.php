@extends('layouts.app')
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-10 mt-3">
                    <h3>Inquiry</h3>
                </div>
            </div>
        </div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Subject</th>
        <th scope="col">Message</th>
        <th scope="col">Details</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
        @php
            $count = 1;
        @endphp
      @if ($my_inquiry->count() > 0)
        @foreach ($my_inquiry as $item)
        <tr>
            <th scope="row">{{$count ++}}</th>
            <td>{{$item->subject}}</td>
            <td>{{$item->message}}</td>
            <td><a href="{{route('user.inquiry_details',$item->id)}}">Details</a></td>
            <td>
                @if ($item->status == 0)
                    <div class="badge badge-warning">Pending</div>
                @elseif($item->status == 1)
                    <div class="badge badge-primary">Active</div>
                @elseif($item->status == 2)
                    <div class="badge badge-success">Solved</div>
                 @elseif($item->status == 3)
                    <div class="badge badge-danger">Declined</div>
                @endif
            </td>
          </tr>
        @endforeach
      @else
      <tr>
        <th scope="row">No data found.</th>
      </tr>   
      @endif
    </tbody>
  </table>
    </div>
</div>

@endsection
