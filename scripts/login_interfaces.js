const loginForm = document.getElementById("login-form");
const errorMsg = document.getElementById("error-msg");
const btnSubmit = document.getElementById("Login");


btnSubmit.addEventListener("click", (e) => {
    e.preventDefault();
    const username = loginForm.user.value;
    const password = loginForm.pwd.value;

    if(username === "justin" && password === "123") {
        alert("Success!");
        window.location.href = "/index.html";
    }
    else if(username === "" && password === "") {
        alert("Please fill up the input fields!");
    }
    else {
       alert("Invalid Username or Password");
    }
})