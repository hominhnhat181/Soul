@extends('backend.layouts.master')

@section('content')
    <div class="main_contain" id="admin">
        <div class="main_contain-hover">
            <div class="main_contain-title">
                <h2>Over View</h2>
            </div>
            <div class="main_contain-object row">
                <div class="object col-sm">
                    <div class="object_list">
                        <a href="">Total User</a>
                    </div>
                    <span>18</span>
                </div>
                <div class="object col-sm">
                    <div class="object_list">
                        <a href="">Total Feature</a>
                    </div>
                    <span>18</span>
                </div>
                <div class="object col-sm">
                    <div class="object_list">
                        <a href="">Total Album</a>
                    </div>
                    <span>18</span>
                </div>
            </div>
            <div class="main_contain-object row">
                <div class="object col-sm">
                    <div class="object_list">
                        <a href="">Total Genres</a>
                    </div>
                    <span>18</span>
                </div>
                <div class="object col-sm">
                    <div class="object_list">
                        <a href="">Total Track</a>
                    </div>
                    <span>18</span>
                </div>
                <div class="object col-sm">
                    <div class="object_list">
                        <a href="">Total Single & Band</a>
                    </div>
                    <span>18</span>
                </div>
            </div>
        </div>
    </div>
@endsection
