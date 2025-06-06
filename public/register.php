<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-card {
      width: 420px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .login-header {
      background-color: #42b72a;
      color: white;
      text-align: center;
      padding: 30px;
      font-size: 2rem;
      font-weight: bold;
    }

    .login-body {
      padding: 60px 30px 100px; /* ⬅️ Increased bottom padding */
    }

    .login-body input.form-control {
      border-radius: 30px;
      height: 50px;
        width: 90%;
      background-color: #eee;
      border: none;
      font-weight: 600;
      margin-bottom: 25px;
      padding-left: 20px;
    }

    .forgot-link {
      font-size: 0.9rem;
      text-align: right;
      margin-bottom: 25px;
    }

    .forgot-link a {
      text-decoration: none;
      color: #42b72a;
      font-weight: 500;
    }

    .login-button {
      background-color: #42b72a;
      color: white;
      font-weight: bold;
      border-radius: 30px;
      height: 50px;
      width: 100%;
      border: none;
      font-size: 1rem;
    }

    .login-footer {
      text-align: center;
      padding: 20px 30px 30px;
      font-size: 0.95rem;
    }

    .login-footer a {
      color: #42b72a;
      font-weight: bold;
      text-decoration: none;
    }
  </style>
</head>
<body>
 
  <div class="login-card">
      <div class="alert alert-success alert-dismissible fade show mt-5" role="alert" style="display: none;" id="success-alert">
        <strong>Success</strong> <p id="success-message">You should check in on some of those fields below.</p> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert" style="display: none;" id="error-alert">
            <strong>Error</strong><p id="error-message">You should check in on some of those fields below.</p> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

    <div class="login-header">Sign Up</div>
    <div class="login-body">
      <form>
        <input type="text" id="name" class="form-control" placeholder="Name">
         <input type="email" id="email" class="form-control" placeholder="email">
        <input type="password" id="password" class="form-control" placeholder="password">
 
        <button type="submit" class="login-button" id="sign_up">SIGN Up</button>
      </form>
    </div>
    <div class="login-footer">
      Have an account? <a href="login.php">SIGN IN NOW</a>
    </div>
  </div>
<script>
$(document).ready(function(){

  
 $('#sign_up').click(function(e){
    console.log('working')
  e.preventDefault();
 
  const formData = {
    name:$('#name').val(),
    email:$('#email').val(),
    password:$('#password').val(),
  };
  console.log(formData)
  $.ajax({
            method:'POST',
            url:'https://tms-portal.up.railway.app/api/register',
            dataType:'json',
            headers:{
                'Content-Type':'application/json'
            },
            data:JSON.stringify(formData),
            success:function(response){
                $('#success-alert').show();
                $('#success-message').text(response.message)
                setTimeout(function(){
                    $('#success-alert').hide();
                },3000);
            },
            error:function(error){
                $('#error-alert').show();
                $('#error-message').text(error.responseJSON.message)
                setTimeout(function(){
                    $('#error-alert').hide();
                },3000);
            }

            })
 })

});

</script>
</body>
</html>
