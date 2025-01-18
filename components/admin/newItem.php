<?php
session_start();
if (!isset($_SESSION['signedIn'])) {
    header("Location: ../../index.html");
    exit();
}
include '../../_api/_db.php';
$uname = $_SESSION['uname'];
$aID = $_SESSION['aID'];

$proID = $_GET['prid'];

$chk_sql = "SELECT * FROM `admin` WHERE a_id ='$aID';";
$res_chk = mysqli_query($con, $chk_sql);
$row = mysqli_fetch_assoc($res_chk);

$chk_sql2 = "SELECT * FROM `projects` WHERE pro_id ='$proID';";
$res_chk2 = mysqli_query($con, $chk_sql2);
$row2 = mysqli_fetch_assoc($res_chk2);

$proNAME = $row2['pro_code'];
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

<body class="flex flex-col justify-between overflow-y-auto">
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap flex-col p-4 md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 md:mb-0" href="projectList.php">
                <img class="bg-none h-16 w-72" src="../../img/logo.png">
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900 font-semibold"></a>
                <a class="mr-5 hover:text-gray-900 font-semibold"></a>
            </nav>
            <button
                class="inline-flex items-center bg-blue-600 border-0 py-1 px-3 focus:outline-none hover:bg-blue-900 rounded text-base text-white font-bold border-2 border-blue-900 mx-2 md:mt-0"
                onclick="window.location.href='projectPage.php?prid=<?php echo $proID; ?>'">
                Project Page
            </button>
            <button
                class="inline-flex items-center bg-blue-600 border-0 py-1 px-3 focus:outline-none hover:bg-blue-900 rounded text-base text-white font-bold border-2 border-blue-900 mx-2 md:mt-0"
                onclick="window.location.href='addItemClass.php'">Add Component Class
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

    <section class="text-gray-600 body-font my-4 auto-container">
        <div class="container px-5 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div class="p-4 w-full">
                    <form class="bg-gray-200 border-2 border-blue-500 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 px-4 rounded-lg relative" action="../../_api/_newComp.php?prid=<?php echo $proID; ?>" method="post">
                        <span class="bg-blue-500 text-white font-bold px-3 py-1 tracking-widest text-sm absolute left-0 top-0 rounded-br">
                        <?php echo $proNAME; ?> New Component
                        </span>
                        <h2 class="text-gray-900 text-2xl m-1 font-bold title-font text-center">ADD NEW COMPONENT</h2>
                        <p class="text-base text-gray-500 font-bold m-1 text-center">*** Add new component here only specific to <?php echo $proNAME; ?> Project ***</p>
                        <div class="lg:flex lg:flex-wrap md:flex md:flex-wrap m-2">
                            <div class="p-2 w-2/3">
                                <div class="relative">
                                    <label for="cmname" class="leading-7 text-lg text-gray-600 font-bold">Component Name</label>
                                    <input type="text" id="cmname" name="cmname"
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 font-semibold py-1 px-3 leading-8 transition-colors duration-200 ease-in-out text-sm"
                                        required>
                                </div>
                            </div>
                            <div class="p-2 w-1/3">
                                <div class="relative">
                                    <label for="cmuid" class="leading-7 text-lg text-gray-600 font-bold">Component Unique ID (** if any **)</label>
                                    <input type="text" id="cmuid" name="cmuid"
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 font-semibold py-1 px-3 leading-8 transition-colors duration-200 ease-in-out text-sm" placeholder="e.g., ABC091091">
                                </div>
                            </div>
                        </div>

                        <div class="lg:flex lg:flex-wrap md:flex md:flex-wrap m-2">
                            <div class="p-2 w-1/4">
                                <div class="relative">
                                    <label for="cmclass" class="leading-7 text-lg text-gray-600 font-bold">Component Class</label>
                                    <select
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 font-semibold py-2 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="cmclass" name="cmclass" required>
                                        <?php
                                        $chk_sql1 = "SELECT * FROM `components_class`";
                                        $res_chk1 = mysqli_query($con, $chk_sql1);

                                        while ($cc_row = mysqli_fetch_assoc($res_chk1)) {
                                            $ccName = $cc_row['it_c_name'];
                                            $ccID = $cc_row['it_c_id'];

                                            echo '<option value="' . $ccID . '">' . $ccName . '</option>';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="p-2 w-1/4">
                                <div class="relative">
                                    <label for="cmqty" class="leading-7 text-lg text-gray-600 font-bold">Component Quantity</label>
                                    <input type="number" id="cmqty" name="cmqty"
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 font-semibold py-1 px-3 leading-8 transition-colors duration-200 ease-in-out text-sm"
                                        required placeholder="Default Quantity that arrived">
                                </div>
                            </div>
                            <div class="p-2 w-1/4">
                                <div class="relative">
                                    <label for="cmunit" class="leading-7 text-lg text-gray-600 font-bold">Component Quantity Unit</label>
                                    <input type="text" id="cmunit" name="cmunit"
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 font-semibold py-1 px-3 leading-8 transition-colors duration-200 ease-in-out text-sm"
                                        required placeholder="Unit of the quantity defined">
                                </div>
                            </div>
                            <div class="p-2 w-1/4">
                                <div class="relative">
                                    <label for="cmcom" class="leading-7 text-lg text-gray-600 font-bold">Consumable/Non Consumable</label>
                                    <select
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-sm outline-none text-gray-700 font-semibold py-2 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        id="cmcom" name="cmcom" required>
                                        <option value="c">Consumable</option>
                                        <option value="nc">Non Consumable</option>
                                        <option value="na">Not Applicable</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="lg:flex lg:flex-wrap md:flex md:flex-wrap m-2">
                            <div class="p-2 w-1/3">
                                <div class="relative">
                                    <label for="cmgloc" class="leading-7 text-lg text-gray-600 font-bold">Component Location</label>
                                    <input type="text" id="cmgloc" name="cmgloc"
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 font-semibold py-1 px-3 leading-8 transition-colors duration-200 ease-in-out text-sm"
                                        required placeholder="Almirah Number or Name">
                                </div>
                            </div>
                            <div class="p-2 w-1/3">
                                <div class="relative">
                                    <label for="cmcmpt" class="leading-7 text-lg text-gray-600 font-bold">Component Compartmental Location</label>
                                    <input type="text" id="cmcmpt" name="cmcmpt"
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 font-semibold py-1 px-3 leading-8 transition-colors duration-200 ease-in-out text-sm" required placeholder="Drawer or Compartment Number Specific">
                                </div>
                            </div>
                            <div class="p-2 w-1/3">
                                <div class="relative">
                                    <label for="cmaloc" class="leading-7 text-lg text-gray-600 font-bold">Component Altered Location</label>
                                    <input type="text" id="cmaloc" name="cmaloc"
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 font-semibold py-1 px-3 leading-8 transition-colors duration-200 ease-in-out text-sm" placeholder="If component is placed somewhere">
                                </div>
                            </div>
                        </div>

                        <div class="lg:flex lg:flex-wrap md:flex md:flex-wrap m-2">
                            <div class="p-2 w-1/3">
                                <div class="relative">
                                    <label for="cmmiss" class="leading-7 text-lg text-gray-600 font-bold">Missing Info</label>
                                    <input type="text" id="cmmiss" name="cmmiss"
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 font-semibold py-1 px-3 leading-8 transition-colors duration-200 ease-in-out text-sm"
                                        placeholder="If anything is missing from Quantity">
                                </div>
                            </div>
                            <div class="p-2 w-1/3">
                                <div class="relative">
                                    <label for="cmsupply" class="leading-7 text-lg text-gray-600 font-bold">Component Supplier</label>
                                    <input type="text" id="cmsupply" name="cmsupply"
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 font-semibold py-1 px-3 leading-8 transition-colors duration-200 ease-in-out text-sm" required placeholder="e.g., ABC Private Limited">
                                </div>
                            </div>
                            <div class="p-2 w-1/3">
                                <div class="relative">
                                    <label for="cminvoice" class="leading-7 text-lg text-gray-600 font-bold">Component Invoice Number</label>
                                    <input type="text" id="cminvoice" name="cminvoice"
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 font-semibold py-1 px-3 leading-8 transition-colors duration-200 ease-in-out text-sm" placeholder="If component is placed somewhere">
                                </div>
                            </div>
                        </div>

                        <div class="lg:flex lg:flex-wrap md:flex md:flex-wrap m-1">
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="cmdesc" class="leading-7 text-lg text-gray-600 font-bold">Component Realted Description</label>
                                    <textarea id="cmdesc" name="cmdesc"
                                        class="w-full bg-white bg-opacity-50 rounded border-2 sm:flex-nowrap border-blue-500 focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 font-semibold py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                        maxlength="2000" placeholder="If any notes relating to the product"></textarea>
                                    <p id="wordCount" class="text-sm text-blue-700 font-bold mt-1">Word count: 0/20</p>
                                </div>
                            </div>

                        </div>
                        <div class="p-2 w-full">
                            <button
                                class="flex mx-auto text-white bg-blue-600 border-2 border-blue-900 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-xl font-bold">
                                Add Component
                            </button>
                        </div>
                    </form>
                </div>
                <!-- <div class="lg:w-1/4 md:w-1/4 m-auto px-4">
                    <img class="object-cover object-center rounded mx-1" alt="hero" src="../../img/new-item.png">
                </div> -->
            </div>
        </div>
    </section>

    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
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
        document.body.style.zoom = "85%";
    </script>
    <script>
        const textarea = document.getElementById('cmdesc');
        const wordCountDisplay = document.getElementById('wordCount');

        textarea.addEventListener('input', () => {
            const words = textarea.value.split(/\s+/).filter(word => word.length > 0);
            if (words.length > 20) {
                textarea.value = words.slice(0, 20).join(' ');
            }
            wordCountDisplay.textContent = `Word count: ${words.length}/20`;
        });
    </script>
</body>

</html>