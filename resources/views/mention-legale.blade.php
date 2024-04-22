


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MENTIONS LEGALES') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                            MENTIONS LEGALES {{$title}}

                            <ul>
   @if(count($items) > 0)
       @foreach($items as $item)
           <li>{{ $item }}</li>
       @endforeach
   @else
       <li>No Items</li>
   @endif
</ul>
</div>
            </div>
        </div>
    </div>
</x-app-layout>


