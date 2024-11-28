  <div
      class="bg-gray-50 dark:bg-gray-900 pt-5 pl-5 pr-5  xsm:pt-2 xsm:pl-2 xsm:pr-2 sm:pl-4 sm:pr-5 md:pt-5 antialiased">
      <!-- Breadcrumb -->
      <nav class="xsm:mt-7 sm:mt-2 md:mt-5 lg:mt-1 flex px-2 py-2 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700 lg:px-5"
          aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
              <li class="inline-flex items-center">
                  <a href="{{ route('home') }}"
                      class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                      <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                          viewBox="0 0 20 20">
                          <path
                              d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                      </svg>
                      Home
                  </a>
              </li>
              <li>
                  <div class="flex items-center">
                      <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 9 4-4-4-4" />
                      </svg>
                      <a {{ $attributes }}
                          class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{ $slot }}</a>
                  </div>
              </li>

          </ol>
      </nav>
  </div>
