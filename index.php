<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" class="">

  <title>Send an Email</title>
</head>

<body>

  <div class="container">
    <div class="row" style="place-content: center;">
      <div class="col-10 p-1 pt-3">

        <h4 class="sent-notification"></h4>

        <form id="myForm">

          <div class="col-10 p-3 pt-5" id="form_container">
            <h2>Contact Us</h2>
            <p> Please send your message below. We will get back to you at the earliest! </p>
            <!-- <form role="form" method="post" id="reused_form"> -->
            <div class="row">
              <div class="col-sm-12 form-group">
                <label for="subject"> Subject:</label>
                <input class="form-control" type="textarea" name="subject" id="subject" maxlength="6000"
                  rows="1"></input>
              </div>
              <div class="col-sm-12 pt-3 form-group">
                <label for="body"> Message:</label>
                <textarea class="form-control" type="textarea" name="body" id="body" maxlength="6000"
                  rows="7"></textarea>
              </div>
            </div>
            <div class="row pt-2">
              <div class="col-sm-6 form-group">
                <label for="name"> Your Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="col-sm-6 form-group">
                <label for="email"> Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 pt-3 form-group">
                <button type="button" onclick="sendEmail()" value="Send An Email"
                  class="btn btn-lg btn-primary pull-right">Send &rarr;</button>
              </div>
            </div>
            <!-- </form>
            <div id="success_message" style="width:100%; height:100%; display:none; ">
              <h3>Posted your message successfully!</h3>
            </div>
            <div id="error_message" style="width:100%; height:100%; display:none; ">
              <h3>Error</h3> Sorry there was an error sending your form.
            </div> -->
          </div>

          <!-- <h2>Send an Email</h2>

            <label>Name</label>
            <input id="name" type="text" placeholder="Enter Name">
            <br><br>

            <label>Email</label>
            <input id="email" type="text" placeholder="Enter Email">
            <br><br>

            <label>Subject</label>
            <input id="subject" type="text" placeholder=" Enter Subject">
            <br><br>

            <p>Message</p>
            <textarea id="body" rows="5" placeholder="Type Message"></textarea>
            <br><br>

            <button type="button" onclick="sendEmail()" value="Send An Email">Submit</button> -->
        </form>
      </div>
    </div>
  </div>


  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
  function sendEmail() {
    var name = $("#name");
    var email = $("#email");
    var subject = $("#subject");
    var body = $("#body");

    if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
      $.ajax({
        url: 'sendEmail.php',
        method: 'POST',
        dataType: 'json',
        data: {
          name: name.val(),
          email: email.val(),
          subject: subject.val(),
          body: body.val()
        },
        success: function(response) {
          $('#myForm')[0].reset();
          $('.sent-notification').text("Message Sent Successfully.");
        }
      });
    }
  }

  function isNotEmpty(caller) {
    if (caller.val() == "") {
      caller.css('border', '1px solid red');
      return false;
    } else
      caller.css('border', '');

    return true;
  }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>

</body>

</html>