<x-admin :$title>
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h1 class="mb-0">{{ $title }}</h1>
        <a href="{{ route('kategori.create') }}" class="btn btn-primary">Buat</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->image) }}" width="100" alt="">
                        </td>
                        <td>{{ $item->category_name }}</td>
                        <td style="width: 500px">{{ $item->description }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $categories->links('pagination::bootstrap-5') }}
</x-admin>
