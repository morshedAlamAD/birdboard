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
          value="{{$project->title}}"
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
        @error('title')
            <p class=" text-sm text-red-600 font-bold">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-5">
        <label
          for="message"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Description
        </label>
        <textarea
          rows="4"
          name="description"
          id="message"
          placeholder="Write a description for your project."
          class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        >{{$project->description}}</textarea>
        @error('title')
            <p class=" text-sm text-red-600 font-bold">{{$message}}</p>
        @enderror
      </div>
      <div>
        <button
          class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
        >
          Submit
        </button>
      </div>
