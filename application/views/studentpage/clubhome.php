<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spcc Club</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url('assets/css/nav.css')?>">
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <link rel="stylesheet" href="<?=base_url('assets/css/clubhome.css')?>">
</head>
<body>
<nav class="navbar navbar-expand-custom navbar-mainbg">
    <a class="navbar-brand navbar-logo" href="#">System Plus Club</a>
    <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
            <li class="nav-item active">
                <a class="nav-link"  href="javascript:void(0);"><i class="fas fa-tachometer-alt"></i>Club Lesson</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link"  href="javascript:void(0);"><i class="far fa-address-book"></i>Club Works</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);"><i class="far fa-clone"></i>Event</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);"><i class="far fa-calendar-alt"></i>People</a>
            </li>
        </ul>
    </div>      
</nav>
<div class="container">
  <!----Start banner--->
  <?php foreach($club->result() as $clubs){?>
  <div class="conbanner">
   <div class="content">
     <div class="bgbanner" style="background-image:url('<?=base_url('assets/images/clubbanner/').$clubs->banner?>')"></div>
     <div class="text">
         <h1 class="banner-text"><?=$clubs->clubname?></h1>
     </div>
    </div>
  </div>
  
  <!----End banner--->

  
  <div class="rows">
    <!----- Start MeetLink--->
    <aside class="g-side">
      <div>
        <div>
          <div class="g-round g-mb g-flix">
            <div class="g-img-mb txt-allign">
              <img src="https://fonts.gstatic.com/s/i/productlogos/meet_2020q4/v6/web-48dp/logo_meet_2020q4_color_1x_web_48dp.png" alt="" aria-hidden="true" class="g-icon">
              <span class="asQXV">Meet</span>
            </div>
            <a href="<?=$clubs->gmeetlink?>" class="btn btns">Join</a>
          </div>
        </div>
      </div>
    </aside>
    <?php }?>
    <!----End MeetLink--->
    <main class="m-flix-grow">
      <section>
        <div>
          <div class=" g-mb l-border-radius l-pointer">
            <div class="">
              <div class="l-spacing txt-allign">
                <div class="l-overflow"></div>
                <div class="l-display-flix  l-text-color l-mt l-svg-raduis" style=" background-color: #4285f4;">
                  <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" class=" NMm5M"><path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 18H6V4h2v8l2.5-1.5L13 12V4h5v16z"></path></svg>
                </div>
                <div class="l-text-posted-overflow">
                  <div class="l-font l-text-posted-spacing">
                    <h2><span class="l-overflow">Material: "09 - Knowledge Discovery in Programming"</span></h2>
                    <div class="txt-allign">
                    <span class="l-posted-font-family">Teacher Name posted a new lesson: 09 - Knowledge Discovery in Programming</span>
                    </div>
                  </div>
                  <span class="l-text-posted-date l-text-posted-date-font">
                  <span aria-hidden="true">May 13</span>
                  </span>
                </div>  
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class=" g-mb l-border-radius l-pointer">
            <div class="">
              <div class="l-spacing txt-allign">
                <div class="l-overflow"></div>
                <div class="l-display-flix  l-text-color l-mt l-svg-raduis" style=" background-color: #4285f4;">
                  <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" class=" NMm5M"><path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 18H6V4h2v8l2.5-1.5L13 12V4h5v16z"></path></svg>
                </div>
                <div class="l-text-posted-overflow">
                  <div class="l-font l-text-posted-spacing">
                    <h2><span class="l-overflow">Material: "09 - Knowledge Discovery in Programming"</span></h2>
                    <div class="txt-allign">
                    <span class="l-posted-font-family">Teacher Name posted a new lesson: 09 - Knowledge Discovery in Programming</span>
                    </div>
                  </div>
                  <span class="l-text-posted-date l-text-posted-date-font">
                  <span aria-hidden="true">May 13</span>
                  </span>
                </div>  
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class=" g-mb l-border-radius l-pointer">
            <div class="">
              <div class="l-spacing txt-allign">
                <div class="l-overflow"></div>
                <div class="l-display-flix  l-text-color l-mt l-svg-raduis" style=" background-color: #4285f4;">
                  <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" class=" NMm5M"><path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 18H6V4h2v8l2.5-1.5L13 12V4h5v16z"></path></svg>
                </div>
                <div class="l-text-posted-overflow">
                  <div class="l-font l-text-posted-spacing">
                    <h2><span class="l-overflow">Material: "09 - Knowledge Discovery in Programming"</span></h2>
                    <div class="txt-allign">
                    <span class="l-posted-font-family">Teacher Name posted a new lesson: 09 - Knowledge Discovery in Programming</span>
                    </div>
                  </div>
                  <span class="l-text-posted-date l-text-posted-date-font">
                  <span aria-hidden="true">May 13</span>
                  </span>
                </div>  
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class=" g-mb l-border-radius l-pointer">
            <div class="">
              <div class="l-spacing txt-allign">
                <div class="l-overflow"></div>
                <div class="l-display-flix  l-text-color l-mt l-svg-raduis" style=" background-color: #4285f4;">
                  <svg focusable="false" width="24" height="24" viewBox="0 0 24 24" class=" NMm5M"><path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 18H6V4h2v8l2.5-1.5L13 12V4h5v16z"></path></svg>
                </div>
                <div class="l-text-posted-overflow">
                  <div class="l-font l-text-posted-spacing">
                    <h2><span class="l-overflow">Material: "09 - Knowledge Discovery in Programming"</span></h2>
                    <div class="txt-allign">
                    <span class="l-posted-font-family">Teacher Name posted a new lesson: 09 - Knowledge Discovery in Programming</span>
                    </div>
                  </div>
                  <span class="l-text-posted-date l-text-posted-date-font">
                  <span aria-hidden="true">May 13</span>
                  </span>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</div>
 <!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?=base_url('assets/js/stisla.js')?>"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets1/css/dataTables.bootstrap4.min.js')?>"> </script>

<!-- Page level custom scripts -->
<script src="<?=base_url('assets1/css/demo/datatables-demo.js')?>"></script>
<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?=base_url('assets/js/scripts.js')?>"></script>
<script src="<?=base_url('assets/js/custom.js')?>"></script>
<script src="<?=base_url('assets/js/nav.js')?>"></script>
<script>
 
</script>
</body>
</html>