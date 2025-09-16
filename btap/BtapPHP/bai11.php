<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Register Form</title>
  <style>
    :root {
      --primary: #00897b;
      --accent: #4db6ac;
      --bg: #e0f7f5;
      --card: #ffffff;
      --text: #212121;
      --border: #b2dfdb;
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: var(--bg);
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      gap: 50px;
    }

    h2 {
      margin-bottom: 15px;
      color: #333;
    }

    .form-section {
      flex: 1;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input,
    select {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      padding: 10px 15px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    .checkbox-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .checkbox-row label {
      display: flex;
      align-items: center;
      gap: 8px;
      font-weight: bold;
      white-space: nowrap;
    }

    .checkbox-row input[type="checkbox"] {
      width: 15px;
      height: 15px;
      margin: 0;
    }

    .toggle-link {
      font-size: 0.9em;
    }

    .toggle-link a {
      color: blue;
      text-decoration: underline;
      cursor: pointer;
    }

    .hidden {
      display: none;
    }

    .facebook-btn {
      width: 100%;
      background: #3b5998;
      color: white;
      padding: 10px;
      text-align: center;
      font-weight: bold;
      margin-bottom: 25px;
    }

    .facebook-btn:hover {
      background: #2d4373;
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- Login Form -->
    <div class="form-section" id="login-form">
      <div class="facebook-btn">Login with Facebook</div>
      <h2>Login</h2>
      <form>
        <label>Username</label>
        <input type="text" name="username">

        <label>Password</label>
        <input type="password" name="password">

        <div class="checkbox-row">
          <label><input type="checkbox">Remember Me</label>
          <span class="toggle-link">Don't have account? <a onclick="toggleForms()">Sign up</a></span>
        </div>

        <button type="submit">Log In</button>
      </form>
    </div>

    <!-- Signup Form -->
    <div class="form-section hidden" id="signup-form">
      <div class="facebook-btn">Signup with Facebook</div>
      <h2>Signup for New Account?</h2>
      <form>
        <label>User Name</label>
        <input type="text" name="new_username">

        <label>User Email *</label>
        <input type="email" name="email">

        <div style="display: flex; gap: 10px;">
          <div style="flex: 1;">
            <label>Select Title</label>
            <select>
              <option>Mr.</option>
              <option>Mrs.</option>
              <option>Ms.</option>
            </select>
          </div>

          <div style="flex: 2;">
            <label>Full name <small>* BLOCK letters</small></label>
            <input type="text" name="fullname">
          </div>
        </div>

        <h3>Company detail</h3>
        <p>Provide detail about your company</p>

        <label>Company name</label>
        <input type="text" name="company">

        <div class="checkbox-row">
          <label><input type="checkbox">I am agree with registration</label>
          <span class="toggle-link" style="margin-top: 10px;">
            Already have an account? <a onclick="toggleForms()">Login</a>
          </span>
        </div>

        <button type="submit">Register</button>
      </form>
    </div>
  </div>

  <script>
    function toggleForms() {
      const login = document.getElementById("login-form");
      const signup = document.getElementById("signup-form");
      login.classList.toggle("hidden");
      signup.classList.toggle("hidden");
    }
  </script>
</body>

</html>