<?php
session_start();
include '../db_connect.php';
include '../functions.php';
check_login($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/output.css">
  <title>Get Students Registered Between Last and First of this month</title>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-blue min-h-screen">
  <main class="mx-auto w-11/12 max-w-7xl h-full pb-16">
    <form method="post" class="flex p-10 gap-3">
      <input type="text" placeholder="Search" name="search"
        class="block w-full p-4 pl-10 text-sm bg-transparent text-white rounded-lg border-2 border-pink focus:border-pink-violet outline-none transition-all">
      <button name="submit" class="text-white text-md p-5 bg-pink rounded-md border">Search</button>
    </form>
    <div class="flex justify-between pt-24 mb-10">
      <h1 class="text-pink font-display text-5xl" data-aos="fade-right">Get Students Registered Between Last and First
        of this month</h1>
      <div class="flex gap-3">
        <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
            href="add-user.php">ADD USER</a></button>
        <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
            href="logout.php">LOG OUT</a></button>
      </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg " data-aos="flip-up">
      <table class="w-full text-xl text-left ">
        <thead class="text-xl text-white uppercase bg-pink ">
          <tr>
            <th scope="col" class="px-6 py-3">
              Student ID
            </th>
            <th scope="col" class="px-6 py-3">
              Grade
            </th>
            <th scope="col" class="px-6 py-3">
              Name
            </th>
            <th scope="col" class="px-6 py-3">
              Birthday
            </th>
            <th scope="col" class="px-6 py-3">
              Course
            </th>
            <th scope="col" class="px-6 py-3">
              Email
            </th>
            <th scope="col" class="px-6 py-3">
            </th>
          </tr>
        </thead>

        <?php

        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($conn, $sql);

        // Check if the form is submitted and a search query is provided
        if (isset($_POST['submit'])) {
          $search = $_POST['search'];
          // Filter users based on search query
          $sql = "SELECT * FROM `users` WHERE student_id='$search' OR name LIKE '%$search%' OR email LIKE '%$search%' OR course LIKE '%$search%'";
          $result = mysqli_query($conn, $sql);
        }

        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['student_id'];
            $name = $row['name'];
            $birthday = $row['birthday'];
            $course = $row['course'];
            $email = $row['email'];
            $password = $row['password'];
            $grade = $row['grade'];
            echo '<tbody><tr class="border-b font-light whitespace-nowrap text-white">
                    <td class="px-6 py-4">' . $id . '</td>
                    <td class="px-6 py-4">' . $grade . '</td>
                    <td class="px-6 py-4">' . $name . '</td>
                    <td class="px-6 py-4">' . $birthday . '</td>
                    <td class="px-6 py-4">' . $course . '</td>
                    <td class="px-6 py-4">' . $email . '</td>
                    <td>
                    <button class="bg-pink p-3 rounded-lg"><a href="edit-admin.php?update_id=' . $id . '">Edit</a></button>
                    <button onclick="deleteUserAlert();" class="bg-violet p-3 rounded-lg"><a href="delete.php?delete_id=' . $id . '">Delete</a></button>
                </td></tr></tbody>';
          }
        }
        ?>


      </table>
    </div>


    <div class="mx-auto max-w-3xl flex flex-col gap-2 mt-12">
      <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
          href="between.php">Get Students Registered Between Last and First of this month</a></button>
      <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a href="in.php">Get
          students only enrolled as BSIT</a></button>
      <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a href="max.php">Get
          the latest registered student</a></button>
      <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a href="min.php">Get
          the oldest registered student</a></button>
      <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
          href="average.php">Get the average grade</a></button>
      <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a href="sum.php">Get
          the sum grade</a></button>
      <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
          href="concat-string-date.php">View in summary format</a></button>
      <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
          href="count-group-by.php">Count students only enrolled as BSIT</a></button>
    </div>
  </main>


  <div class="fixed inset-x-0 bottom-0 -z-10">
    <svg class="w-screen absolute inset-x-0 bottom-0 mt-10 -z-10" width="100%" id="svg" viewBox="0 0 1440 390"
      xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
      <style>
        .path-0 {
          animation: pathAnim-0 4s;
          animation-timing-function: linear;
          animation-iteration-count: infinite;
        }

        @keyframes pathAnim-0 {
          0% {
            d: path("M 0,400 C 0,400 0,133 0,133 C 68.09094256259206,144.25202503681885 136.18188512518412,155.5040500736377 189,168 C 241.81811487481588,180.4959499263623 279.36340206185565,194.23582474226805 333,182 C 386.63659793814435,169.76417525773195 456.3645066273932,131.55265095729013 530,122 C 603.6354933726068,112.44734904270987 681.1785714285716,131.55357142857142 746,141 C 810.8214285714284,150.44642857142858 862.921207658321,150.23306332842418 914,156 C 965.078792341679,161.76693667157582 1015.1365979381442,173.51417525773192 1080,171 C 1144.8634020618558,168.48582474226808 1224.5324005891016,151.71023564064802 1287,143 C 1349.4675994108984,134.28976435935198 1394.7337997054492,133.644882179676 1440,133 C 1440,133 1440,400 1440,400 Z");
          }

          25% {
            d: path("M 0,400 C 0,400 0,133 0,133 C 72.10953608247422,152.13125920471282 144.21907216494844,171.2625184094256 204,164 C 263.78092783505156,156.7374815905744 311.2332474226804,123.08118556701032 364,123 C 416.7667525773196,122.91881443298968 474.84793814433,156.41273932253313 542,168 C 609.15206185567,179.58726067746687 685.375,169.26785714285717 738,167 C 790.625,164.73214285714283 819.6520618556702,170.5158321060383 878,171 C 936.3479381443298,171.4841678939617 1024.0167525773193,166.6688144329897 1086,169 C 1147.9832474226807,171.3311855670103 1184.280927835052,180.80891016200295 1239,176 C 1293.719072164948,171.19108983799705 1366.859536082474,152.09554491899854 1440,133 C 1440,133 1440,400 1440,400 Z");
          }

          50% {
            d: path("M 0,400 C 0,400 0,133 0,133 C 52.03424153166421,120.76030927835052 104.06848306332842,108.52061855670102 167,106 C 229.93151693667158,103.47938144329898 303.7603092783505,110.67783505154641 366,119 C 428.2396907216495,127.32216494845359 478.89027982326957,136.7680412371134 529,134 C 579.1097201767304,131.2319587628866 628.6785714285713,116.24999999999997 696,112 C 763.3214285714287,107.75000000000003 848.3954344624447,114.23195876288659 908,119 C 967.6045655375553,123.76804123711341 1001.7396907216496,126.82216494845362 1062,124 C 1122.2603092783504,121.17783505154638 1208.6458026509572,112.47938144329896 1276,113 C 1343.3541973490428,113.52061855670104 1391.6770986745214,123.26030927835052 1440,133 C 1440,133 1440,400 1440,400 Z");
          }

          75% {
            d: path("M 0,400 C 0,400 0,133 0,133 C 74.50773195876289,124.55743740795288 149.01546391752578,116.11487481590575 204,113 C 258.9845360824742,109.88512518409425 294.4458762886598,112.09793814432989 344,111 C 393.5541237113402,109.90206185567011 457.20103092783506,105.49337260677467 516,118 C 574.7989690721649,130.50662739322533 628.75,159.92857142857144 702,158 C 775.25,156.07142857142856 867.798969072165,122.79234167893961 927,106 C 986.201030927835,89.20765832106039 1012.05412371134,88.9020618556701 1069,88 C 1125.94587628866,87.0979381443299 1213.9845360824743,85.59941089837997 1281,93 C 1348.0154639175257,100.40058910162003 1394.0077319587629,116.70029455081001 1440,133 C 1440,133 1440,400 1440,400 Z");
          }

          100% {
            d: path("M 0,400 C 0,400 0,133 0,133 C 68.09094256259206,144.25202503681885 136.18188512518412,155.5040500736377 189,168 C 241.81811487481588,180.4959499263623 279.36340206185565,194.23582474226805 333,182 C 386.63659793814435,169.76417525773195 456.3645066273932,131.55265095729013 530,122 C 603.6354933726068,112.44734904270987 681.1785714285716,131.55357142857142 746,141 C 810.8214285714284,150.44642857142858 862.921207658321,150.23306332842418 914,156 C 965.078792341679,161.76693667157582 1015.1365979381442,173.51417525773192 1080,171 C 1144.8634020618558,168.48582474226808 1224.5324005891016,151.71023564064802 1287,143 C 1349.4675994108984,134.28976435935198 1394.7337997054492,133.644882179676 1440,133 C 1440,133 1440,400 1440,400 Z");
          }
        }
      </style>
      <defs>
        <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
          <stop offset="5%" stop-color="#974ec3"></stop>
          <stop offset="95%" stop-color="#504099"></stop>
        </linearGradient>
      </defs>
      <path
        d="M 0,400 C 0,400 0,133 0,133 C 68.09094256259206,144.25202503681885 136.18188512518412,155.5040500736377 189,168 C 241.81811487481588,180.4959499263623 279.36340206185565,194.23582474226805 333,182 C 386.63659793814435,169.76417525773195 456.3645066273932,131.55265095729013 530,122 C 603.6354933726068,112.44734904270987 681.1785714285716,131.55357142857142 746,141 C 810.8214285714284,150.44642857142858 862.921207658321,150.23306332842418 914,156 C 965.078792341679,161.76693667157582 1015.1365979381442,173.51417525773192 1080,171 C 1144.8634020618558,168.48582474226808 1224.5324005891016,151.71023564064802 1287,143 C 1349.4675994108984,134.28976435935198 1394.7337997054492,133.644882179676 1440,133 C 1440,133 1440,400 1440,400 Z"
        stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="0.53"
        class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
      <style>
        .path-1 {
          animation: pathAnim-1 4s;
          animation-timing-function: linear;
          animation-iteration-count: infinite;
        }

        @keyframes pathAnim-1 {
          0% {
            d: path("M 0,400 C 0,400 0,266 0,266 C 68.11800441826215,285.11395434462446 136.2360088365243,304.2279086892489 185,290 C 233.7639911634757,275.7720913107511 263.17396907216494,228.2023195876289 330,228 C 396.82603092783506,227.7976804123711 501.0681148748158,274.9628129602356 571,275 C 640.9318851251842,275.0371870397644 676.5535714285714,227.94642857142858 724,219 C 771.4464285714286,210.05357142857142 830.7175994108984,239.25147275405007 896,242 C 961.2824005891016,244.74852724594993 1032.576030927835,221.0476804123711 1096,223 C 1159.423969072165,224.9523195876289 1214.9782768777613,252.5578055964654 1271,264 C 1327.0217231222387,275.4421944035346 1383.5108615611193,270.7210972017673 1440,266 C 1440,266 1440,400 1440,400 Z");
          }

          25% {
            d: path("M 0,400 C 0,400 0,266 0,266 C 71.51527982326954,273.59167893961705 143.03055964653907,281.18335787923417 212,274 C 280.9694403534609,266.81664212076583 347.3930412371133,244.8582474226804 391,237 C 434.6069587628867,229.1417525773196 455.39727540500735,235.38365243004418 519,231 C 582.6027245949927,226.61634756995582 689.0178571428571,211.60714285714286 751,224 C 812.9821428571429,236.39285714285714 830.5312960235641,276.18777614138435 874,300 C 917.4687039764359,323.81222385861565 986.8569587628865,331.6417525773196 1055,316 C 1123.1430412371135,300.3582474226804 1190.0408689248898,261.2452135493372 1254,249 C 1317.9591310751102,236.75478645066278 1378.9795655375551,251.3773932253314 1440,266 C 1440,266 1440,400 1440,400 Z");
          }

          50% {
            d: path("M 0,400 C 0,400 0,266 0,266 C 51.076399116347574,283.36671575846833 102.15279823269515,300.7334315169367 163,307 C 223.84720176730485,313.2665684830633 294.46520618556707,308.4329896907216 364,301 C 433.53479381443293,293.5670103092784 501.98637702503675,283.5346097201768 559,291 C 616.0136229749633,298.4653902798232 661.5892857142858,323.4285714285714 724,311 C 786.4107142857142,298.5714285714286 865.6564801178203,248.75110456553753 920,234 C 974.3435198821797,219.24889543446247 1003.784793814433,239.56701030927837 1056,260 C 1108.215206185567,280.4329896907216 1183.2043446244477,300.98085419734906 1251,302 C 1318.7956553755523,303.01914580265094 1379.397827687776,284.50957290132544 1440,266 C 1440,266 1440,400 1440,400 Z");
          }

          75% {
            d: path("M 0,400 C 0,400 0,266 0,266 C 48.29952135493372,256.00294550810014 96.59904270986743,246.0058910162003 151,244 C 205.40095729013257,241.9941089837997 265.903350515464,247.97938144329893 340,251 C 414.096649484536,254.02061855670107 501.7875552282768,254.07658321060387 571,243 C 640.2124447717232,231.92341678939613 690.9464285714287,209.7142857142857 748,228 C 805.0535714285713,246.2857142857143 868.4267304860089,305.0662739322533 925,312 C 981.5732695139911,318.9337260677467 1031.346649484536,274.02061855670104 1093,269 C 1154.653350515464,263.97938144329896 1228.186671575847,298.85125184094255 1288,305 C 1347.813328424153,311.14874815905745 1393.9066642120765,288.57437407952875 1440,266 C 1440,266 1440,400 1440,400 Z");
          }

          100% {
            d: path("M 0,400 C 0,400 0,266 0,266 C 68.11800441826215,285.11395434462446 136.2360088365243,304.2279086892489 185,290 C 233.7639911634757,275.7720913107511 263.17396907216494,228.2023195876289 330,228 C 396.82603092783506,227.7976804123711 501.0681148748158,274.9628129602356 571,275 C 640.9318851251842,275.0371870397644 676.5535714285714,227.94642857142858 724,219 C 771.4464285714286,210.05357142857142 830.7175994108984,239.25147275405007 896,242 C 961.2824005891016,244.74852724594993 1032.576030927835,221.0476804123711 1096,223 C 1159.423969072165,224.9523195876289 1214.9782768777613,252.5578055964654 1271,264 C 1327.0217231222387,275.4421944035346 1383.5108615611193,270.7210972017673 1440,266 C 1440,266 1440,400 1440,400 Z");
          }
        }
      </style>
      <defs>
        <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
          <stop offset="5%" stop-color="#974ec3"></stop>
          <stop offset="95%" stop-color="#504099"></stop>
        </linearGradient>
      </defs>
      <path
        d="M 0,400 C 0,400 0,266 0,266 C 68.11800441826215,285.11395434462446 136.2360088365243,304.2279086892489 185,290 C 233.7639911634757,275.7720913107511 263.17396907216494,228.2023195876289 330,228 C 396.82603092783506,227.7976804123711 501.0681148748158,274.9628129602356 571,275 C 640.9318851251842,275.0371870397644 676.5535714285714,227.94642857142858 724,219 C 771.4464285714286,210.05357142857142 830.7175994108984,239.25147275405007 896,242 C 961.2824005891016,244.74852724594993 1032.576030927835,221.0476804123711 1096,223 C 1159.423969072165,224.9523195876289 1214.9782768777613,252.5578055964654 1271,264 C 1327.0217231222387,275.4421944035346 1383.5108615611193,270.7210972017673 1440,266 C 1440,266 1440,400 1440,400 Z"
        stroke="none" stroke-width="0" fill="url(#gradient)" fill-opacity="1"
        class="transition-all duration-300 ease-in-out delay-150 path-1"></path>
    </svg>
  </div>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="./js/functions.js"></script>
</body>

</html>