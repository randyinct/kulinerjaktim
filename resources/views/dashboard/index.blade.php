<x-templates.default>
        <div class="col-12">
            <div class="row row-cards">
                <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-blue text-white avatar">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-building-store"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
                                            stroke="currentColor"
                                            fill="none"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 21l18 0"></path>
                                            <path
                                                d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path>
                                            <path d="M5 21l0 -10.15"></path>
                                            <path d="M19 21l0 -10.15"></path>
                                            <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Total Tempat Kuliner
                                    </div>
                                    <div class="text-muted">
                                        {{ $place }}
                                        Restoran terdaftar
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-green text-white avatar">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-users"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
                                            stroke="currentColor"
                                            fill="none"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Total Pengguna
                                    </div>
                                    <div class="text-muted">
                                        {{ $user }}
                                        Pengguna terdaftar
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-twitter text-white avatar">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-building"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
                                            stroke="currentColor"
                                            fill="none"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 21l18 0"></path>
                                            <path d="M9 8l1 0"></path>
                                            <path d="M9 12l1 0"></path>
                                            <path d="M9 16l1 0"></path>
                                            <path d="M14 8l1 0"></path>
                                            <path d="M14 12l1 0"></path>
                                            <path d="M14 16l1 0"></path>
                                            <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Total Kecamatan
                                    </div>
                                    <div class="text-muted">
                                        {{ $subDistrict }}
                                        Kecamatan terdaftar
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Review Terbaru
                                </div>
                            </div>
                            <div class="list-group card-list-group">
                                @foreach ($reviews as $data)                         
                                <div class="list-group-item mt-2">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-auto fs-3">
                                            {{ $loop->index + 1}}
                                        </div>
                                        <div class="col-auto">
                                            <img
                                                src="{{ $data->image_url }}"
                                                class="rounded"
                                                alt="Górą ty"
                                                width="100"
                                                height="100"></div>
                                            <h4 class="col">
                                                {{ $data->place->name }}
                                                <div class="text-muted">
                                                    {{ $data->user->name }}
                                                </div>
                                                <div class="text-muted">
                                                    {{ $data->reviews }}
                                                </div>
                                            </h4>
                                            <div class="col-auto text-muted">
                                                {{ $data->created_at->diffForHumans() }}
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="link-secondary">
                                                    <button class="switch-icon" data-bs-toggle="switch-icon">
                                                        <span class="switch-icon-a text-muted">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="icon"
                                                                width="24"
                                                                height="24"
                                                                viewBox="0 0 24 24"
                                                                stroke-width="2"
                                                                stroke="currentColor"
                                                                fill="none"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                                d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"/></svg>
                                                        </span>
                                                        <span class="switch-icon-b text-red">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-filled"
                                                                width="24"
                                                                height="24"
                                                                viewBox="0 0 24 24"
                                                                stroke-width="2"
                                                                stroke="currentColor"
                                                                fill="none"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                                                d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"/></svg>
                                                        </span>
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col-auto lh-1">
                                                <div class="dropdown">
                                                    <a href="#" class="link-secondary" data-bs-toggle="dropdown">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/dots -->
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="icon"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="2"
                                                            stroke="currentColor"
                                                            fill="none"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="5" cy="12" r="1"/><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/></svg>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">
                                                            Action
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</x-templates.default>