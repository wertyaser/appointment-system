<?php
session_start();
include("db_connect.php");
include("functions.php");
$user_data = check_login($conn);

$id = $user_data['student_id'];
$sql = "SELECT * FROM users where student_id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$birthday = $row['birthday'];
$course = $row['course'];
$email = $row['email'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users set student_id='$id', name='$name', birthday ='$birthday', course='$course', email='$email', password='$password' WHERE student_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: my-account.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/output.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="pico-master/css/pico.min.css" /> -->
    <title>My Account</title>
  </head>

  <body>
    <div
      class="min-h-screen bg-cover bg-center isolation relative"
      style="background-image: url('images/auth-bg.jpg')"
    >
      <div
        class="FadedOverlay absolute inset-0 bg-bckgrd opacity-70 z-10"
      ></div>

      <nav
        class="bg-bckgrd w-full relative top-0 left-0 right-0 start-0 border-b-4 border-accent z-20"
      >
        <div
          class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
        >
          <a
            class="flex items-center space-x-3 rtl:space-x-reverse"
            href="home.php"
          >
            <img src="./images/Logo.png" class="h-8" />
            <span
              class="self-center text-lg font-bold whitespace-nowrap text-black"
              >Student Management System</span
            >
          </a>
          <div class="flex items-center space-x-4">
            <a
              href="my-account.php"
              class="self-center text-lg font-normal whitespace-nowrap text-black"
              >My Account</a
            >
            <a href="logout.php">
              <img
                src="./images/sign-out-alt.png"
                alt="Logout"
                class="h-6 w-6 text-pink"
              />
            </a>
          </div>
        </div>
      </nav>

      <div class="mx-auto max-w-5xl w-11/12 py-8 z-10 relative mt-10">
        <h1 class="font-bold text-7xl text-left mb-3">My Account</h1>
        <form
          method="post"
          class="mx-auto max-w-5xl w-11/12 py-2 z-20 relative mt-10"
        >
          <div class="flex gap-2">
           <div class="w-full">
            <span>Username</span>
            <input
              type="text"
              id="name"
              name="name"
              value="<?php echo $name ?>"
              required
              class="border border-black rounded-md text-black mb-3 px-6 py-4 block w-full justify-center bg-white bg-opacity-50"
            />
           </div>
            <div class="w-full">
            <span>Birthday</span>
            <input
              type="date"
              id="birthday"
              name="birthday"
              value="<?php echo $birthday ?>"
              class="border border-black rounded-md text-black mb-3 px-6 py-4 block w-full justify-center bg-white bg-opacity-50"
            />
            </div>
          </div>
          <span>Course</span>
          <input
            type="text"
            id="course"
            name="course"
            value="<?php echo $course ?>"
            class="border border-black rounded-md text-black mb-3 min-w-0 px-6 py-4 block w-full justify-center bg-white bg-opacity-50"
          />
          <span>Email</span>
          <input
            type="email"
            id="email"
            name="email"
            value="<?php echo $email ?>"
            required
            class="border border-black rounded-md text-black mb-3 min-w-0 px-6 py-4 block w-full justify-center bg-white bg-opacity-50"
          />
          <span>Password</span>
          <input
            type="password"
            id="password"
            name="password"
            value="<?php echo $password ?>"
            required
            class="border-4 border-black rounded-md text-black mb-3 min-w-0 px-6 py-4 block w-full justify-center bg-white bg-opacity-50"
          />
          <div class="flex gap-2">
            <button
              type="button"
              style="background-color: #C5D3CD;"
              onClick="handleClearFields()"
              class="px-6 py-4 rounded-md border border-black hover:bg-white/[.5] transition-all text-black"
            >
              Clear
            </button>
            <button
              type="submit"
              name="submit"
              onclick="updateAlert()"
              class="text-black rounded-md px-6 py-4 border border-white w-full  bg-white bg-opacity-50"
            >
              Update
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script> -->
    <script src="./js/functions.js"></script>
  </body>
</html>
