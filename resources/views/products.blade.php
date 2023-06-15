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
            <th>Category</th>
            <th>Title</th>
            <th>Cover</th>
            <th>Layers</th>
            <th>Spring</th>
            <th>Height</th>
            <th>Headboard</th>
            <th>Ukuran</th>
            <th>Image Product</th>
            <th class="text-center">Action</th>
        </tr>
    </x-slot>
    <x-slot name="tableRow">
        @foreach ($products as $item)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td class="capitalize">{{$item->productcategory->title}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->cover}}</td>
                <td>{{$item->layers}}</td>
                <td>{{$item->spring}}</td>
                <td>{{$item->height}}</td>
                <td>{{$item->headboard}}</td>
                <td>{{$item->ukuran}}</td>
                <td><div class="w-[3rem] h-[3rem]"><img class="w-full h-full object-cover" src="/storage/image_product/{{$item->image_product}}" alt="{{$item->image_product}}"></div></td>
                <td class="flex items-center justify-center flex-col">
                    <a class="flex justify-center items-center w-full" href="/products/{{$item->id}}/edit">Edit</a>
                    <form action="/products/{{$item->id}}/delete" method="post">
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
    <form action="/products" enctype="multipart/form-data" method="post" class="relative w-6/12 min-h-[25rem] rounded-xl bg-white p-10 flex flex-col gap-5">
        @csrf
        <h1 class="text-center">Add Product</h1>
        <div class="flex gap-5">
            <div class="w-6/12">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Category ID</span></label>
                    <input type="number" placeholder="Type here" class="input input-bordered w-full" name="product_category_id" required/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Title</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="title" required/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Cover</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="cover" required/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Layers</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="layers" required/>
                </div>
                <div class="w-[10rem] cursor-pointer" onclick="clickImg()" style="margin-top:1rem;"><img class="w-full h-full object-cover" id="inputImage" src="/storage/notfound.webp" alt=""></div>
                <div class="hidden w-9/12"><input type="file" class="file-input w-full" id="iconInput" name="image_product" onchange="imageChange(this)" required/></div>
            </div>
            <div class="w-6/12">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Spring</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="spring" required/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Height</span></label>
                    <input type="number" placeholder="Type here" class="input input-bordered w-full" name="height" required/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Headboard</span></label>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full" name="headboard" required/>
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text">Ukuran</span></label>
                    <input type="number" placeholder="Type here" class="input input-bordered w-full" name="ukuran" required/>
                </div>
            </div>
        </div>
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