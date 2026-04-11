@extends('layouts.auth')
@section('css')
<style>
  select.form-control[size], select.asColorPicker-input[size], .dataTables_wrapper select[size], .jsgrid .jsgrid-table .jsgrid-filter-row select[size], .select2-container--default select.select2-selection--single[size], .select2-container--default .select2-selection--single select.select2-search__field[size], select.typeahead[size], select.tt-query[size], select.tt-hint[size], select.form-control[multiple], select.asColorPicker-input[multiple], .dataTables_wrapper select[multiple], .jsgrid .jsgrid-table .jsgrid-filter-row select[multiple], .select2-container--default select.select2-selection--single[multiple], .select2-container--default .select2-selection--single select.select2-search__field[multiple], select.typeahead[multiple], select.tt-query[multiple], select.tt-hint[multiple], textarea.form-control, textarea.asColorPicker-input, .select2-container--default textarea.select2-selection--single, .select2-container--default .select2-selection--single textarea.select2-search__field, textarea.typeahead, textarea.tt-query, textarea.tt-hint {
    min-height: 5rem !important;
}
</style>
@endsection
@section('content')
 <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <h4 class="card-title">Events</h4>
                    <p class="card-description">All Location Events</p>
                    <form class="forms-sample" action="{{route('events.store')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Enter a Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Enter a Description">{{old('description')}}</textarea>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Category</label> 
                        <select class="form-control" id="exampleSelectGender" name="category">
                          <option value="" disabled selected>Select a Category</option>
                          @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('category') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                          @endforeach
                          <!-- <option>Female</option> -->
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Location</label>
                        <select class="form-control" id="exampleSelectGender" name="location">
                          <option value="" disabled selected>Select a Location</option>
                          <option value="ahmedabad" {{old('location') == 'ahmedabad' ? 'selected' : ''}}>Ahmedabad</option>
                          <option value="mumbai" {{old('location') == 'mumbai' ? 'selected' : ''}}>Mumbai</option>
                          <option value="banglore" {{old('location') == 'banglore' ? 'selected' : ''}}>Banglore</option>
                          <option value="hyderabad" {{old('location') == 'hyderabad' ? 'selected' : ''}}>Hyderabad</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Type</label>
                        <select class="form-control" id="exampleSelectGender" name="type">
                          <option value="" disabled selected>Select a Category</option>
                          <option value="free" {{old('type') == 'free' ? 'selected' : ''}}>Free</option>
                          <option value="paid" {{old('type') == 'paid' ? 'selected' : ''}}>Paid</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Price</label>
                        <input type="number" name="price" class="form-control" id="exampleInputCity1" value="{{old('price')}}" placeholder="Enter Event Price">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputCity1">Start Date</label>
                        <input type="date" class="form-control" id="exampleInputCity1" name="s_date" value="{{old('s_date')}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">End Date</label>
                        <input type="date" class="form-control" id="exampleInputCity1" name="e_date" value="{{old('e_date')}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Max Attendance</label>
                        <input type="number" class="form-control" id="max_attendance" name="max_attendance" value="{{old('max_attendance')}}" placeholder="1">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <!-- <button class="btn btn-dark">Cancel</button> -->
                      <a href="{{route('events.index')}}" class="btn btn-dark">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
@endsection