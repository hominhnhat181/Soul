@extends('backend.layouts.master')

@section('content')
<div class="row gutters">

    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        <div class="user-avatar">
                            <div id="profile-container">
                                <img id="profileImage" src="layout/images/ab67706f0000000363c0962414ef11568a242070.jpg">
                            </div>
                            <input id="imageUpload" type="file" name="avatar"
                                value="ab67706f0000000363c0962414ef11568a242070.jpg">
                            <input type="hidden" name="avatar_origin"
                                value="ab67706f0000000363c0962414ef11568a242070.jpg">
                        </div>
                        <h5 class="user-name">Hồ Minh Nhật</h5>
                        <h6 class="user-email">hominhnhat181@gmail.com</h6>
                    </div>
                    <div class="about">
                        <h5 class="mb-2 text-primary">Regency</h5>
                        <p>Member</p>
                        <p style="position: relative; bottom: -88px">Join Date <br> June 23, 2021</p>

                        <img style="max-height: 100px; position: relative; top: -72px"
                            src="http://localhost/myproject/public/layout/images/member.png" alt="Member"
                            title="MEMBER">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">

                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-3 text-primary">Personal Details</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="form-control" name="name" id="fullName" value="Hồ Minh Nhật"
                                placeholder="Enter full name">
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="website">New Password</label>
                            <input type="password" name="password" class="form-control" id="website"
                                placeholder="Enter new Password">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value=""
                                placeholder="Enter phone number">
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="website">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="website"
                                placeholder="Enter new Password">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="eMail">Email</label>
                            <input type="email" class="form-control" name="email" id="eMail"
                                value="hominhnhat181@gmail.com" placeholder="Enter email ID">
                        </div>
                    </div>
                </div>
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-3 text-primary">Address</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="Street">Street</label>
                            <input type="name" class="form-control" name="street" value="" id="Street"
                                placeholder="Enter Street">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="ciTy">City</label>
                            <input type="name" class="form-control" name="city" id="ciTy" value=""
                                placeholder="Enter City">
                        </div>
                    </div>

                </div>
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            <a type="button" href="http://localhost/myproject/public/luis"
                                class="btn btn-secondary">Cancel</a>
                            <input class="btn btn-secondary" style="background-color: rgb(158, 216, 153)" type="submit"
                                value="Update">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection