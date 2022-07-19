
@extends('layouts.app')
@section('header')
<div class=" flex justify-between ">
    <h3>Create New Project.</h3>
    <a href="/project" class=" text-gray-400">cancel</a></div>

@endsection
@section('content')
<div class="container mx-auto mt-3">
<div class="flex h-full items-center justify-start bg-gray-50 rounded-md">
  <div class="mx-auto w-full max-w-lg my-8" >
    <form action="/project" method="POST" class="mx-auto w-full max-w-[550px]">
    @csrf
    @method('post')
       <div class="mb-5">
        <label
          for="name"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Title
        </label>
        <input
          type="text"
          name="title"
          id="name"
          placeholder="Title"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
      </div>
            <div class="mb-5">
        <label
          for="message"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Description.
        </label>
        <textarea
          rows="4"
          name="description"
          id="message"
          placeholder="Write a discription for your project."
          class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        ></textarea>
      </div>
      <div>
        <button
          class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
        >
          Submit
        </button>
      </div>
    </form>
  </div>
</div>
</div>
@endsection
