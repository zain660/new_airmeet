@extends('layouts.admin_layout')
@section('content')

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('add_subscription',[],['req_type' => 'create'])}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Subscriptions</a>
                           <div class="row py-4">
                              @if ($subscription->count() > 0)
                              @foreach ($subscription as $item)
                              <div class="col-4 shadow p-3 mb-5 bg-white rounded">
                                  <h5>{{$item->name}}</h5>
                                    <p>{{env('CURRENCY_SYMBOL')}}{{$item->price}}</p>
                                    @if ($item->subscription_type == 0)
                                        Subscription
                                    @else
                                        One Time Payment
                                    @endif <br>
                                    <strong>{{$item->total_registration}}</strong> Total Registration
                                    <hr>
                                    <a href="/admin/packages/subscription-edit/{{$item->id}}?req_type=edit" class="btn btn-info">Edit</a> | <a href="{{route('subscription_delete',$item->id)}}" class="btn btn-danger">Delete</a>
                               </div>
                              @endforeach
                              @else
                              <div class="col-4 col-md-8">
                                 No subscription found.
                              </div>
                              @endif
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection