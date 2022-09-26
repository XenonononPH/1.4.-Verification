<!DOCTYPE html>
<html lang="en">
  <head>
    <title>1.2 Obtain a user</title>
    <meta charset="UTF-8">
  </head>
  <body>
    <div>ID: 2 - Email: janet.weaver@reqres.in</div><br><br>
    <form action="" method="POST">
      <input name="idData" type="text" required placeholder="Enter ID">
      <input name="emailData" type="text" required placeholder="Enter Email">
      <button type="submit" name="submit">Submit</button>
    </form>
    <br><br> 
    <div class="result"></div>
    <script>
      const result = document.querySelector('.result');

      fetch('user.json').then(response => {
        return response.json();
      }).then(UserData => {
        <?php $id = $_POST['idData']; $email = $_POST['emailData']; ?>
        var Data = UserData.data;
        var IDData = Data.user.id;
        var EmailData = Data.user.email;
        var IDvalue = "<?php echo $id ?>";
        var Emailvalue = "<?php echo $email ?>";

        <?php if(isset($_POST['submit'])) { ?>
            if (IDvalue == IDData && Emailvalue == EmailData){
                result.innerHTML = Data.status;
            } else {
                result.innerHTML = `Wrong ID or Email.`;
            }
            <?php } else { ?>=
                result.innerHTML = `Enter ID or Email.`;
        <?php } ?>
        
        console.log(IDvalue);
        console.log(Emailvalue);
        console.log(Data);
      }).catch(error => {
        console.log(error);
      });
    </script>
  </body>
</html>