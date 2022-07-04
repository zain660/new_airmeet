<form @if($request->req_type == "create") action="{{route('create_subscription')}}" @else action="{{route('update_subscription',$id)}}" @endif method="post">
    @csrf
    {{-- {{dd($request->all())}} --}}
    @if($request->req_type == "edit")
    @php
        $package_id = $subscription->package_id;
        $name = $subscription->name;
        $subscription_type = $subscription->subscription_type;
        $subs_duration = $subscription->subs_duration;
        $monthly_yearly = $subscription->monthly_yearly;
        $price = $subscription->price;
        $total_registration = $subscription->total_registration;
    @endphp
    @else 
        @php
        $package_id = null;
        $name = null;
        $subscription_type = null;
        $subs_duration = null;
        $monthly_yearly = null;
        $price = null;
        $total_registration = null;
        @endphp        
    @endif
    
    @php
        $packages = App\Models\Package::where('id',$subscription->package_id)->get();
    @endphp
    <div class="row">
        <div class="container">
            <label for="package_id">Select Package</label>
            <select name="package_id" required id="package_id" class="form-control">
                @foreach ($packages as $item)
                    <option value="{{$item->id}}" @if($package_id == $item->id) selected @endif>{{$item->shot_description}}</option>
                @endforeach
            </select>
        </div>
        <div class="py-4 col-4">
            <label for="name">Subscription Name</label>
            <input type="text" name="name" required id="name" value="{{$name}}" class="form-control">
        </div>
        <div class="col-4 py-4">
            <label for="subscription_type">Subscription Type</label>
            <select name="subscription_type" required id="subscription_type" class="form-control">
                <option value="0" @if($subscription_type == 0) selected @endif>Subscriptions</option>
                <option value="1"@if($subscription_type == 1) selected @endif>One Time Payment</option>
            </select>
        </div>
        <div class="col-4 py-4">
            <label for="subscription_type">Subscription Duration</label>
            <div class="row">
                <div class="col-4">
                    <select name="subs_duration" required id="subs_duration" class="form-control">
                        <option value="1"@if($subs_duration == 1) selected @endif>1</option>
                        <option value="2"@if($subs_duration == 2) selected @endif>2</option>
                        <option value="3"@if($subs_duration == 3) selected @endif>3</option>
                        <option value="4"@if($subs_duration == 4) selected @endif>4</option>
                        <option value="5"@if($subs_duration == 5) selected @endif>5</option>
                        <option value="6"@if($subs_duration == 6) selected @endif>6</option>
                        <option value="7"@if($subs_duration == 7) selected @endif>7</option>
                        <option value="8"@if($subs_duration == 8) selected @endif>8</option>
                        <option value="9"@if($subs_duration == 9) selected @endif>9</option>
                        <option value="10"@if($subs_duration == 10) selected @endif>10</option>
                        <option value="11"@if($subs_duration == 11) selected @endif>11</option>
                        <option value="12"@if($subs_duration == 12) selected @endif>12</option>
                    </select>
                </div>
                <div class="col-7">
                    <select name="monthly_yearly" required id="subs_duration"class="form-control">
                        <option value="1" @if($monthly_yearly == 1) selected @endif>Yearly</option>
                        <option value="0" @if($monthly_yearly == 0) selected @endif>Monthly</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-4">
            <label for="price">Price</label>
            <input type="number" min="1" value="{{$price}}" name="price" required id="price" class="form-control">
        </div>
        <div class="col-4">
            <label for="total_registration">Total Registration</label>
            <input type="number" min="1"  value="{{$total_registration}}" name="total_registration" required id="total_registration" class="form-control">
        </div>
    </div>
    <div class="container py-4">
        <div class="form-footer">
            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            <a href="/admin/packages" class="btn btn-info"><i class="fa fa-primary"></i> Cancel</a>

        </div>
    </div>
</form>