@extends('admin.layouts.master')
@section('title', 'Category Details')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>Category Details</h4>

                            </div>
                            <div>
                                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Category List</a>
                            </div>
                        </div>
                        <div class="card-body text-dark">
                            <div class="p-2  text-center">
                                <img src="https://cdn-icons-png.freepik.com/512/5665/5665189.png" style="height: 100px; "
                                    alt="User-Profile-Image">
                            </div>
                            <br>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span>Category Name: </span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $category->name }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span>Category Status: </span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3"><b>
                                            @if ($category->status == 1)
                                                Published <i class="fas fa-circle text-c-green f-10 m-r-15" aria-hidden="true" style="color: green; mergin-left: 2px;"></i>
                                            @else
                                                Unpublished <i class="fas fa-circle text-c-red f-10 m-r-15" aria-hidden="true" style="color: red; mergin-left: 2px;"></i>
                                            @endif
                                        </b></p>
                                </div>
                            </div>

                            <br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
