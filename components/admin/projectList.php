<?php
session_start();
if (!isset($_SESSION['signedIn'])) {
    header("Location: ../../index.html");
    exit();
}
include '../../_api/_db.php';
$uname = $_SESSION['uname'];
$aID = $_SESSION['aID'];

$chk_sql = "SELECT * FROM `admin` WHERE a_id ='$aID';";
$res_chk = mysqli_query($con, $chk_sql);
$row = mysqli_fetch_assoc($res_chk);
?>

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
    <header class="text-gray-600 body-font fixed top-0 left-0 w-full z-10 bg-white">
        <div class="container mx-auto flex flex-wrap flex-col p-4 md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 md:mb-0" href="../main.php">
                <img class="bg-none h-16 w-72" src="../../img/logo.png">
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900 font-semibold"></a>
                <a class="mr-5 hover:text-gray-900 font-semibold"></a>
            </nav>
            <button
                class="inline-flex items-center bg-blue-600 border-0 py-1 px-3 focus:outline-none hover:bg-blue-900 rounded text-base text-white font-bold border-2 border-blue-900 mx-2 md:mt-0"
                onclick="window.location.href='../main.php'">
                Home
            </button>

            <p class="flex title-font font-medium items-center text-gray-900 md:mb-0 ml-4 mr-2" href="#">

                <?php
                if (!isset($_SESSION['signedIn'])) {
                    echo 'Hi, ' . $uname;
                } else {
                    echo 'Admin, ' . $uname;
                }
                ?>

            </p>

            <div class="relative">
                <button id="dropdownButton" class="flex items-center focus:outline-none">
                    <?php
                    if (strcmp($row['a_gender'], 'M') == 0) {
                        echo '<img class="bg-none h-16 w-16 rounded-full" src="../../img/male.png" alt="User Avatar">';
                    } elseif (strcmp($row['a_gender'], 'F') == 0) {
                        echo '<img class="bg-none h-16 w-16 rounded-full" src="../../img/female.png" alt="User Avatar">';
                    } else {
                        echo '<img class="bg-none h-16 w-16 rounded-full" src="../../img/gender_none.png" alt="User Avatar">';
                    }
                    ?>
                </button>

                <div id="dropdownMenu" class="hidden absolute right-0 bg-white border-2 border-green-700 shadow-lg rounded-md w-32 mt-2">
                    <ul class="text-black font-bold">
                        <li>
                            <a href="#" class="block px-4 py-1 hover:bg-green-500">Profile</a>
                        </li>
                        <hr class="border-t-2 border-green-800">
                        <li>
                            <a href="../../_api/_logout.php" class="block px-4 py-1 hover:bg-green-500">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section class="flex flex-col h-screen text-gray-600 body-font overflow-y-auto my-24 auto-container">
        <div class="container px-5 py-4 mx-auto">
            <div class="flex flex-col text-center w-full mb-8">
                <h1 class="sm:text-2xl text-2xl font-bold title-font mb-2 text-gray-900">SWAN PROJECTS</h1>
            </div>

            <div class="flex flex-wrap my-4">
                <?php
                $p_sql = "SELECT * FROM `projects`";
                $p_res = mysqli_query($con, $p_sql);
                $numRows_p = mysqli_num_rows($p_res);

                if ($numRows_p > 0) {
                    while ($p_row = mysqli_fetch_assoc($p_res)) {

                        $p_IMG = $p_row['pro_domain'];
                        $p_CODE = $p_row['pro_code'];
                        $p_FUND = $p_row['pro_funded_by'];
                        $p_ID = $p_row['pro_id'];

                        echo ' <a class="p-4 md:w-1/4" href="projectPage.php?prid=' . $p_ID . '">
                                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col border-2 border-blue-600 shadow-lg">
                                        <div class="flex items-center mb-3">
                                            <img src="../../img/icons-project/' . $p_IMG . '.png" alt="Distributed Component" class="w-12 h-12">
                                        </div>   
                                        <div class="flex-grow">
                                            <h2 class="text-gray-900 text-lg title-font font-medium">' . $p_CODE . '</h2>
                                            <p class="leading-relaxed text-base font-semibold">Funded by: ' . $p_FUND . '</p>
                                        </div>
                                    </div>
                                </a>        
                            ';
                    }
                }

                ?>
            </div>

            <div class="mx-auto flex flex-grow p-2 md:flex-row">
                <div class="md:ml-auto flex flex-wrap items-center text-base justify-center"></div>
                <button class="flex mx-2 mt-12 text-white font-bold bg-blue-600 border-0 py-2 px-8 focus:outline-none hover:bg-green-800 rounded border-2 border-green-800" onclick="window.location.href='addItemClass.php'">Add Component Class
                    <i class="fa-regular fa-square-plus text-2xl text-white ml-auto px-2"></i>
                </button>
                <button class="flex mx-2 mt-12 text-white font-bold bg-blue-600 border-0 py-2 px-8 focus:outline-none hover:bg-green-800 rounded border-2 border-green-800" onclick="window.location.href='addNewProject.php'">Add New Project
                    <i class="fa-solid fa-folder-plus text-2xl text-white ml-auto px-2"></i>
                </button>
                <button class="flex mx-2 mt-12 text-white font-bold bg-blue-600 border-0 py-2 px-8 focus:outline-none hover:bg-green-800 rounded border-2 border-green-800" onclick="window.location.href='addNewAdmin.php'">Add New Admin
                    <i class="fa-solid fa-user-tie text-xl text-white ml-auto px-2"></i>
                </button>
            </div>
        </div>
    </section>

    <footer class="text-gray-600 fixed bottom-0 left-0 w-full bg-white">
        <div class="container px-5 py-2 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center text-gray-900 md:mb-0"
                href="https://cse.iitkgp.ac.in/~smisra/swan/index.html" target="_blank">
                <img class="bg-none h-10 w-10" src="../../img/SWAN-logo.png">
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">©
                2024 SWANIMS —
                <a href="https://cse.iitkgp.ac.in/~smisra/swan/index.html"
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
    <script>
        // JavaScript to toggle dropdown visibility
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', () => {
            if (dropdownMenu.classList.contains('hidden')) {
                dropdownMenu.classList.remove('hidden');
            } else {
                dropdownMenu.classList.add('hidden');
            }
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
    <script>
        document.body.style.zoom = "95%";
    </script>
</body>

</html>