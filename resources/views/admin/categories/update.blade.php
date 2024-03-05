@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="min-height-200px">
        <!-- basic table  Start -->
        <div class="pd-20 card-box mb-30">
            <div>
                <h4 class="text-center h4 text-primary">UPDATE category DATA </h4>
            </div>

            <form method="POST" enctype="multipart/form-data"
                action="{{ route('admin.dashboard.categories.update', ['id' => $category->id]) }}">
                @csrf
                @method('put')
                <div class="row mt-5">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Title <span style="color: red">*</span> </label>
                            <input value="{{ $item->title }}" type="text" class="form-control" @required(true)
                                name="title"@required(true)>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>الأسم بالعربية<span style="color: red">*</span></label>
                            <input value="{{ $item->title_ar }}" class="form-control" type="text" name="title_ar"
                                @required(true) placeholder="الأسم بالعربية" required>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Description <span style="color: red">*</span> </label>
                            <textarea class="form-control" name="disc" id="" cols="30" rows="1" placeholder="Description"
                                required>{{ $item->disc }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>الوصف بالعربية<span style="color: red">*</span></label>
                            <textarea class="form-control" name="disc_ar" id="" cols="30" rows="1"
                                placeholder="الوصف بالعربية.." required>{{ $item->disc_ar }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row text-center">
                    <div class="col-sm-12 col-md-12">
                        <input class="btn btn-outline-primary btn-sm" type="submit" value="Save Changes">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
