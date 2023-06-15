@extends('layouts.master')

<div id="modal-edit" class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0 bg-[rgba(0,0,0,.5)]">
    <form action="/products/{{$products->id}}/update" enctype="multipart/form-data" method="post" class="relative w-6/12 min-h-[25rem] rounded-xl bg-white p-10 flex flex-col gap-5">
        @csrf
        <h1 class="text-center">Edit Product Category</h1>
        <div class="flex gap-5">
            <div class="w-6/12">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Category ID</span></label>
                    <input type="number" placeholder="Type here" class="input input-bordered w-full" name="product_category_id" value="{{$products->product_category_id}}"/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Title</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="title" value="{{$products->title}}"/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Cover</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="cover" value="{{$products->cover}}"/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Layers</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="layers" value="{{$products->layers}}"/>
                </div>
                <div class="w-[10rem] cursor-pointer" onclick="clickImg()" style="margin-top:1rem;width:10rem;height:10rem"><img class="w-full h-full object-cover" id="inputImage" src="/storage/image_product/{{$products->image_product}}" alt="{{$products->image_product}}"></div>
                <div class="hidden w-9/12"><input type="file" class="file-input w-full" id="iconInput" name="image_product" onchange="imageChange(this)"/></div>
            </div>
            <div class="w-6/12">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Spring</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="spring" value="{{$products->spring}}"/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Height</span></label>
                    <input type="number" placeholder="Type here" class="input input-bordered w-full" name="height" value="{{$products->height}}"/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Headboard</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="headboard" value="{{$products->headboard}}"/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Ukuran</span></label>
                    <input type="number" placeholder="Type here" class="input input-bordered w-full" name="ukuran" value="{{$products->ukuran}}"/>
                </div>
            </div>
        </div>
        <button class="btn btn-success text-white">Submit</button>
        <div class="absolute -top-5 -right-5 text-white cursor-pointer" onclick="handleClose()">X</div>
    </form>
</div>

@section('script')
<script>
    function imageChange (e) {
        const imgfile = URL.createObjectURL(e.files[0]);
        document.querySelector('#inputImage').src = imgfile;
    }
    function clickImg () {
        document.querySelector('#iconInput').click();
    }
</script>
@stop