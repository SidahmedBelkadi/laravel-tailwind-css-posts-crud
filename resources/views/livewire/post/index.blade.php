<div style="padding-right: 32px; padding-left: 32px; ">
    @if (count($posts))
    <div class="relative overflow-x-auto my-16 shadow-md sm:rounded-lg">
        <div class="pb-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input wire:model="search" type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $post->title }}
                    </th>
                    
                    <td class="px-6 py-4">
                    <div class="flex items-center">
                        <p class="inline-block mr-4">{{ Str::words($post->description, $words = 5, $end = '...') }}</p>
                        <button id="modal-open-{{ $post->id }}" class="ml-auto px-4 py-2 text-white bg-blue-500 rounded">...</button>
                    </div>
                    </td>

                    <td class="px-6 py-4">
                        {{ $post->created_at->diffForHumans() }}
                    </td>   
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>


                {{-- Description Modal --}}
                <div id="modal-{{ $post->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden">
                    <div class="flex items-center justify-center min-h-screen px-4">
                      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                      </div>
                      <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                          <p>{{ $post->description }}</p>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                          <button id="modal-close-{{ $post->id }}" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Close
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
            
                  <script>
                    const modal{{ $post->id }} = document.getElementById('modal-{{ $post->id }}');
                    const modalOpenBtn{{ $post->id }} = document.getElementById('modal-open-{{ $post->id }}');
                    const modalCloseBtn{{ $post->id }} = document.getElementById('modal-close-{{ $post->id }}');
            
                    // Open the modal when the open button is clicked
                    modalOpenBtn{{ $post->id }}.addEventListener('click', () => {
                      modal{{ $post->id }}.classList.remove('hidden');
                    });
            
                    // Close the modal when the close button is clicked
                    modalCloseBtn{{ $post->id }}.addEventListener('click', () => {
                      modal{{ $post->id }}.classList.add('hidden');
                    });
            
                    // Close the modal when the user clicks outside of it
                    window.addEventListener('click', (event) => {
                      if (event.target === modal{{ $post->id }}) {
                        modal{{ $post->id }}.classList.add('hidden');
                      }
                    });
                  </script>
                @endforeach
            </tbody>
        </table>
        <div class="my-4">
            {{ $posts->links('vendor.livewire.tailwind') }}
        </div>
    </div>
    @else
    <h1 class="text-7xl text-light text-gray-800 text-center my-32"> There is no posts!</h1>
    <button class="bg-blue-500 p-2 rounded-lg text-white"><a href="{{ url('/home') }}">back</a></button>
    @endif
</div>
