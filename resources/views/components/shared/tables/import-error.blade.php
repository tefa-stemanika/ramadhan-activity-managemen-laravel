@if (session()->has('failures')) 
    <div class="my-8">
        <h3 class="text-black text-xl font-bold">{{ count(session('failures')) }} Error terjadi ketika mengimport data!</h3>
        <div class="overflow-scroll max-h-[500px] bg-white rounded-md drop-shadow-lg mt-3">
            <table class="min-w-full w-max">
                <thead class="sticky top-0 left-0 right-0 z-20">
                    <tr>
                        <th rowspan="2" class="p-2.5 text-sunrise text-center text-sm font-bold border-[0.5px] border-[#00000019] bg-danger/20">Baris excel</th>
                        <th rowspan="2" class="p-2.5 text-sunrise text-center text-sm font-bold border-[0.5px] border-[#00000019] bg-danger/20">Atribut</th>
                        <th rowspan="2" class="p-2.5 text-sunrise text-center text-sm font-bold border-[0.5px] border-[#00000019] bg-danger/20">Pesan</th>
                        <th rowspan="2" class="p-2.5 text-sunrise text-center text-sm font-bold border-[0.5px] border-[#00000019] bg-danger/20">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session('failures') as $validation)
                        <tr>
                        <td class="p-2.5 text-sunrise text-center text-sm font-medium border-[0.5px] border-[#00000019] bg-white">{{ $validation->row() }}</td>
                        <td class="p-2.5 text-sunrise text-center text-sm font-medium border-[0.5px] border-[#00000019] bg-white">{{ $validation->attribute() }}</td>
                        <td class="p-2.5 text-sunrise text-sm font-medium border-[0.5px] border-[#00000019] bg-white">
                            <ul>
                                @foreach ($validation->errors() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="p-2.5 text-sunrise text-center text-sm font-medium border-[0.5px] border-[#00000019] bg-white">
                            @if (array_key_exists($validation->attribute(), $validation->values()))
                                {{ $validation->values()[$validation->attribute()] }}
                            @else
                                struktur file tidak sesuai, periksa kembali file anda
                            @endif
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif