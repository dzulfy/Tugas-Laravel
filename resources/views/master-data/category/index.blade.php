
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Data Kategori
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-card>
                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold">
                        Daftar Kategori
                    </h3>

                    <a href="{{ route('categories.create') }}"
                       class="bg-indigo-600 text-white px-4 py-2 rounded-md">
                        Tambah Kategori
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-3 text-left">No</th>
                                <th class="border p-3 text-left">Nama Kategori</th>
                                <th class="border p-3 text-left">Deskripsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="border p-3">
                                        {{ $categories->firstItem() + $loop->index }}
                                    </td>
                                    <td class="border p-3">
                                        {{ $category->name }}
                                    </td>
                                    <td class="border p-3">
                                        {{ $category->description ?? '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"
                                        class="border p-3 text-center">
                                        Belum ada data kategori.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $categories->links() }}
                </div>
            </x-card>

        </div>
    </div>
</x-app-layout>
