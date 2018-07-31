<?php include __DIR__ . '/../header.php';?>
<main class="text-center">
    <form class="form-signin" action="/signin/newuser" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <div class="name-group" style="width: 100%">
        <img class="mb-4 avatar-img" src="http://static.animeplus.org/img/video/590-temp.jpg" alt="" width="100px" height="100px">
        <label for="inputName" class="sr-only">Nome: </label>
        <input type="text" id="inputName" class="form-control m-2" placeholder="Nome" required autofocus
        name="name">
        <label for="surname" class="sr-only">Sobrenome: </label>
        <input type="text" id="surname" class="form-control m-2" placeholder="Sobrenome" required autofocus
      name="surname">
      </div>
      <br>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus
      name="email">
      <div class="separator-inputs"></div>
      <label for="inputPassword" class="sr-only">Password</label>
      
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">

      <div class="separator-inputs"></div>

      <div class="checkbox mb-3 ckb-left">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
</main>
<?php include __DIR__ . '/../footer.php';?>