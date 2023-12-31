@extends('layouts.simple')
@section('content')
    <form method="post" action="{{route('foodCategories.store')}}" class="w-2/3 mx-auto mt-8">
        @csrf
        <div class="mb-6">
            @error('food_type')
            <p class="text-xl text-red-700 my-4">{{$message}}</p>
            @enderror
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> نام دسته بندی</label>
            <input type="text" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="food_type" value="{{old('food_type')}}">
        </div>

        <div class="flex justify-between">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ذخیره</button>
            <a href="{{route('foodCategories.index')}}">برگشت</a>
        </div>
    </form>

@endsection
