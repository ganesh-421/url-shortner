<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Short url') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex p-5 gap-5 items-center justify-center">
                <div>
                    <h2 class="text-gray-800">Original url:</h2>
                    <h2 class="text-gray-800">Short url:</h2>
                    <h2 class="text-gray-800">No of visits:</h2>
                </div>
                <div class="flex flex-col ">
                    <a href="{{$shortUrl->url}}" class="text-blue-900">{{$shortUrl->url}}</a>
                    <a href="{{route('visit', $shortUrl->short_url)}}" class="text-blue-900">{{url($shortUrl->short_url)}}</a>
                    <span class="text-blue-900">{{$shortUrl->visits}}</span>
                </div>

            </div>
            <a class="float-right inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150" href="{{route('short-url.index')}}">
                Go back to index
            </a>
        </div>
    </div>
</x-app-layout>