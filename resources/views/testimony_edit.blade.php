@extends('layouts.master')

@section('table')

@if (session('status'))
<div class="w-full alert mb-5 alert-success">
    <p class="text-center text-white">{{ session('status') }}</p>
</div>
@endif

<div id="modal-edit" class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0 bg-[rgba(0,0,0,.5)]">
    <form action="/testimonies/{{$testimonies->id}}/update" enctype="multipart/form-data" method="post" class="relative w-6/12 min-h-[25rem] rounded-xl bg-white p-10 flex flex-col gap-5">
        @csrf
        <h1 class="text-center">Edit Testimony</h1>
        <div class="form-control w-full">
            <label class="label"><span class="label-text">Name</span></label>
            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="name" value="{{$testimonies->name}}"/>
        </div>
        <div class="form-control w-full">
            <label class="label"><span class="label-text">Role</span></label>
            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="role" value="{{$testimonies->role}}"/>
        </div>
        <div class="form-control w-full">
            <label class="label"><span class="label-text">Review</span></label>
            <input type="text" placeholder="Type here" class="input input-bordered w-full" name="review" value="{{$testimonies->review}}"/>
        </div>
        <div class="w-[10rem] cursor-pointer" onclick="clickImg()" style="margin-top:1rem;"><img class="w-full h-full object-cover" id="inputImage" src="/storage/avatar/{{$testimonies->avatar}}" alt=""></div>
        <div class="hidden w-9/12"><input type="file" class="file-input w-full" id="iconInput" name="avatar" onchange="imageChange(this)"/></div>
        <button class="btn btn-success text-white">Submit</button>
    </form>
</div>
@stop

@section('script')
<script>
    function handleAdd () {
        document.querySelector('#modal-add').classList.remove('invisible');
    }
    function handleClose () {
        document.querySelector('#modal-add').classList.add('invisible');
    }
    function imageChange (e) {
        const imgfile = URL.createObjectURL(e.files[0]);
        document.querySelector('#inputImage').src = imgfile;
    }
    function clickImg () {
        document.querySelector('#iconInput').click();
    }
</script>
@stop