@extends('backend.layouts.master')

@section('content')
<form action="{{Route('admin.profile.update',['id'=>$admins->id])}}" method="POST" style="all: unset">
    @csrf
    {{-- {{ method_field('PUT') }} --}}
    <div class="row gutters_account">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <div id="profile-container">
                                    <img id="profileImage" src="{{Url('front/images/'.$admins->image)}}">
                                </div>
                                <input id="imageUpload" type="file" name="image" value="{{$admins->image}}">
                            </div>
                            <h5 style="font-weight: 500" class="user-name">{{$admins->name}}</h5>
                            <h5 style="font-weight: 500" class="user-email">{{$admins->email}}</h5>
                        </div>
                        <div class="about">
                            <h5 class="mb-2 text-primary">Adminstrator</h5>
                            <p>Manager</p>
                            <p style="position: relative; bottom: -88px">Join Date
                                <br>{{$admins->created_at->toDateString()}}</p>

                            <img style="max-height: 100px; position: relative; top: -72px"
                                src="http://localhost/myproject/public/layout/images/member.png" alt="Member"
                                title="MEMBER">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body" style="display: flex">
                    <div class="row gutters col-xl-6">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-3 text-primary">Personal Details</h6>
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" name="name" id="fullName"
                                    value="{{$admins->name}}" placeholder="Enter full name">
                            </div>
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <input type="email" class="form-control" name="email" id="eMail"
                                    value="{{$admins->email}}" placeholder="Enter email ID">
                            </div>
                            {{-- <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value=""
                                    placeholder="Enter phone number">
                            </div> --}}
                            <div class="form-group">
                                <label for="website">New Password</label>
                                <input autocomplete="off" type="password" name="password" class="form-control"
                                    id="website" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="website">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="website"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters col-xl-6">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-3 text-primary">Address</h6>
                            <div class="form-group">
                                <label for="Street">Province</label>
                                <select id="city-dd" class="custom-select  mb-3 " name="city_id" >
                                    <option value="{{$admins->city_id}}">{{__('— Choose province —')}}</option>
                                    @foreach(\App\Models\Province::orderBy('name','asc')->get() as $province)
                                        <option value="{{ $province->id }}" {!! isset($admins) && $admins->city_id == $province->id ? ' selected' : null !!}>{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ciTy">District</label>
                                <select id="district-dd" class="custom-select mb-3" name="district_id"  >
                                    <option value="{{$admins->district_id}}">{{__('— Choose district —')}}</option>
                                    @if(!empty($admins->city_id))
                                        @foreach(get_districts_by_province($admins->city_id) as $district)
                                        <option value="{{ $district->id }}"{!! isset($admins) && $admins->district_id == $district->id ? ' selected' : null !!}>{{ $district->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Street">Ward</label>
                                <select id="ward-dd" class="custom-select mb-3" name="ward_id" >
                                    <option value="{{$admins->ward_id}}">{{__('— Choose Ward —')}}</option>
                                    @if(!empty($admins->district_id))
                                        @foreach(get_wards_by_district($admins->district_id) as $ward)
                                        <option value="{{ $ward->id }}"{!! isset($admins) && $admins->ward_id == $ward->id ? ' selected' : null !!}>{{ $ward->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Street">Address</label>
                                <input type="name" class="form-control" name="address" value="{{$admins->address}}" id="Street"
                                    placeholder="Enter Street">
                            </div>
                            <div class="text-right" style="all: unset">
                                <a type="button" href="{{route('admin.dashboard')}}"
                                    class="btn btn-secondary">Cancel</a>
                                <input class="btn btn-secondary" style="background-color: rgb(158, 216, 153)"
                                    type="submit" value="Update">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#city-dd').on('change', function () {
            var cityId = this.value;
            $.ajax({
                url: "{{route('ajax.get.district')}}",
                type: "POST",
                data: {
                    province_id: cityId,
                    "_token": "{{ csrf_token() }}"
                },
                
                success: function (data) {
                    $('#district-dd').html(data);
                },
                error: function(xhr){
                    console.log(xhr.responseText); // Save time
                }  
            });
        });
        $('#district-dd').on('change', function () {
            var districtId = this.value;
            $.ajax({
                url: "{{route('ajax.get.ward')}}",
                type: "POST",
                data: {
                    district_id: districtId,
                    "_token": "{{ csrf_token() }}"
                },

                success: function (data) {
                    $('#ward-dd').html(data);
                },
                error: function(xhr){
                    console.log(xhr.responseText); // Save time
                }
            });
        });
    });

</script>