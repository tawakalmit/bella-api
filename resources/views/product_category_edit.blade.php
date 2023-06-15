@extends('layouts.master')

<div id="modal-edit" class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0 bg-[rgba(0,0,0,.5)]">
    <form action="/product_category/{{$productCategory->id}}/update" enctype="multipart/form-data" method="post" class="relative w-6/12 min-h-[25rem] rounded-xl bg-white p-10 flex flex-col gap-5">
        @csrf
        <h1 class="text-center">Edit Product Category</h1>
        <div class="form-control w-full">
            <label class="label"><span class="label-text">Title</span></label>
            <input type="text" placeholder="Type here" name="title" class="input input-bordered w-full" name="title" value="{{$productCategory->title}}"/>
        </div>
        <div class="w-[10rem] cursor-pointer" onclick="clickImg()"><img class="w-full h-full object-cover" id="inputImage" src="/storage/image/{{$productCategory->image}}" alt="{{$productCategory->icon}}"></div>
        <div class="hidden w-9/12"><input type="file" class="file-input w-full" id="iconInput" name="image" onchange="imageChange(this)"/></div>
        <button class="btn btn-success text-white">Submit</button>
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