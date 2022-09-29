<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="build/app.f549d2e8.css">
</head>
<body class="relative">
    <div class="container mx-auto pt-5 z-0">
        @if (session()->has('msg'))
        <div class="w-full bg-emerald-300 text-white font-bold rounded p-3 mb-5">
            <span>{{ session('msg') }}</span>
        </div>
        @endif
        <h1 class="text-2xl text-slate-800 font-bold">DATA STRUK SPANDUK</h1>
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-orange-500 text-white text-xs">
                    <th scope="col" class="border-slate-800 border-2 py-2 w-[5%]">NO</th>
                    <th scope="col" class="border-slate-800 border-2 py-2">KETERANGAN</th>
                    <th scope="col" class="border-slate-800 border-2 py-2">JUMLAH</th>
                    <th scope="col" class="border-slate-800 border-2 py-2">TOTAL</th>
                    <th scope="col" class="border-slate-800 border-2 py-2">GAMBAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($struks as $struk)
                <?php $total += $struk->total ?>
                <tr class="even:bg-gray-100 hover:bg-gray-100">
                    <td class="p-2 text-center border-slate-800 border-2">{{ $loop->iteration }}</td>
                    <td class="p-2 border-slate-800 border-2 whitespace-normal w-[50%]">{{ $struk->keterangan }}</td>
                    <td class="p-2 border-slate-800 border-2">{{ $struk->jumlah }}pcs</td>
                    <td class="p-2 border-slate-800 border-2">Rp {{ number_format($struk->total,0,',','.'); }}</td>
                    <td class="border-slate-800 border-2">
                        <div class="flex gap-x-2 p-2 justify-center">
                            <button onclick="lihatGambar('storage/{{ $struk->gambar }}')" class="text-sm bg-green-400 text-white px-2 py-1 hover:bg-green-600">Lihat Invoice</button>
                            <a href="storage/{{ $struk->gambar }}" download="{{ $struk->id.time() }}" class="bg-sky-400 text-white px-2 py-1 hover:bg-sky-600">Download</a>
                            <form action="/struk/{{ $struk->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button onclick="return checkPSW()" type="submit" class="bg-red-400 text-white px-2 py-1 hover:bg-red-600">HAPUS</button>
                            </form>
                            <a href="/struk/{{ $struk->id }}/edit" onclick="return checkPSW()" class="bg-pink-400 text-white px-2 py-1 hover:bg-pink-600">EDIT</a>
                        </div>
                        
                    </td>
                </tr>
                @endforeach
                {{-- TOTAL --}}
                <tr class="bg-red-200 hover:bg-red-400">
                    <td class="p-2 text-center border-slate-800 border-2">TOTAL:</td>
                    <td colspan="4" class="p-2 font-bold text-lg border-slate-800 border-2">Rp {{ number_format($total,0,',','.'); }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="imgPreview" class="hidden absolute top-0 z-10 w-full h-screen rounded-lg backdrop-blur-md">
        <div class="flex justify-center items-center h-full w-full relative">
            <button onclick="btnClose()" id="btnClose" class="bg-red-500 text-white p-4 top-0 right-0 absolute mt-3 mr-3 hover:bg-red-700">TUTUP</button>
            <img id="imgChange" src="" alt="STRUK1" class="max-h-[600px]">
        </div>
        
    </div>
    <script>
        function lihatGambar(gambar)
        {
            if (gambar != "") {
                elm = document.querySelector('#imgChange')
                elmBlock = document.querySelector('#imgPreview')
                elm.src = gambar
                elmBlock.classList.toggle('hidden')
            }
            
        }

        function btnClose()
        {
            elmBlock = document.querySelector('#imgPreview')
            elmBlock.classList.toggle('hidden')
        }

        function checkPSW()
        {
            let pass = prompt("MASUKKAN PASSWORD");
            if (pass !== 'ganteng') {
                alert('Password Salah!')
                return false;
            }
            
        }
    </script>
</body>
</html>