<link rel="stylesheet" href="/assets/css/mainheader.css">
<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="upper_img">
            <img class="logo_img" src="/assets/images/logo.svg" alt="">

            <form class="search_bar" action="/Views/Index/index.php" method="post">
              <input class="search_input" type="text" name="search" placeholder="Keresés">
              <button type="submit" class = "search_button" name="search_button"></button>
            </form>

          </div>

          <div class="navbar-header">

            <!-- ha összemegy a screen, akkor létrehozza a leugró részt -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!--<a class="navbar-brand" href="#">Project name</a> -->
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategóriák <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <!-- <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li> -->
                </ul>
              </li>
            <!--  <li class="active"><a href="#">Home</a></li> -->
              <li><a href="/Blog">Blog</a></li>
              <li><a href="/Contact">Kapcsolat</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Facebook logo <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-static-top/">Insta logo</a></li>
              <li><a href="../navbar-fixed-top/">YT logo</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
</div>
