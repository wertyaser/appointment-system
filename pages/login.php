<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../pico-master/css/pico.css" />
  <title>Log-In Page</title>
</head>

<body>
  <main>
    <h1>LOGIN</h1>
    <form>
      <div class="grid">
        <label for="firstname">
          First name
          <input type="text" id="firstname" name="firstname" placeholder="First name" required>
        </label>

        <label for="lastname">
          Last name
          <input type="text" id="lastname" name="lastname" placeholder="Last name" required>
        </label>
      </div>
      <label for="email">Email address</label>
      <input type="email" id="email" name="email" placeholder="Email address" required>
      <small>We'll never share your email with anyone else.</small>
      <button type="submit">Submit</button>

    </form>
  </main>
</body>

</html>