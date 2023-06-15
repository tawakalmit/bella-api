@extends('layouts.master')

@section('table')

@if (session('status'))
<div class="w-full alert mb-5 alert-success">
    <p class="text-center text-white">{{ session('status') }}</p>
</div>
@endif

<div class="w-full flex justify-end mb-10">
    <button onclick="handleAdd()" class="btn btn-primary">Add New</button>
</div>
<x-table>
    <x-slot name="tableHead">
        <tr>
            <th></th>
            <th>Image Headline</th>
            <th>Category</th>
            <th>Title</th>
            <th>Excerpt</th>
            <th>Slug</th>
            <th>Publish Status</th>
            <th class="text-center">Action</th>
        </tr>
    </x-slot>
    <x-slot name="tableRow">
        @foreach ($post as $item)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td><div class="w-[3rem] h-[3rem]"><img class="w-full h-full object-cover" src="/storage/image_headline/{{$item->image_headline}}" alt="{{$item->image_headline}}"></div></td>
                <td>{{$item->category_id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->excerpt}}</td>
                <td>{{$item->slug}}</td>
                <td>{{$item->publish_status}}</td>
                <td class="flex items-center justify-center flex-col">
                    <a class="flex justify-center items-center w-full" href="/posts/{{$item->id}}/edit">Edit</a>
                    <form action="/posts/{{$item->id}}/delete" method="post">
                        @csrf
                        @method('delete')
                    <button class="btn btn-ghost btn-xs text-[#e74c3c]" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-table>
<div id="modal-add" class="invisible fixed flex items-center justify-center top-0 left-0 right-0 bottom-0 bg-[rgba(0,0,0,.5)]">
    <form action="/posts" enctype="multipart/form-data" method="post" class="relative w-9/12 min-h-[40rem] rounded-xl bg-white p-10 flex flex-col gap-5">
        @csrf
        <h1 class="text-center">Add Post</h1>
        <div class="w-full flex gap-5">
            <div class="w-3/12 flex flex-col">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Category ID</span></label>
                    <input type="number" placeholder="Type here" class="input input-bordered w-full" name="category_id" required/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Slug</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="slug" required/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Title</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="title" required/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Excerpt</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="excerpt" required/>
                </div>
                <select class="select w-full max-w-xs" name="publish_status" style="margin-top:1rem;">
                    <option disabled selected>Publish Status</option>
                    <option type="number" value="1">True</option>
                    <option type="number" value="0">False</option>
                </select>
                <div class="w-[10rem] cursor-pointer" onclick="clickImg()" style="margin-top:1rem;"><img class="w-full h-full object-cover" id="inputImage" src="/storage/notfound.webp" alt=""></div>
                <div class="hidden w-9/12"><input type="file" class="file-input w-full" id="iconInput" name="image_headline" onchange="imageChange(this)" required/></div>
            </div>
            <div class="w-9/12">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Content</span></label>
                    {{-- <input type="text" placeholder="Type here" class="input input-bordered w-full" name="content" required/> --}}
                    <textarea name="content" id="content" cols="30" rows="20"></textarea>
                </div>
            </div>
        </div>
        <button class="btn btn-success text-white">Submit</button>
        <div class="absolute top-3 right-3 text-black font-bold text-2xl cursor-pointer" onclick="handleClose()">X</div>
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