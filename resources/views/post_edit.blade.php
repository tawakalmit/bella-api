@extends('layouts.master')

@section('table')

<div id="modal-edit" class="fixed flex items-center justify-center top-0 left-0 right-0 bottom-0 bg-[rgba(0,0,0,.5)]">
    <form action="/posts/{{$post->id}}/update" enctype="multipart/form-data" method="post" class="relative w-9/12 min-h-[40rem] rounded-xl bg-white p-10 flex flex-col gap-5">
        @csrf
        <h1 class="text-center">Edit Post</h1>
        <div class="w-full flex gap-5">
            <div class="w-3/12 flex flex-col">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Category ID</span></label>
                    <input type="number" placeholder="Type here" class="input input-bordered w-full" name="category_id" value="{{$post->category_id}}"/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Slug</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="slug" value="{{$post->slug}}"/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Title</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="title" value="{{$post->title}}"/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Excerpt</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="excerpt" value="{{$post->excerpt}}"/>
                </div>
                <select class="select w-full max-w-xs" name="publish_status" style="margin-top:1rem;" value="{{$post->publish_status}}">
                    <option disabled selected>Publish Status</option>
                    <option type="number" value="1">True</option>
                    <option type="number" value="0">False</option>
                </select>
                <div class="w-[10rem] cursor-pointer" onclick="clickImg()" style="margin-top:1rem;"><img class="w-full h-full object-cover" id="inputImage" src="/storage/image_headline/{{$post->image_headline}}" alt="{{$post->image_headline}}"></div>
                <div class="hidden w-9/12"><input type="file" class="file-input w-full" id="iconInput" name="image_headline" onchange="imageChange(this)"/></div>
            </div>
            <div class="w-9/12">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Content</span></label>
                    <textarea name="content" id="content" cols="30" rows="20">{{$post->content}}</textarea>
                </div>
            </div>
        </div>
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