<div class="relative">
    {{-- <button type="button" onclick="toggleImportModal()" class="flex items-center text-sm font-normal text-white lg:gap-x-3 bg-primary px-3 py-1.5 lg:px-5 lg:py-3 border border-primary rounded-lg lg:rounded-md">
        Import
    </button> --}}
    <button type="button" onclick="toggleImportModal()" class="flex items-center gap-4 px-5 py-2 rounded bg-[#FCEE80]">
        <p class="text-sm font-bold text-primary">Impor Data</p>
    </button>
    <div class="hidden absolute top-12 lg:top-16 -left-20 lg:left-0 z-[60]" id="importModal">
        <div class="px-5 lg:px-7 py-4 lg:py-5 bg-white rounded-md w-72 lg:w-80 h-auto drop-shadow-lg">
            <a href="{{ $template }}" class="flex items-center gap-x-5 pb-3 lg:pb-6 border-b border-b-black" download>
                <img src="{{ asset("icons/map_mosque.svg") }}" alt="download icon" class="size-5 lg:size-6">
                <p class="text-black text-sm lg:text-base font-medium lg:font-semibold">Unduh Template</p>
            </a>
            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <label class="flex items-center gap-x-5 pt-3 lg:pt-6 cursor-pointer">
                    <img src="{{ asset("icons/map_mosque.svg") }}" alt="absen harian icon" class="size-5 lg:size-6">
                    <p class="text-black text-sm lg:text-base font-medium lg:font-semibold text-wrap" id="displayName">Pilih File</p>
                    <input type="file" name="excel" id="excel" class="hidden" onchange="displaySelectedFileName(event)" accept=".xlsx" required>
                </label>
                <button type="submit" class="hidden text-white text-base font-normal bg-primary px-4 py-1.5 rounded-md mt-8" id="submitButton">kirim</button>
            </form>
        </div>
    </div>
</div>