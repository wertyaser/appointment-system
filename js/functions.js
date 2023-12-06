function updateAlert() {
  alert("Information updated successfully.");
  // setTimeout(function () {
  //   window.location.href = "my-account.php";
  // }, 5000); // Adjust the delay time in milliseconds (1000ms = 1s)
}

function createUserAlert() {
  alert("Successfully created a new user");
}

function deleteUserAlert() {
  alert("Successfully deleted!");
}

function handleBackButton() {
  window.history.back();
}

function handleClearFields() {
  console.log("run");
  const inputs = document.querySelectorAll("input");
  console.log(inputs);
  inputs.forEach((input) => (input.value = ""));
}

function registerAlert() {
  alert("Successfully registered!");
}
