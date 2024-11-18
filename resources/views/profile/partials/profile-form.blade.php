<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
            {{ __("Update your account's profile information") }}
        </p>
    </header>
    <x-alert></x-alert>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="/admin/profile/edit" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div>
            <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full " :value="$user->id"
                required autofocus autocomplete="user_id" />
            <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
        </div>
        <div>
            <x-input-label for="perusahaan" :value="__('Perusahaan')" class="dark:text-gray-300" />
            <x-text-input id="perusahaan" name="perusahaan" type="text"
                class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" :value="old('perusahaan', $profile->perusahaan)"
                required autofocus autocomplete="perusahaan" />
            <x-input-error class="mt-2" :messages="$errors->get('perusahaan')" />
        </div>
        <div>
            <x-input-label for="kbli" :value="__('KBLI')" class="dark:text-gray-300" />
            <x-text-input id="kbli" name="kbli" type="text"
                class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" :value="old('kbli', $profile->kbli)"
                autofocus autocomplete="kbli" />
            <x-input-error class="mt-2" :messages="$errors->get('kbli')" />
        </div>
        <div>
            <x-input-label for="kata_kunci" :value="__('Kata Kunci Paket Pekerjaan yang di cari')" class="dark:text-gray-300" />
            <x-text-input id="kata_kunci" name="kata_kunci" type="text"
                class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" :value="old('kata_kunci', $profile->kata_kunci)"
                autofocus autocomplete="kata_kunci" />
            <x-input-error class="mt-2" :messages="$errors->get('kata_kunci')" />
            <small class="dark:text-gray-300">Pisahkan tiap kata kunci dengan koma</small>
        </div>
        <div>
            <x-input-label for="whatsapp" :value="__('Nomer Whatsapp')" class="dark:text-gray-300" />
            <x-text-input id="whatsapp" name="whatsapp" type="number"
                class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" :value="old('whatsapp', $profile->whatsapp)"
                autofocus autocomplete="whatsapp" />
            <x-input-error class="mt-2" :messages="$errors->get('whatsapp')" />
        </div>
        <div>
            <x-input-label for="notif_whatsapp" :value="__('Notif Whatsapp')" class="dark:text-gray-300" />
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer" name="notif_whatsapp"
                    @if ($profile->notif_whatsapp) checked @endif>
                <div
                    class="relative w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
            </label>
            <small class="block dark:text-gray-300">Jika diaktifkan, Notifikasi Paket Pekerjaan yang sesuai akan dikirim
                via
                Whatsapp</small>
        </div>
        <div>
            <x-input-label for="telegram" :value="__('Kode Chat Telegram')" class="dark:text-gray-300" />
            <x-text-input id="telegram" name="telegram" type="number"
                class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" :value="old('telegram', $profile->telegram)"
                autofocus autocomplete="telegram" />
            <x-input-error class="mt-2" :messages="$errors->get('telegram')" />
            <small class="dark:text-gray-300">Untuk mendapatkan Kode Chat Telegram silahkan klik <a href="#"
                    class="text-blue-700 font-bold" data-modal-toggle="chatdIDTelegramModal"
                    data-modal-target="chatdIDTelegramModal">disini</a></small>
        </div>
        <div>
            <x-input-label for="notif_telegram" :value="__('Notif Telegram')" class="dark:text-gray-300" />
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer" name="notif_telegram"
                    @if ($profile->notif_telegram) checked @endif>
                <div
                    class="relative w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
            </label>
            <small class="block dark:text-gray-300">Jika diaktifkan, Notifikasi Paket Pekerjaan yang sesuai akan dikirim
                via
                Telegram</small>
        </div>
        <div>
            <x-input-label for="notif_email" :value="__('Notif Email')" class="dark:text-gray-300" />

            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer" name="notif_email"
                    @if ($profile->notif_email) checked @endif>
                <div
                    class="relative w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
            </label>
            <small class="block dark:text-gray-300">Jika diaktifkan, Notifikasi Paket Pekerjaan yang sesuai akan dikirim
                via
                email</small>
        </div>
        <div>
            <x-input-label for="bank_komisi" :value="__('Bank Komisi')" class="dark:text-gray-300" />
            <x-text-input id="bank_komisi" name="bank_komisi" type="text"
                class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" :value="old('bank_komisi', $profile->bank_komisi)"
                autofocus autocomplete="bank_komisi" />
            <small class="block dark:text-gray-300">Nama Bank untuk mentransfer Komisi Referal yang anda terima</small>
        </div>
        <div>
            <x-input-label for="rek_komisi" :value="__('Rek Komisi')" class="dark:text-gray-300" />
            <x-text-input id="rek_komisi" name="rek_komisi" type="number"
                class="mt-1 block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" :value="old('rek_komisi', $profile->rek_komisi)"
                autofocus autocomplete="rek_komisi" />
            <small class="block dark:text-gray-300">Nomer Rekening Bank untuk mentransfer Komisi Referal yang anda
                terima</small>
        </div>
        <div>
            <x-input-label for="dropzone-file" :value="__('Profile Image')" class="dark:text-gray-300" />
            {{-- <div class="flex items-center justify-center w-full">
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 ">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" name="image" />
                </label>
            </div> --}}
            <input type="file" name="image" id="image"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help">
            <small class="mt-1 text-sm text-gray-500 dark:text-gray-300 font-thin" id="file_input_help">
                PNG,JPG or GIF (MAX. 800x400px).</small>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="dark:bg-blue-700 dark:text-gray-300">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<!-- Modal Telegram -->
<div id="chatdIDTelegramModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <h3 class="font-semibold ">Chat ID Telegram</h3>
                </div>
                <div>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="chatdIDTelegramModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            </div>

            <!-- Content Modal -->
            <ol class="dark:text-gray-300">
                <li>
                    1. Buka Applikasi Telegram Anda
                </li>
                <li>
                    2. Ketik di pencarian "LPSE Indonesia"
                </li>
                <li>
                    3. kemudian pilih "lpseindonesiabot"
                </li>
                <li>
                    4. Kirim Perintah /start
                </li>
                <li>
                    5. Kemudian kirim perintah /token
                </li>
                <li>
                    6. Masukan ID Chat yang diberikan ke form ini
                </li>
                <li>
                    7. Simpan
                </li>
            </ol>
            <!-- End Content Modal -->
            <div class="flex justify-between items-center">
                <button type="button"
                    class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900"
                    data-modal-toggle="chatdIDTelegramModal">
                    {{ __('global.close') }}
                </button>
            </div>
        </div>
    </div>
</div>
