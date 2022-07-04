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
            <div class="pl-10 basis-1/4">
                <x-sidebar :hashtags="$hashtags" />
            </div>

            <div class="pr-20 basis-full pl-20">

                <!-- Awal modal -->
                <!-- Modal toggle -->
                <div>
                    <input type="text" id="disabled-input" class="openModal mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-white dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Apa yang ingin anda curhat atau tanyakan hari ini?" readonly>
                </div>
                <!-- Large Modal -->
                <div id="large-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
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
                                    <button type="button" class="closeModal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="large-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">
                                    <div class="mb-6">
                                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Judul</label>
                                        <input type="text" id="default-input" name="judul" class="judul bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>

                                    <div class="mb-6">
                                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">hashtags</label>
                                        <input type="text" id="default-input" name="hashtags" placeholder="#hashtag1 #hashtag2 #janganpakekkoma #janganpakekspasi #tulisseperticontohini" class="hashtags bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>

                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Apa
                                        yang ingin anda curhat atau tanyakan hari ini?</label>
                                    <textarea id="message" name="isi" rows="4" class="ckeditor form-control block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." required></textarea>
                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                    <input data-modal-toggle="extralarge-modal" type="submit" class="saveCurhatan text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="I accept">
                                    <button data-modal-toggle="extralarge-modal" type="button" class="closeModal text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Akhir modal -->
                @foreach($curhatans as $curhatan)
                <div class="mt-8">
                    <!-- awal konten -->
                    <div id="toast-success{{$curhatan->id}}" class="flex w-full p-1 text-white bg-white rounded-lg shadow-lg border-b border-gray-200 dark:text-white dark:bg-white" role="alert">
                        <!-- isi -->
                        <div class="p-4 bg-white rounded-lg border-white dark:bg-white dark:border-white">
                            <h6 class="font-bold tracking-tight text-gray-900 dark:text-black">
                                {{ $curhatan->judul }}
                            </h6>
                            {!! $curhatan->isi !!}
                        </div>

                        <!-- isi -->
                        <button type="button" class="closeToast ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close" onclick="destroy('#toast-success{{$curhatan->id}}');">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    @endforeach
                </div>
                <!-- akhir konten -->
            </div>
        </div>

        <div class="basis-1/4 pr-4">
            <x-rightbar />
        </div>
    </div>



    <!-- button to toggle modal -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.openModal').on('click', function(e) {
                $('#large-modal').removeClass('hidden');
            });
            $('.closeModal').on('click', function(e) {
                $('#large-modal').addClass('hidden');
            });

        });

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