@php /** @var \App\Models\Decision[]|\Illuminate\Database\Eloquent\Collection $decisions */ @endphp

@extends('admin.layout')

@section('content')
    <div class="container mx-auto px-12 py-6">
        @if (session()->get('status') == 'deleted')
            <div class="mb-4 p-3 text-sm bg-red-100 text-red-700 font-italic rounded">
                Decision has been successfully deleted
            </div>
        @endif

        @if($decisions->isNotEmpty())
            <table class="w-full bg-white rounded-md shadow-xl overflow-hidden">
                <tr class="bg-gray-50">
                    <th class="p-4 text-left w-[64px]">ID</th>
                    <th class="p-4 text-left">Photo</th>
                    <th class="p-4 text-left w-[240px]">Status</th>
                    <th class="p-4 w-[128px]"></th>
                </tr>
                @foreach($decisions as $decision)
                    <tr class="border-t">
                        <td class="p-4">
                            {{ $decision->id }}
                        </td>
                        <td class="p-4">
                            <a href="{{ $decision->photo->image_url }}" target="_blank" class="inline-block">
                                <img src="{{ $decision->photo->image_url }}" class="h-24 rounded">
                            </a>
                        </td>
                        <td class="p-4">
                            @if ($decision->approved)
                                <span class="bg-green-100 text-green-700 font-medium text-sm px-4 py-2 rounded-full">
                                    Approved
                                </span>
                            @else
                                <span class="bg-green-100 text-green-700 font-medium text-sm px-4 py-2 rounded-full">
                                    Denied
                                </span>
                            @endif
                        </td>
                        <td class="p-4">
                            <form method="POST" action="{{ route('admin.decisions.delete', $decision->id) }}">
                                @method('DELETE') @csrf

                                <button onclick="return confirm('Are you sure?')" type="submit"
                                        class="text-red-600 text-sm font-bold px-4 py-2 rounded-full hover:bg-red-100 hover:text-red-700">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="mt-8">
                {{ $decisions->links() }}
            </div>
        @endif

        @if($decisions->isEmpty())
            <div class="w-full p-24 bg-gray-200 rounded text-center text-gray-500">
                No available items
            </div>
        @endif
    </div>
@endsection
