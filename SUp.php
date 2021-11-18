
    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <title>Hello, world!</title>
      </head>
      <body>
      <form action="signup.php" method="post" id="nameform">
                        <div class="row">
                            <div class="w-50">
                                <div class="input-group outer-shadow hover-in-shadow">
                                    <input type="text" name="name" placeholder="Name" class="input-control">
                                </div>

                                <div class="input-group outer-shadow hover-in-shadow">
                                    <input type="text" name="username" placeholder="Username" class="input-control">
                                </div>
                                
                                <div class="input-group outer-shadow hover-in-shadow">
                                    <input type="text" name="email" placeholder="Email" class="input-control">
                                </div>
 
                                <div class="input-group outer-shadow hover-in-shadow">
                                    <input type="Password" name="password" placeholder="Password" class="input-control">
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="submit-btn">
                                <button type="submit" form="nameform" name="send" class="btn-1 outer-shadow hover-in-shadow">Send Message</button>
                            </div>
                        </div>
                    </form>
      </body>
    </html>
