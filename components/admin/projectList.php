<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWANIMS</title>
    <link rel="icon" href="../../img/SWAN-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Kelly+Slab&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="../../css/style.css">

</head>

<body class="flex flex-col h-screen justify-between overflow-hidden">
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap flex-col p-4 md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 md:mb-0" href="../../index.html">
                <img class="bg-none h-16 w-72" src="../../img/logo.png">
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900 font-semibold"></a>
                <a class="mr-5 hover:text-gray-900 font-semibold"></a>
            </nav>
            <button
                class="inline-flex items-center bg-blue-600 border-0 py-1 px-3 focus:outline-none hover:bg-blue-900 rounded text-base text-white font-bold border-2 border-blue-900 mx-2 md:mt-0"
                onclick="window.location.href='#'">
                Take New Item
            </button>
            <button
                class="inline-flex items-center bg-blue-600 border-0 py-1 px-3 focus:outline-none hover:bg-blue-900 rounded text-base text-white font-bold border-2 border-blue-900 mx-2 md:mt-0"
                onclick="window.location.href='#'">
                Admin Panel
            </button>
            <a class="flex title-font font-medium items-center text-gray-900 md:mb-0 mx-2" href="#">
                <img class="bg-none h-16 w-16" src="../../img/female.png">
            </a>
        </div>
    </header>

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-4 mx-auto">
            <div class="flex flex-col text-center w-full mb-8">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">
                    Projects
                </h1>
            </div>
            <div class="flex flex-wrap my-4 overflow-auto pList">
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col border-2 border-blue-600 shadow-lg">
                        <div class="flex items-center mb-3">
                            <img src="../../img/icons-project/distributed-comp.svg" alt="Distributed Component" class="w-12 h-12">
                            <h2 class="text-gray-900 text-lg title-font font-medium">Shooting Stars</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar
                                toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <div
                                class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">The Catalyzer</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar
                                toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <div
                                class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <circle cx="6" cy="6" r="3"></circle>
                                    <circle cx="6" cy="18" r="3"></circle>
                                    <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                                </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Neptune</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar
                                toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center text-gray-900 md:mb-0"
                href="https://cse.iitkgp.ac.in/~smisra/swan/people.html" target="_blank">
                <img class="bg-none h-10 w-10" src="../../img/SWAN-logo.png">
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">©
                2024 SWANIMS —
                <a href="https://cse.iitkgp.ac.in/~smisra/swan/people.html"
                    class="font-semibold text-blue-600 ml-1 hover:text-green-900" rel="noopener noreferrer"
                    target="_blank">@swanlab</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                        </path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none"
                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                        </path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </footer>

</body>

</html>