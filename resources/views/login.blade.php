<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />
  <style>
    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #0089cf, #0060af);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #0089cf, #0060af);
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }

    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
  </style>
</head>

<body>

  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="/images/baniyaslogo.png" style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">FC Baniyas</h4>
                  </div>

                  <form method="POST" action="/login">
                    <p>Please login to your account</p>
                    @csrf
                    <div class="form-outline mb-4">
                      <input name="email" type="email" id="form2Example11" class="form-control" placeholder="Phone number or email address" required />
                      <label class="form-label" for="form2Example11">Email</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input name="password" type="password" id="form2Example22" class="form-control" required />
                      <label class="form-label" for="form2Example22">Password</label>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                        in</button>
                      <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                    </div>



                  </form>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">We are more than just a CLUB</h4>
                  <p class="small mb-0">Bani Yas Sports and Cultural Club is a UAE Club compromising football, volleyball, handball, table tennis, and fencing as well as several other sports, chaired by Sheikh Saif bin Zayed Al Nahyan, may God protect him. Bani Yas club was established and publicized upon a decision made by the Supreme Council for Youth and Sports in 1982. The club is located in Bani Yas area, Abu Dhabi. The mission of the club is to raise the motivations of the youngesters and direct them to sports and cultural activities, keep the young people away from all that is harmful, and for them to become useful members of their community and represent their country and their club honorably. The vision of the founders of Bani Yas club emphasizes that the club shall become a symbol of superiority and excellence in various sport, cultural and social activities, and to strengthen the development of sports in accordance with the vision and perception planned by the wise leadership. </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.js"></script>
</body>

</html>