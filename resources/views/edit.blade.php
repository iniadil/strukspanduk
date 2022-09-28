<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="relative">
    <div class="container mx-auto pt-5 z-0">
        <h1 class="text-2xl text-slate-800 font-bold">{{ $title }}</h1>
        <hr>
        <form method="POST" action="/struk/{{ $struk->id }}" class="mt-5" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="oldFile" value="{{ $struk->gambar }}">
            {{-- ITEMS INPUT --}}
            <div class="w-full mb-8">
                <label for="keterangan">Keterangan:</label><br>
                <input type="text" id="keterangan" name="keterangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[50%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $struk->keterangan }}" required>
            </div>
            {{-- ITEMS INPUT --}}
            <div class="w-full mb-8">
                <label for="jumlah">Jumlah:</label><br>
                <input type="number" id="jumlah" name="jumlah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[50%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $struk->jumlah }}" required>
            </div>
            {{-- ITEMS INPUT --}}
            <div class="w-full mb-8">
                <label for="total">Total:</label><br>
                <input type="number" id="total" name="total" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[50%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $struk->total }}" required>
            </div>
            {{-- ITEMS INPUT --}}
            <div class="w-full mb-8">
                <label for="gambar">File/Invoice:</label><br>
                <input type="file" id="gambar" name="gambar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[50%] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @if($errors->has('gambar'))
                    <div class="text-red-600">{{ $errors->first('gambar') }}</div>
                @endif
            </div>
            {{-- ITEMS BUTTON --}}
            <div class="w-full">
                <button name="submit" type="submit" class="bg-emerald-600 hover:bg-emerald-800 text-white p-4 w-[50%]">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>