<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Design</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-3xl font-bold mb-4 text-center">Show Design</h1>
        <a href="{{ route('designs.index') }}" class="mb-4 inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block w-full text-center">Back</a>
        <div class="mb-4">
            <strong class="block text-gray-700 font-semibold">Nama:</strong>
            <p class="text-gray-900">{{ $design->nama }}</p>
        </div>
        <div class="mb-4">
            <strong class="block text-gray-700 font-semibold">Tanggal:</strong>
            <p class="text-gray-900">{{ $design->tanggal }}</p>
        </div>
        <div class="mb-4">
            <strong class="block text-gray-700 font-semibold">Ukuran:</strong>
            <p class="text-gray-900">{{ $design->ukuran }}</p>
        </div>
        <div class="mb-4">
            <strong class="block text-gray-700 font-semibold">Gambar:</strong>
            <img src="{{ asset($design->gambar) }}" alt="{{ $design->nama }}" class="img-thumbnail rounded-lg shadow-lg mt-2 mx-auto" style="max-width: 200px;">
        </div>
        <div class="mb-4">
            <strong class="block text-gray-700 font-semibold">Text:</strong>
            <p class="text-gray-900">{{ $design->text }}</p>
        </div>
    </div>
</body>
</html>
