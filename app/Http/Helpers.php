<?php

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;

function get_province($province_id){
    return Province::find($province_id);
}

function get_district($district_id){
    return District::find($district_id);
}

function get_ward($ward_id){
    return Ward::find($ward_id);
}

function get_provinces(){
    return Province::all();
}

function get_districts_by_province($province_id){
    return District::where('province_id', $province_id)->get();
}

function get_wards_by_district($district_id){
    return Ward::where('district_id', $district_id)->get();
}
?>