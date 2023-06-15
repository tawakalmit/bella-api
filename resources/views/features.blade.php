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
            <th>Title</th>
            <th>Description</th>
            <th>Icon</th>
            <th>Action</th>
        </tr>
    </x-slot>
    <x-slot name="tableRow">
        @foreach ($features as $item)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->description}}</td>
                <td><div class="w-[3rem] h-[3rem]"><img class="w-full h-full object-cover" src="/storage/icon/{{$item->icon}}" alt="{{$item->icon}}"></div></td>
                <td class="flex items-start justify-start flex-col">
                    <a class="flex justify-center items-center w-full" href="/features/{{$item->id}}/edit">Edit</a>
                    <form action="/features/{{$item->id}}/delete" method="post">
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
    <form action="/features" enctype="multipart/form-data" method="post" class="relative w-6/12 min-h-[25rem] rounded-xl bg-white p-10 flex flex-col gap-5">
        @csrf
        <h1 class="text-center">Add New Data</h1>
        <div class="form-control w-full">
            <label class="label"><span class="label-text">Title</span></label>
            <input type="text" placeholder="Type here" name="title" class="input input-bordered w-full" name="title" required/>
        </div>
        <div class="form-control w-full">
            <label class="label">
              <span class="label-text">Description</span>
            </label>
            <textarea class="textarea textarea-bordered h-24" placeholder="Type Here" name="description" required></textarea>
          </div>
        <div class="w-[10rem] cursor-pointer" onclick="clickImg()"><img class="w-full h-full object-cover" id="inputImage" src="/storage/notfound.webp" alt=""></div>
        <div class="hidden w-9/12"><input type="file" class="file-input w-full" id="iconInput" name="icon" onchange="imageChange(this)" required/></div>
        <button class="btn btn-success text-white">Submit</button>
        <div class="absolute -top-5 -right-5 text-white cursor-pointer" onclick="handleClose()">X</div>
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