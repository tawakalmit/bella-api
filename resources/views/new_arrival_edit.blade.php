@extends('layouts.master')

<div id="modal-edit" class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0 bg-[rgba(0,0,0,.5)]">
    <form action="/new_arrival/{{$newArrival->id}}/update" enctype="multipart/form-data" method="post" class="relative w-6/12 min-h-[25rem] rounded-xl bg-white p-10 flex flex-col justify-between gap-5">
        @csrf
        <h1 class="text-center">Edit Image</h1>
        <div class="w-[20rem] h-[20rem] mx-auto cursor-pointer" onclick="clickImg()"><img class="w-full h-full object-cover" id="inputImage" src="/storage/image/{{$newArrival->image}}" alt="{{$newArrival->image_banner}}"></div>
        <div class="hidden w-9/12"><input type="file" class="file-input w-full" id="imageInput" name="image" onchange="imageChange(this)"/></div>
        <button class="relative btn btn-success text-white">Save Changes</button>
    </form>
</div>

@section('script')
<script>
    function imageChange (e) {
        const imgfile = URL.createObjectURL(e.files[0]);
        document.querySelector('#inputImage').src = imgfile;
    }
    function clickImg () {
        document.querySelector('#imageInput').click();
    }
</script>
@stop