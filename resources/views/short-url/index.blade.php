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
                                    {{$url->short_url}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$urls->links()}}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>