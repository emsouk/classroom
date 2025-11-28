<template>
  <header class="bg-secondary">
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <a class="block text-teal-600" href="#">
            <span class="sr-only">Home</span>
            <img
              src="/down-the-code-high-resolution-logo-transparent.png"
              alt="Logo"
              width="280"
            />
          </a>
        </div>

        <div class="hidden md:block">
          <nav aria-label="Global">
            <ul class="flex items-center gap-6 text-md">
              <li>
                <a
                  class="text-white transition hover:text-gray-500/75"
                  href="#"
                >
                  ACCUEIL
                </a>
              </li>

              <li>
                <a
                  class="text-white transition hover:text-gray-500/75"
                  href="#"
                >
                  MODULES
                </a>
              </li>

              <li>
                <a
                  class="text-white transition hover:text-gray-500/75"
                  href="#"
                >
                  BLOG
                </a>
              </li>

              <li>
                <a
                  class="text-white transition hover:text-gray-500/75"
                  href="#"
                >
                  VEILLE TECHNO
                </a>
              </li>
            </ul>
          </nav>
        </div>

        <div class="flex items-center gap-4">
          <input
            type="text"
            placeholder="Rechercher..."
            class="hidden sm:block rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-accent text-white"
          />
          <div class="sm:flex sm:gap-4">
            <a
              class="rounded-md bg-accent px-5 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-accent/90"
              href="#"
            >
              Mon profil
            </a>
          </div>

          <div class="block md:hidden">
            <button
              class="rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M4 6h16M4 12h16M4 18h16"
                ></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>
