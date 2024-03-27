@extends('admin.layouts.master')
@section('title', 'Add Category')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>Add Category</h4>
                            </div>
                            <div>
                                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Category List</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('categories.store') }}" method="post">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-4" required>Category Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" placeholder="Category Name" value="{{ old('name') }}"/>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 " required>Publication Status <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" checked value="1" />
                                            Published</label>
                                        <label for=""><input type="radio" name="status" value="0" />
                                            Unpublished</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-4 ">
                                        <input type="submit" value="create" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
