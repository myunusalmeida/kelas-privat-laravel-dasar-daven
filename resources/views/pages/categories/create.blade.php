<x-admin :$title>
    <h1 class="mb-5">Tambah Kategori</h1>

    <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="category_name">Nama Kategori</label>
            <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name"
                name="category_name" value="{{ old('category_name') }}">
            @error('category_name')
                <div id="category_name_feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">Deskripsi</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                name="description" value="{{ old('description') }}">
            @error('description')
                <div id="category_name_feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror"
                id="image" name="image">
            @error('image')
                <div id="category_name_feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="Aktif">Aktif</option>
                <option value="Non-Aktif">Non-Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Kategori</button>
    </form>
</x-admin>
