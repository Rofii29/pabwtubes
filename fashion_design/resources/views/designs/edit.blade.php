<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Design</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4 text-center">Edit Design</h1>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
            <form action="{{ route('designs.update', $design->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-input w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ $design->nama }}">
                </div>
                <div class="mb-4">
                    <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal:</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-input w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ $design->tanggal }}">
                </div>
                <div class="mb-4">
                    <label for="ukuran" class="block text-gray-700 font-semibold">Ukuran:</label>
                    <select name="ukuran" class="form-select mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md shadow-sm" required>
                        <option value="S" {{ $design->ukuran == 'S' ? 'selected' : '' }}>S</option>
                        <option value="M" {{ $design->ukuran == 'M' ? 'selected' : '' }}>M</option>
                        <option value="L" {{ $design->ukuran == 'L' ? 'selected' : '' }}>L</option>
                        <option value="XL" {{ $design->ukuran == 'XL' ? 'selected' : '' }}>XL</option>
                        <option value="XXL" {{ $design->ukuran == 'XXL' ? 'selected' : '' }}>XXL</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="gambar" class="block text-gray-700 text-sm font-bold mb-2">Gambar:</label>
                    <input type="file" name="gambar" accept="image/*" class="form-input mt-1 block w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="text" class="block text-gray-700 text-sm font-bold mb-2">Text:</label>
                    <textarea name="text" id="text" class="form-textarea w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md shadow-sm">{{ $design->text }}</textarea>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
