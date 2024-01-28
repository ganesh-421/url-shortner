<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Short urls') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <a class=' m-3 inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150' href="{{route('short-url.create')}}">Create new</a>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200  ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Url
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Short url
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($urls as $url)

                            <tr class="bg-white border-b  ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{$loop->count}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$url->url}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{url($url->short_url)}}"> {{url($url->short_url)}}</a>
                                </td>
                                <td class="px-6 py-4">
                                   {{auth()->id() === $url->user->id ? 'You' : $url->user->name}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('short-url.show', $url->short_url)}}"><span class="material-symbols-outlined">
                                            visibility
                                        </span></a>
                                    <form action="{{route('short-url.destroy', $url->short_url)}}" class="inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">
                                            <span class="material-symbols-outlined text-red-400">
                                                delete
                                            </span>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-2">

                        {{$urls->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>