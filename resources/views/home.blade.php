<x-app-layout>
    <!-- check apakah data modal berhasil distore atau enggak -->
    @if ($errors->any())
    <?php
    $message = 'Pesan error: \n';

    foreach ($errors->all() as $error) {
        $i = 1;
        $message = $message . '\t' . $i . '. ' . $error . '\n';
        $i++;
    }

    echo "<script>alert('$message')</script>";
    ?>
    @endif

    <div class="py-12">
        <div class="flex flex-row">
            <div class="pl-10 basis-1/5">
                <x-sidebar :hashtags="$hashtags" />
            </div>

            <div class="basis-2/4">
                <div class="max-w-7xl mx-20 sm:px-2 lg:px-2">
                    <!-- Modal toggle -->
                    <div>
                        <input type="text" id="disabled-input"
                            class="openModal mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-white dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="Apa yang ingin anda curhat?" readonly>
                    </div>

                    <!-- awal konten -->
                    @foreach($curhatans as $curhatan)
                    <!-- post card -->
                    <div id="closeCurhatan{{ $curhatan->id }}"
                        class="flex bg-white shadow-lg rounded-lg mx-4 md:mx-auto my-2 max-w-md md:max-w-2xl ">
                        <!--horizantil margin is just for display-->
                        <div class="flex items-start px-4 py-4">
                            @if(is_null($curhatan->profile_photo_path))
                            <svg class="w-12 h-12 rounded-full object-cover mr-4 shadow text-gray-400 -left-1"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                            @else
                            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                                src="{{ asset('storage/' . $curhatan->profile_photo_path) }}" alt="avatar">
                            @endif
                            <div class="">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-sm font-semibold text-gray-900 -mt-1">{{ $curhatan->name }}</h2>
                                    <small class="text-sm text-gray-700 pl-5">{{ $curhatan->created_at }}</small>
                                    <div class="pl-10">
                                        <button type="button"
                                            class="closeCurhatan bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 inline-flex h-8 w-8 dark:text-gray-500 dark:bg-white"
                                            onclick="destroy('#closeCurhatan{{$curhatan->id}}');">
                                            <span class="sr-only">Close</span>
                                            <svg class="" fill="currentColor" viewBox="0 0 30 30"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <p class="text-gray-700 text-sm -mt-3">Deskripsi</p>
                                <div class="font-bold text-lg text-gray-900 mt-1">
                                    {!! $curhatan->judul !!}
                                </div>
                                <div class="mt-1 text-gray-700 text-base">
                                    {!! $curhatan->isi !!}
                                </div>
                                <div class="mt-4 flex items-center">
                                    <div class="flex mr-2 text-gray-700 text-sm mr-3">
                                        @php
                                        $love = 0;
                                        @endphp

                                        @foreach($count_loves as $count_love)
                                        @if($curhatan->id == $count_love->curhatan_id)

                                        @php
                                        $love += $count_love->love_count;
                                        @endphp

                                        @endif
                                        @endforeach

                                        <div>
                                            <input type="hidden" value="{{ $curhatan->id }}" name="curhatan_id"
                                                id="curhatan_id">
                                            <button class="ajax-love-curhatan" title="love" type="submit"
                                                onclick="love('{{ $curhatan->id }}')">
                                                <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </button>
                                            <span>{{ $love}}</span>
                                        </div>
                                    </div>
                                    <div class="flex mr-2 text-gray-700 text-sm mr-8">
                                        <button class="btnKomentar" title="komentar"
                                            onclick="komen('.komentar-{{$curhatan->id}}');">
                                            <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                            </svg>
                                        </button>
                                        <span>8</span>
                                    </div>
                                    <div class="flex mr-2 text-gray-700 text-sm mr-4">
                                        <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                        <span>Bagikan</span>
                                    </div>
                                </div>
                                <!-- component -->
                                <!-- comment form -->
                                <div class="komentar-{{$curhatan->id}}">
                                    <div class="flex mx-auto items-center justify-center shadow-lg mt-2 max-w-lg">
                                        <form action="{{ route('komentar_curhatan.store') }}" method="POST">
                                            @csrf
                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                <div class="w-full md:w-full px-3 mb-2 mt-2">
                                                    <textarea
                                                        class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                                        name="komentar" placeholder='Tambahkan Komentar'
                                                        required></textarea>
                                                </div>
                                                <input type="hidden" name="curhatan_id" value="{{ $curhatan->id }}">
                                                <div class="w-full md:w-full flex items-start md:w-full px-3">
                                                    <div class="-mr-1">
                                                        <input type='submit'
                                                            class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                                                            value='Tambah'>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- component -->

                                <!-- komentar -->
                                @foreach($komentars as $komentar)
                                @if($komentar->curhatan_id == $curhatan->id)
                                <div class="flex mt-2 bg-white shadow-lg rounded-lg ">
                                    <!--horizantil margin is just for display-->
                                    <div class="flex items-start px-4 py-6">
                                        @if(is_null($komentar->profile_photo_path))
                                        <svg class="w-12 h-12 rounded-full object-cover mr-4 shadow text-gray-400 -left-1"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>
                                        @else
                                        <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                                            src="{{ asset('storage/' . $komentar->profile_photo_path) }}" alt="avatar">
                                        @endif
                                        <div class="">
                                            <div class="flex items-center justify-between">
                                                <h2 class="text-sm font-semibold text-gray-900 -mt-1">
                                                    {{ $komentar->name }}
                                                </h2>
                                                <small class="text-sm text-gray-700">{{ $komentar->created_at }}</small>
                                            </div>
                                            <p class="mt-3 text-gray-700 text-sm">
                                                {{ $komentar->komentar }}
                                            </p>
                                            <div class="mt-4 flex items-center">
                                                <div class="flex mr-2 text-gray-700 text-sm mr-3">
                                                    <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                    </svg>
                                                    <span>12</span>
                                                </div>
                                                <div class="flex mr-2 text-gray-700 text-sm mr-8">
                                                    <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                                    </svg>
                                                    <span>8</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- akhir konten -->
            </div>
        </div>

        <div class="basis-1/5 pr-4">
            <x-rightbar />
        </div>
    </div>
    </div>

    <!-- Awal modal tambah curhatan -->
    <div id="large-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
            <!-- Modal content -->
            <form action="{{ route('home.store') }}" method="POST">
                @csrf
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Curhatan anda hari ini
                        </h3>
                        <button type="button"
                            class="closeModal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="large-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="mb-6">
                            <label for="default-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Judul</label>
                            <input type="text" id="default-input" name="judul"
                                class="judul bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <div class="mb-6">
                            <label for="default-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">hashtags</label>
                            <input type="text" id="default-input" name="hashtags"
                                placeholder="#hashtag1 #hashtag2 #janganpakekkoma #janganpakekspasi #tulisseperticontohini"
                                class="hashtags bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Apa
                            yang ingin anda curhat atau tanyakan hari ini?</label>
                        <textarea id="message" name="isi" rows="4"
                            class="ckeditor form-control block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="..." required></textarea>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <input data-modal-toggle="extralarge-modal" type="submit"
                            class="saveCurhatan text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            value="I accept">
                        <button data-modal-toggle="extralarge-modal" type="button"
                            class="closeModal text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Akhir modal tambah curhatan -->

    <!-- Awal modal update curhatan -->
    <div id="large-modal-update" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
            <!-- Modal content -->
            <form action="{{ route('home.store') }}" method="POST">
                @csrf
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Curhatan anda hari ini
                        </h3>
                        <button type="button"
                            class="closeModalUpdate text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="large-modal-update">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="mb-6">
                            <label for="default-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Judul</label>
                            <input type="text" id="default-input" name="judul"
                                class="judul bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <div class="mb-6">
                            <label for="default-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">hashtags</label>
                            <input type="text" id="default-input" name="hashtags"
                                placeholder="#hashtag1 #hashtag2 #janganpakekkoma #janganpakekspasi #tulisseperticontohini"
                                class="hashtags bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Apa
                            yang ingin anda curhat atau tanyakan hari ini?</label>
                        <textarea id="message" name="isi" rows="4"
                            class="ckeditor form-control block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="..." required></textarea>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <input data-modal-toggle="extralarge-modal" type="submit"
                            class="saveCurhatan text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            value="I accept">
                        <button data-modal-toggle="extralarge-modal" type="button"
                            class="closeModalUpdate text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Akhir modal update curhatan -->

    <!-- button to toggle modal -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('.openModal').on('click', function(e) {
            $('#large-modal').removeClass('hidden');
        });
        $('.closeModal').on('click', function(e) {
            $('#large-modal').addClass('hidden');
        });
        $('.openModalUpdate').on('click', function(e) {
            $('#large-modal-update').removeClass('hidden');
        });
        $('.closeModalUpdate').on('click', function(e) {
            $('#large-modal-update').addClass('hidden');
        });
    });

    function komen(id) {
        if (!$(id).hasClass('hidden')) {
            $(id).addClass('hidden');
        } else if ($(id).hasClass('hidden')) {
            $(id).removeClass('hidden');
        }
    }

    function love(curhatan_id) {
        event = event || window.event;
        event.preventDefault();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '/love/update/' + curhatan_id,
            data: {
                curhatan_id: curhatan_id
            },
            success: function() {
                window.location.reload();
            }
        });

    }

    // method untuk menghapus konten
    function destroy(id) {
        $(id).addClass('hidden');
    }

    CKEDITOR.replace('isi', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    </script>

</x-app-layout>