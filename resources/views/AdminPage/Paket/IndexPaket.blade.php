<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Paket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Paket</h2>
                    <a href="{{ route('paket.create') }}" class="btn btn-primary my-3">
                        <button>Tambah Paket</button>
                        </a>

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($pakets as $paket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $paket->nama_paket }}</td>
                            <td>{{ $paket->harga }}</td>
                            <td>{{ $paket->deskripsi }}</td>
                            <td>
                                <a href="{{ route('paket.edit', $paket->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('paket.destroy', $paket->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
