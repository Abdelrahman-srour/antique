@extends('admin.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'Antique - Dashboard')
@section('content')
    <div class="min-height-200px">
        <!-- basic table  Start -->
        <div class="pd-20 card-box mb-30">
            <div>
                <h4 class="text-center h4 text-primary">ADD ITEM+</h4>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.dashboard.items.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="custom-file-label file-name">Choose Image <span style="color: red">*</span></label>
                            <input type="file" name="image_one" class="custom-file-input file-input" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="custom-file-label file-name">Choose Image</label>
                            <input type="file" name="image_two" class="custom-file-input file-input">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="custom-file-label file-name">Choose Image</label>
                            <input type="file" name="image_three" class="custom-file-input file-input">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="custom-file-label file-name">Choose Image</label>
                            <input type="file" name="image_four" class="custom-file-input file-input">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Title <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group text-right">
                            <label><span style="color: red">*</span>الأسم بالعربية</label>
                            <input class="form-control text-right" type="text" name="title_ar"
                                placeholder="ادخل الاسم بالعربية" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Price<span style="color: red">*</span></label>
                            <input class="form-control" type="number" name="item_price" placeholder="Enter Price" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Length (optional)</label>
                            <input type="number" class="form-control" placeholder="Enter Length" name="length">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Width (optional)</label>
                            <input class="form-control" type="number" placeholder="Enter Width" name="width">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12 text-center mt-5">
                        <h4>OR</h4>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label>Size optional</label>
                            <select name="size_id" class="custom-select2 form-control select2-hidden-accessible"
                                style="width: 100%; height: 38px" tabindex="-1" aria-hidden="true">
                                <option value="0">NONE</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size_value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Description<span style="color: red">*</span></label>
                            <textarea class="form-control" name="disc" id="" cols="30" rows="3"
                                placeholder="Enter Description" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group text-right">
                            <label> <span style="color: red">*</span>الوصف بالعربية</label>
                            <textarea class="form-control text-right" name="disc_ar" id="" cols="30" rows="3"
                                placeholder="ادخل الوصف" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Category<span style="color: red">*</span></label>
                            <select name="category_id" class="custom-select2 form-control select2-hidden-accessible"
                                style="width: 100%; height: 38px" tabindex="-1" aria-hidden="true" required>
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
                        <input class="btn btn-outline-primary btn-sm" type="submit" value="SUBMIT">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const sizeSelect = document.querySelector('#sizes');

        sizeSelect.addEventListener('mousedown', function(e) {
            // Prevent the default click event from firing
            e.preventDefault();

            // Get the option that was clicked
            const selectedOption = e.target;

            // Toggle the selected state of the option
            selectedOption.selected = !selectedOption.selected;
        });
    </script>
@endsection
