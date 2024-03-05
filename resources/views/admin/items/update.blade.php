@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="min-height-200px">
        <!-- basic table  Start -->
        <div class="pd-20 card-box mb-30">
            <div>
                <h4 class="text-center h4 text-primary">UPDATE ITEM DATA </h4>
            </div>

            <form method="POST" enctype="multipart/form-data"
                action="{{ route('admin.dashboard.items.update', ['id' => $item->id]) }}">
                @csrf
                @method('put')
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12 ">
                        <img src="{{ asset($item->image_one) }}" width="100%" height="100%" alt="">
                    </div>
                    <div class="col-md-9 col-sm-12 mt-5">
                        <div class="form-group ">
                            <label class="custom-file-label file-name">Choose Image <span style="color: red">*</span>
                            </label>
                            <input type="file" name="image_one" class="custom-file-input file-input ">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12 ">
                        <img src="{{ asset($item->image_two) }}" width="100%" height="100%" alt="">
                    </div>
                    <div class="col-md-9 col-sm-12 mt-5">
                        <div class="form-group ">
                            <label class="custom-file-label file-name">Choose Image </label>
                            <input type="file" name="image_two" class="custom-file-input file-input ">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12 ">
                        <img src="{{ asset($item->image_three) }}" width="100%" height="100%" alt="">
                    </div>
                    <div class="col-md-9 col-sm-12 mt-5">
                        <div class="form-group ">
                            <label class="custom-file-label file-name">Choose Image </label>
                            <input type="file" name="image_three" class="custom-file-input file-input ">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12 ">
                        <img src="{{ asset($item->image_four) }}" width="100%" height="100%" alt="">
                    </div>
                    <div class="col-md-9 col-sm-12 mt-5">
                        <div class="form-group ">
                            <label class="custom-file-label file-name">Choose Image </label>
                            <input type="file" name="image_four" class="custom-file-input file-input ">
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Title <span style="color: red">*</span> </label>
                            <input value="{{ $item->title }}" type="text" class="form-control" @required(true)
                                name="title" >
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group text-right">
                            <label><span style="color: red">*</span>الأسم بالعربية</label>
                            <input value="{{ $item->title_ar }}" class="form-control text-right" type="text" name="title_ar"
                                @required(true) placeholder="الأسم بالعربية" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Price <span style="color: red">*</span> </label>
                            <input value="{{ $item->item_price }}" type="number" class="form-control" @required(true)
                                name="item_price" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Length  (optional)</label>
                            <input value="{{ $item->length }}" type="number" class="form-control" placeholder="xxx cm"
                                name="length">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Width (optional)</label>
                            <input value="{{ $item->width }}" class="form-control" type="number" name="width"
                                 placeholder="xxx cm">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12 text-center mt-5">
                        <h4>OR</h4>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label>Size  (optional)</label>
                            <select name="size_id" class="custom-select2 form-control select2-hidden-accessible"
                                style="width: 100%; height: 38px" tabindex="-1" aria-hidden="true">
                                @if ($item->size_id)
                                    <option value="{{ $item->sizes->id }}">{{ $item->sizes->size_value }} </option>
                                @endif
                                <option value="0">NONE</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size_value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Description <span style="color: red">*</span> </label>
                            <textarea class="form-control" name="disc" id="" cols="30" rows="1"
                                placeholder="Description" required>{{ $item->disc }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group text-right">
                            <label><span style="color: red">*</span>الوصف بالعربية</label>
                            <textarea class="form-control text-right" name="disc_ar" id="" cols="30" rows="1"
                                placeholder="الوصف بالعربية.." required>{{ $item->disc_ar }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Category <span style="color: red">*</span></label>
                            <select name="category_id" class="custom-select2 form-control select2-hidden-accessible"
                                style="width: 100%; height: 38px" tabindex="-1" aria-hidden="true">
                                <option value="{{ $item->category_id }}">{{ $item->categories->title }}
                                    {{ $item->categories->title_ar }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }} {{ $category->title_ar }}
                                    </option>
                                @endforeach
                            </select>
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
