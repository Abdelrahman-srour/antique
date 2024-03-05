@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="pd-20">
            <h4 class="text-primary h4 text-center">ADD CATEGORY</h4>
        </div>

        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.dashboard.categories.store') }}">
            @csrf
            @method('post')
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Title <span style="color: red">*</span></label>
                        <input class="form-control" type="text" name="title" placeholder="title" required>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group text-right">
                        <label><span style="color: red">*</span>الأسم بالعربية </label>
                        <input class="form-control text-right" type="text" name="title_ar" placeholder="الأسم بالعربية" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Description <span style="color: red">*</span></label>
                        <textarea class="form-control" type="text" name="disc" placeholder="type..." required cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group text-right">
                        <label><span style="color: red">*</span>الوصف بالعربية </label>
                        <textarea class="form-control text-right" type="text" name="disc_ar" placeholder="... اكتب الوصف" required cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group row text-center">
                <div class="col-sm-12 col-md-12">
                    <input class="btn btn-outline-primary btn-sm " type="submit" value="SUBMIT">
                </div>
            </div>
        </form>

    </div>
@endsection
