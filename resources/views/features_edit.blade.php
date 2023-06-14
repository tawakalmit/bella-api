@extends('layouts.master')

{{-- <div id="modal-edit" class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0 bg-[rgba(0,0,0,.5)]">
    <form action="/features/{{$features->id}}/update" enctype="multipart/form-data" method="post" class="relative w-[20rem] min-h-[25rem] rounded-xl bg-white p-10 flex flex-col gap-5">
        @csrf
        <h1 class="text-center">Edit Data</h1>
        <div class="form-control w-full max-w-xs">
            <label class="label"><span class="label-text">Title</span></label>
            <input type="text" placeholder="Type here" name="title" class="input input-bordered w-full max-w-xs" value="{{$features->title}}" name="title"/>
        </div>
        <div class="form-control w-full max-w-xs">
            <label class="label"><span class="label-text">Description</span></label>
            <input type="text" placeholder="Type here" name="description" class="input input-bordered w-full max-w-xs" value="{{$features->description}}" name="description" />
        </div>
        <div><img src="/storage/icon/{{$features->icon}}" alt="{{$features->icon}}"></div>
        <div class="hidden w-9/12"><input type="file" class="file-input w-full max-w-xs" name="icon"/></div>
        <button class="btn btn-success">Submit</button>
    </form>
</div> --}}

<div id="modal-edit" class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0 bg-[rgba(0,0,0,.5)]">
    <form action="/features/{{$features->id}}/update" enctype="multipart/form-data" method="post" class="relative w-6/12 min-h-[25rem] rounded-xl bg-white p-10 flex flex-col gap-5">
        @csrf
        <h1 class="text-center">Edit Data</h1>
        <div class="form-control w-full">
            <label class="label"><span class="label-text">Title</span></label>
            <input type="text" placeholder="Type here" name="title" class="input input-bordered w-full" name="title" value="{{$features->title}}"/>
        </div>
        <div class="form-control w-full">
            <label class="label">
              <span class="label-text">Description</span>
            </label>
            <input type="text" placeholder="Type here" name="description" class="input input-bordered w-full" name="title" value="{{$features->description}}"/>
          </div>
        <div class="w-[10rem] cursor-pointer" onclick="clickImg()"><img class="w-full h-full object-cover" id="inputImage" src="/storage/icon/{{$features->icon}}" alt="{{$features->icon}}"></div>
        <div class="hidden w-9/12"><input type="file" class="file-input w-full" id="iconInput" name="icon" onchange="imageChange(this)"/></div>
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