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
            <li class="nav-item ">
                <a class="nav-link active"  href="javascript:void(0);"><i class="far fa-address-book"></i>Club Works</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);"><i class="far fa-clone"></i>Event</a>
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
      <section id = "listWorks">
       <?php foreach($work as $works){?>
        <div>
          <div class=" g-mb l-border-radius l-pointer" onclick="vid('<?=$works->filename?>')" data-toggle="modal" data-target="#video">
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
                    <span class="l-posted-font-family">Posted a new lesson: Knowledge Discovery in <?=$works->title?></span>
                    </div>
                  </div>
                  <span class="l-text-posted-date l-text-posted-date-font">
                  <span aria-hidden="true"><?=$works->dateposted?></span>
                  </span>
                </div>  
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </section>
    </main>
  </div>
</div>

<!---Video Modal--->
<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <video id="vid"  width="100%" height="100%" controls="controls"></video>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!---End Video Modal--->




 <!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Page level custom scripts -->
<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?=base_url('assets/js/scripts.js')?>"></script>
<script src="<?=base_url('assets/js/custom.js')?>"></script>
<script src="<?=base_url('assets/js/nav.js')?>"></script>
</body>
</html>
<script>
  function vid(filename)
  {
    $("#vid").html('<source src="<?=base_url('assets/file_upload/')?>'+filename+'" type="video/mp4"></source>' );
  }
</script>