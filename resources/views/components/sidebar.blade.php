<div>
    <aside class="w-64" aria-label="Sidebar">
        <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
            <a href="{{ route('hashtags') }}" class="flex items-center pl-2.5 mb-5">
                <!-- <img src="" class="mr-3 h-6 sm:h-7"> -->
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Trending
                    Hashtags</span>
            </a>
            <ul class="space-y-2">
                @foreach ($hashtags as $hashtag)
                <li>
                    <a href="{{ route('home.showByHashtags', $hashtag->hashtag) }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="ml-3">#{{ $hashtag->hashtag }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </aside>
</div>