<form @if($request->req_type == 'create') action="{{route('create_package_type')}}" @else action="{{route('update_package_type',$id)}}" @endif method="post">
    @csrf
    @if ($request->req_type == 'edit')
        @php
          $package_type = App\Models\PackagesType::where('id',$id)->first();
          $name = $package_type->package_type;
          $short_desc = $package_type->short_desc;
        @endphp
    @else
        @php
             $name = null;
             $short_desc = null;
        @endphp
    @endif
    <div class="container">
        <label for="package_type">Package Type Name</label>
        <input type="text" name="package_type" id="package_type" value="{{$name}}" class="form-control" required><br>
        <label for="short_desc">Package Shor Description</label>
        <textarea name="short_desc" id="short_desc" value="{{$short_desc}}" class="form-control" required></textarea>

        <hr>
        <div class="form-footer py-4">
            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            <a href="{{route('all_package_type')}}" class="btn btn-info"><i class="fa fa-Reply-Line"></i> Cancel</a>
            
        </div>
    </div>
 
</form>