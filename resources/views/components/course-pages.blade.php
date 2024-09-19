<div class="p-6">
    @if($pages->count() > 0)
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Course Pages</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($pages as $page)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 ease-in-out">
                        <a href="{{ route('courses.page_details', ['course_id' => $course->id, 'page_id' => $page->id]) }}"
                            class="block p-4">
                            <div class="flex flex-col items-start">
                                @if($page->image)
                                    <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->page_title }}"
                                        class="w-full h-32 object-cover rounded-t-lg mb-4">
                                @endif
                                <h3 class="text-xl font-semibold text-gray-900">{{ $page->page_title }}</h3>
                                <p class="text-gray-600 mt-2">{{ Str::limit($page->page_content, 100) }}</p>
                                <p class="text-gray-500 text-sm font-bold mt-2">Page Number:
                                    {{ $page->page_number }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-gray-600">No pages available for this course.</p>
    @endif
    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $pages->links() }}
    </div>
</div>