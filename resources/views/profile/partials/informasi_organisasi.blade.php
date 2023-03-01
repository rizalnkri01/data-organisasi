<h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Informasi Organisasi</h3>
<hr class="mb-2 divide-y divide-gray-200">
@foreach ($informasi_organisasi as $data)
    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-6 sm:col-span-3">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="PR IPNU Kelurahan Bajang" value="{{ $data->name }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
            <input type="number" name="contact" id="contact" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="rizalnkri01@gmail.com" value="{{ $data->contact }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="kondisi_organisasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kondisi Organisasi</label>
            <select id="kondisi_organisasi" name="kondisi_organisasi" class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option @selected($data->kondisi_organisasi == "Baik") value="Baik">Baik</option>
                <option @selected($data->kondisi_organisasi == "Kurang Baik") value="Kurang Baik">Kurang Baik</option>
                <option @selected($data->kondisi_organisasi == "Tidak Baik") value="Tidak Baik">Tidak Baik</option>
            </select>
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="no_sp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Surat Pengurusan</label>
            <input type="text" name="no_sp" id="no_sp" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="002/PW/A/7354/XVII/II/2023" value="{{ $data->no_sp }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="sekretariatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sekretariatan</label>
            <input type="text" name="sekretariatan" id="sekretariatan" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Dsn. Jatikunir RT/RW 04/08, Ds. Bajang, Kec. Talun, Kab. Blitar" value="{{ $data->sekretariatan }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="periode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Periode</label>
            <input type="number" name="periode" id="periode" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2023 - 2025" value="{{ $data->periode }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="ketua_pembina" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ketua Pembina</label>
            <input type="text" name="ketua_pembina" id="ketua_pembina" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ReizalNKRI" value="{{ $data->ketua_pembina }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="contact_pembina" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Pembina</label>
            <input type="number" name="contact_pembina" id="contact_pembina" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="6285175019966" value="{{ $data->contact_pembina }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="ketua" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ketua IPNU</label>
            <input type="text" name="ketua" id="ketua" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ReizalNKRI" value="{{ $data->ketua }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="contact_ketua" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Ketua</label>
            <input type="number" name="contact_ketua" id="contact_ketua" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="6285175019966" value="{{ $data->contact_ketua }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="komandan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komandan CBP IPNU</label>
            <input type="text" name="komandan" id="komandan" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="ReizalNKRI" value="{{ $data->komandan }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="contact_komandan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Komandan</label>
            <input type="number" name="contact_komandan" id="contact_komandan" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="6285175019966" value="{{ $data->name }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="jumlah_pengurus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Pengurus</label>
            <input type="number" name="jumlah_pengurus" id="jumlah_pengurus" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="10" value="{{ $data->jumlah_pengurus }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="total_alumni" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Alumni IPNU</label>
            <input type="number" name="total_alumni" id="total_alumni" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="10" value="{{ $data->total_alumni }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="total_anggota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Anggota IPNU</label>
            <input type="number" name="total_anggota" id="total_anggota" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="10" value="{{ $data->total_anggota }}">
        </div>
        <div class="col-span-6 sm:col-span-3">
            <label for="total_anggota_lembaga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Anggota CBP IPNU</label>
            <input type="number" name="total_anggota_lembaga" id="total_anggota_lembaga" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="10" value="{{ $data->total_anggota_lembaga }}">
        </div>
        <div class="col-span-6 sm:col-span-6">
            <label for="link_sp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Surat Pengurus</label>
            <input type="text" name="link_sp" id="link_sp" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="https://drive.google.com/file/d/1ydA9PYKNVxDJRGVwvAoWyZkduRJPYWnQ/view?usp=sharing" value="{{ $data->link_sp }}">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Jangan Lupa Untuk Membuka Akses Share Link Drive</p>
        </div>
        <div class="col-span-6 sm:col-full">
            <button class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="submit">Simpan</button>
        </div>
    </div>
@endforeach