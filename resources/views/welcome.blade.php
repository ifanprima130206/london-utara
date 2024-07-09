<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Raja Ampat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Raja Ampat</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 pt-2 pb-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <section
        class="bg-center bg-no-repeat bg-[url('https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-36 lg:py-64">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">We
                invest in the world’s potential</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Here at Flowbite we focus on
                markets where technology, innovation, and capital can unlock long-term value and drive economic growth.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Get started
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="#"
                    class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Learn more
                </a>
            </div>
        </div>
    </section>

    <section class="pt-20 pb-20 lg:pt-[120px] lg:pb-[120px] dark:bg-dark">
        <div class="container mx-auto">
            <div x-data="{
                slides: ['1', '2', '3'],
                activeSlide: 1,
                activeButton: 'w-[30px] bg-primary',
                button: 'w-[10px] bg-[#E4E4E4]'
            }">
                <div class="relative flex justify-center">
                    <div class="relative w-full pb-16 md:w-11/12 lg:w-10/12 xl:w-8/12 xl:pb-0">
                        <div class="flex-no-wrap snap xs:max-w-[368px] mx-auto flex h-auto w-full max-w-[300px] overflow-hidden transition-all sm:max-w-[508px] md:max-w-[630px] lg:max-w-[738px] 2xl:max-w-[910px]"
                            x-ref="carousel">
                            <div
                                class="xs:min-w-[368px] mx-auto h-full min-w-[300px] sm:min-w-[508px] sm:p-6 md:min-w-[630px] lg:min-w-[738px] 2xl:min-w-[910px]">
                                <div class="w-full md:flex">
                                    <div
                                        class="relative mb-12 w-full max-w-[310px] md:mr-12 md:mb-0 md:max-w-[250px] lg:mr-14 lg:max-w-[280px] xl:max-w-[310px] 2xl:mr-16">
                                        <img src="https://cdn.tailgrids.com/2.0/image/marketing/images/testimonials/testimonial-01/image-01.jpg"
                                            alt="image" class="w-full" />
                                        <span class="absolute -top-6 -left-6 z-[-1] hidden sm:block">
                                            <svg width="77" height="77" viewBox="0 0 77 77" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="1.66343" cy="74.5221" r="1.66343"
                                                    transform="rotate(-90 1.66343 74.5221)" fill="#3758F9" />
                                                <circle cx="1.66343" cy="30.9401" r="1.66343"
                                                    transform="rotate(-90 1.66343 30.9401)" fill="#3758F9" />
                                                <circle cx="16.3016" cy="74.5221" r="1.66343"
                                                    transform="rotate(-90 16.3016 74.5221)" fill="#3758F9" />
                                                <circle cx="16.3016" cy="30.9401" r="1.66343"
                                                    transform="rotate(-90 16.3016 30.9401)" fill="#3758F9" />
                                                <circle cx="30.9398" cy="74.5221" r="1.66343"
                                                    transform="rotate(-90 30.9398 74.5221)" fill="#3758F9" />
                                                <circle cx="30.9398" cy="30.9401" r="1.66343"
                                                    transform="rotate(-90 30.9398 30.9401)" fill="#3758F9" />
                                                <circle cx="45.578" cy="74.5221" r="1.66343"
                                                    transform="rotate(-90 45.578 74.5221)" fill="#3758F9" />
                                                <circle cx="45.578" cy="30.9401" r="1.66343"
                                                    transform="rotate(-90 45.578 30.9401)" fill="#3758F9" />
                                                <circle cx="60.2162" cy="74.5216" r="1.66343"
                                                    transform="rotate(-90 60.2162 74.5216)" fill="#3758F9" />
                                                <circle cx="74.6634" cy="74.5216" r="1.66343"
                                                    transform="rotate(-90 74.6634 74.5216)" fill="#3758F9" />
                                                <circle cx="60.2162" cy="30.9398" r="1.66343"
                                                    transform="rotate(-90 60.2162 30.9398)" fill="#3758F9" />
                                                <circle cx="74.6634" cy="30.9398" r="1.66343"
                                                    transform="rotate(-90 74.6634 30.9398)" fill="#3758F9" />
                                                <circle cx="1.66343" cy="59.8839" r="1.66343"
                                                    transform="rotate(-90 1.66343 59.8839)" fill="#3758F9" />
                                                <circle cx="1.66343" cy="16.3017" r="1.66343"
                                                    transform="rotate(-90 1.66343 16.3017)" fill="#3758F9" />
                                                <circle cx="16.3016" cy="59.8839" r="1.66343"
                                                    transform="rotate(-90 16.3016 59.8839)" fill="#3758F9" />
                                                <circle cx="16.3016" cy="16.3017" r="1.66343"
                                                    transform="rotate(-90 16.3016 16.3017)" fill="#3758F9" />
                                                <circle cx="30.9398" cy="59.8839" r="1.66343"
                                                    transform="rotate(-90 30.9398 59.8839)" fill="#3758F9" />
                                                <circle cx="30.9398" cy="16.3017" r="1.66343"
                                                    transform="rotate(-90 30.9398 16.3017)" fill="#3758F9" />
                                                <circle cx="45.578" cy="59.8839" r="1.66343"
                                                    transform="rotate(-90 45.578 59.8839)" fill="#3758F9" />
                                                <circle cx="45.578" cy="16.3017" r="1.66343"
                                                    transform="rotate(-90 45.578 16.3017)" fill="#3758F9" />
                                                <circle cx="60.2162" cy="59.8839" r="1.66343"
                                                    transform="rotate(-90 60.2162 59.8839)" fill="#3758F9" />
                                                <circle cx="74.6634" cy="59.8839" r="1.66343"
                                                    transform="rotate(-90 74.6634 59.8839)" fill="#3758F9" />
                                                <circle cx="60.2162" cy="16.3017" r="1.66343"
                                                    transform="rotate(-90 60.2162 16.3017)" fill="#3758F9" />
                                                <circle cx="74.6634" cy="16.3017" r="1.66343"
                                                    transform="rotate(-90 74.6634 16.3017)" fill="#3758F9" />
                                                <circle cx="1.66343" cy="45.2455" r="1.66343"
                                                    transform="rotate(-90 1.66343 45.2455)" fill="#3758F9" />
                                                <circle cx="1.66343" cy="1.66347" r="1.66343"
                                                    transform="rotate(-90 1.66343 1.66347)" fill="#3758F9" />
                                                <circle cx="16.3016" cy="45.2455" r="1.66343"
                                                    transform="rotate(-90 16.3016 45.2455)" fill="#3758F9" />
                                                <circle cx="16.3016" cy="1.66347" r="1.66343"
                                                    transform="rotate(-90 16.3016 1.66347)" fill="#3758F9" />
                                                <circle cx="30.9398" cy="45.2455" r="1.66343"
                                                    transform="rotate(-90 30.9398 45.2455)" fill="#3758F9" />
                                                <circle cx="30.9398" cy="1.66347" r="1.66343"
                                                    transform="rotate(-90 30.9398 1.66347)" fill="#3758F9" />
                                                <circle cx="45.578" cy="45.2455" r="1.66343"
                                                    transform="rotate(-90 45.578 45.2455)" fill="#3758F9" />
                                                <circle cx="45.578" cy="1.66347" r="1.66343"
                                                    transform="rotate(-90 45.578 1.66347)" fill="#3758F9" />
                                                <circle cx="60.2162" cy="45.2457" r="1.66343"
                                                    transform="rotate(-90 60.2162 45.2457)" fill="#3758F9" />
                                                <circle cx="74.6634" cy="45.2457" r="1.66343"
                                                    transform="rotate(-90 74.6634 45.2457)" fill="#3758F9" />
                                                <circle cx="60.2162" cy="1.66371" r="1.66343"
                                                    transform="rotate(-90 60.2162 1.66371)" fill="#3758F9" />
                                                <circle cx="74.6634" cy="1.66371" r="1.66343"
                                                    transform="rotate(-90 74.6634 1.66371)" fill="#3758F9" />
                                            </svg>
                                        </span>
                                        <span class="absolute -bottom-6 -right-6 z-[-1]">
                                            <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3 32C3 15.9837 15.9837 3 32 3C48.0163 2.99999 61 15.9837 61 32C61 48.0163 48.0163 61 32 61C15.9837 61 3 48.0163 3 32Z"
                                                    stroke="#13C296" stroke-width="6" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="w-full">
                                        <div>
                                            <div class="mb-8 mt-5">
                                                <h1 class="font-bold text-3xl text-blue-600">Raja Ampat</h1>
                                            </div>
                                            <p
                                                class="text-body-color dark:text-dark-6 mb-11 text-base leading-[1.81] font-normal italic sm:text-[22px]">
                                                Selamat datang di website resmi Kecamatan Raja Ampat, semoga website ini memudahkan masyarakat untuk mengetahui informasi seputar kecamatan
                                            </p>
                                            <h4
                                                class="text-dark dark:text-white mb-2 leading-[27px] text-[22px] font-semibold">
                                                Ifan Prima Nursaid 
                                            </h4>
                                            <p class="text-body-color dark:text-dark-6 text-base">
                                                Camat Real Madrid.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Testimonials Section End -->


    <!-- ====== About Section Start -->
    <section class="overflow-hidden pt-20 pb-12 lg:pt-[120px] lg:pb-[90px] bg-white dark:bg-dark">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center justify-between -mx-4">
                <div class="w-full px-4 lg:w-6/12">
                    <div class="flex items-center -mx-3 sm:-mx-4">
                        <div class="w-full px-3 sm:px-4 xl:w-1/2">
                            <div class="py-3 sm:py-4">
                                <img src="https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="" class="w-full rounded-2xl" />
                            </div>
                            <div class="py-3 sm:py-4">
                                <img src="https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="" class="w-full rounded-2xl" />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:px-4 xl:w-1/2">
                            <div class="relative z-10 my-4">
                                <img src="https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="" class="w-full rounded-2xl" />
                                <span class="absolute -right-7 -bottom-7 z-[-1]">
                                    <svg width="134" height="106" viewBox="0 0 134 106" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="1.66667" cy="104" r="1.66667"
                                            transform="rotate(-90 1.66667 104)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="104" r="1.66667"
                                            transform="rotate(-90 16.3333 104)" fill="#3056D3" />
                                        <circle cx="31" cy="104" r="1.66667"
                                            transform="rotate(-90 31 104)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="104" r="1.66667"
                                            transform="rotate(-90 45.6667 104)" fill="#3056D3" />
                                        <circle cx="60.3334" cy="104" r="1.66667"
                                            transform="rotate(-90 60.3334 104)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="104" r="1.66667"
                                            transform="rotate(-90 88.6667 104)" fill="#3056D3" />
                                        <circle cx="117.667" cy="104" r="1.66667"
                                            transform="rotate(-90 117.667 104)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="104" r="1.66667"
                                            transform="rotate(-90 74.6667 104)" fill="#3056D3" />
                                        <circle cx="103" cy="104" r="1.66667"
                                            transform="rotate(-90 103 104)" fill="#3056D3" />
                                        <circle cx="132" cy="104" r="1.66667"
                                            transform="rotate(-90 132 104)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 89.3333)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 89.3333)" fill="#3056D3" />
                                        <circle cx="31" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 31 89.3333)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 45.6667 89.3333)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 60.3333 89.3338)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 88.6667 89.3338)" fill="#3056D3" />
                                        <circle cx="117.667" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 117.667 89.3338)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 74.6667 89.3338)" fill="#3056D3" />
                                        <circle cx="103" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 103 89.3338)" fill="#3056D3" />
                                        <circle cx="132" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 132 89.3338)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="74.6673" r="1.66667"
                                            transform="rotate(-90 1.66667 74.6673)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 1.66667 31.0003)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 16.3333 74.6668)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 16.3333 31.0003)" fill="#3056D3" />
                                        <circle cx="31" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 31 74.6668)" fill="#3056D3" />
                                        <circle cx="31" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 31 31.0003)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 45.6667 74.6668)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 45.6667 31.0003)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 60.3333 74.6668)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 60.3333 30.9998)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 88.6667 74.6668)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 88.6667 30.9998)" fill="#3056D3" />
                                        <circle cx="117.667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 117.667 74.6668)" fill="#3056D3" />
                                        <circle cx="117.667" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 117.667 30.9998)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 74.6667 74.6668)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 74.6667 30.9998)" fill="#3056D3" />
                                        <circle cx="103" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 103 74.6668)" fill="#3056D3" />
                                        <circle cx="103" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 103 30.9998)" fill="#3056D3" />
                                        <circle cx="132" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 132 74.6668)" fill="#3056D3" />
                                        <circle cx="132" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 132 30.9998)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 1.66667 60.0003)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 16.3333)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 16.3333 60.0003)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 16.3333)" fill="#3056D3" />
                                        <circle cx="31" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 31 60.0003)" fill="#3056D3" />
                                        <circle cx="31" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 31 16.3333)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 45.6667 60.0003)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 45.6667 16.3333)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 60.3333 60.0003)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 60.3333 16.3333)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 88.6667 60.0003)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 88.6667 16.3333)" fill="#3056D3" />
                                        <circle cx="117.667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 117.667 60.0003)" fill="#3056D3" />
                                        <circle cx="117.667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 117.667 16.3333)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 74.6667 60.0003)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 74.6667 16.3333)" fill="#3056D3" />
                                        <circle cx="103" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 103 60.0003)" fill="#3056D3" />
                                        <circle cx="103" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 103 16.3333)" fill="#3056D3" />
                                        <circle cx="132" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 132 60.0003)" fill="#3056D3" />
                                        <circle cx="132" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 132 16.3333)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 45.3333)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 1.66667 1.66683)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 45.3333)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 16.3333 1.66683)" fill="#3056D3" />
                                        <circle cx="31" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 31 45.3333)" fill="#3056D3" />
                                        <circle cx="31" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 31 1.66683)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 45.6667 45.3333)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 45.6667 1.66683)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 60.3333 45.3338)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 60.3333 1.66683)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 88.6667 45.3338)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 88.6667 1.66683)" fill="#3056D3" />
                                        <circle cx="117.667" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 117.667 45.3338)" fill="#3056D3" />
                                        <circle cx="117.667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 117.667 1.66683)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 74.6667 45.3338)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 74.6667 1.66683)" fill="#3056D3" />
                                        <circle cx="103" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 103 45.3338)" fill="#3056D3" />
                                        <circle cx="103" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 103 1.66683)" fill="#3056D3" />
                                        <circle cx="132" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 132 45.3338)" fill="#3056D3" />
                                        <circle cx="132" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 132 1.66683)" fill="#3056D3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2 xl:w-5/12">
                    <div class="mt-10 lg:mt-0">
                        <span class="block mb-4 text-lg font-semibold text-blue-600">
                            Mengapa Memilih Kami
                        </span>
                        <h2 class="mb-5 text-3xl font-bold text-gray-900 sm:text-4xl">
                            Jelajahi Keajaiban Raja Ampat
                        </h2>
                        <p class="mb-5 text-base text-gray-700">
                            Raja Ampat, yang terletak di provinsi Papua Barat Indonesia, terkenal dengan keindahan
                            alamnya yang memukau dan keanekaragaman hayati laut yang luar biasa. Menyelamlah di perairan
                            biru kehijauan yang dipenuhi terumbu karang berwarna-warni dan kehidupan laut eksotis.
                        </p>
                        <p class="mb-8 text-base text-gray-700">
                            Baik Anda seorang petualang yang mencari pengalaman menyelam yang mendebarkan atau seorang
                            pecinta alam yang ingin menjelajahi hutan hujan yang masih alami, Raja Ampat menawarkan
                            perjalanan tak terlupakan ke dalam jantung keajaiban alam.
                        </p>
                        <a href="#"
                            class="inline-flex items-center justify-center py-3 text-base font-medium text-center text-white border border-transparent rounded-md px-7 bg-blue-600 hover:bg-opacity-90">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>







</body>

</html>
