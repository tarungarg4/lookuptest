<html>
<head>
  <title>Registration Page</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
  <div class="jumbotron">
    <div class="message"></div>
    <div class="success"></div>
<form id="myform" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Registration Form</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="John Dave" class="form-control input-md" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="abc@xyz.com" class="form-control input-md" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Phone</label>  
  <div class="col-md-4">
  <input id="phone" name="phone" type="text" placeholder="9876543210" class="form-control input-md" >
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="country">Country</label>
  <div class="col-md-4">
    <select id="country" name="country" class="form-control">
      <option value="india">India</option>
      <option value="usa">USA</option>
      <option value="uk">UK</option>
      <option value="france">France</option>
      <option value="japan">Japan</option>
      <option value="china">China</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <div class="col-md-offset-4 col-md-4">
    <input type="submit" id="submit" name="submit" class="btn btn-primary" value= "Submit">
  </div>
</div>

</fieldset>
</form>
</div>
</div>
<style>
  .message{
    color: red;
  }.success{
    color: green;
  }
</style>
<script type="text/javascript">
function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
function phonenumber(inputtxt)  
{  
  var re = /^\d{10}$/;  
  return re.test(inputtxt);
  // if(inputtxt.value.match(phoneno))
  //     return true;  
  // else
  //    return false;  
}  
$(document).ready(function() {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  $("#submit").click(function() {
    var name1 = $("#name").val();
    var email1 = $("#email").val();
    var phone1= $("#phone").val();
    var country1 = $("#country").val();

    if (name1 == '' || email1 == '' || phone1 == '' || country1 == '') {
      $( ".message" ).text( "Insertion Failed Some Fields are Blank....!!" ).show().fadeOut( 2000 );
    } else if(!validateEmail(email1)){
      $( ".message" ).text( "Email Format is not correct" ).show().fadeOut( 2000 );
    }else if(!phonenumber(phone1)){
      $( ".message" ).text( "Not a valid phone number" ).show().fadeOut( 2000 );
    }
    else {
      $.post("/members", {
        name: name1,
        email: email1,
        phone: phone1,
        country: country1
        }, function(data) {
          if('string' ==typeof(data)){
            data=JSON.parse(data);
            $( ".message" ).text( data.message ).show().fadeOut( 2000 );
          }
          else{
            $( ".success" ).text( "successfully updated" ).show().fadeOut( 2000 );
            $('#myform')[0].reset(); // To reset form fields
          }
        });
    }
    event.preventDefault();
  });
  
});
</script>
<body>
</html>