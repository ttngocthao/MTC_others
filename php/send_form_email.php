<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIREDsales@actonbrightsteel.co.uk
    $email_to = "sales@actonbrightsteel.co.uk";
    $email_subject = "website@actonbrightsteel.co.uk";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted.<br /><br />";
        echo "These errors appear below.<br /><br />";
        echo $error;
	echo "<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        // !isset($_POST['telephone']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }
 
    $name = $_POST['name']; // required
 //   $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required

  //  $telephone = $_POST['telephone']; // not required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($message) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
      echo "12";
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Name: ".clean_string($name)."\n";
  //   $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
  //  $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($message)."\n";

  // create email headers
  $headers = 'From: website@actonbrightsteel.co.uk'+"\r\n".
  'Reply-To: '.$email_from."\r\n" .
  'X-Mailer: PHP/' . phpversion();

$send_mail= mail($email_to, $email_subject, $email_message, $headers);  


?>
 

  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-141112310-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "UA-141112310-1");
    </script>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <title>Acton Bright Steel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://use.typekit.net/odu6xdg.css" />
    <!--Tab Icon-->
    <link rel="icon" href="images/header/logo-icon.png" />
    <link
      href="https://fonts.googleapis.com/css?family=Aleo:400,700|Open+Sans:400,600,700|Lato:700"
      rel="stylesheet"
      />
    <link rel="stylesheet" href="css/main.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  </head>
  <body id="body">
    <p><?php echo $name . " " . $email_from . " " . $message . " " .  $send_mail ; ?></p>
    <div class="disclaimer">
      <div class="disclaimer_box">
        <a class="disclaimer__box__close"></a>
        <div class="disclaimer__box__content-wrapper">
          <h3 class="title title--big title--white title--center">Disclaimer</h3>
          <p class="title title--small title--white title--center">
            Whilst every effort has been taken to ensure the accuracy of this
            publication, Acton Bright Steel Ltd can not accept responsibility
            for
            any errors, omissions or mis-statements. Acton Bright Steel Ltd also
            reserves the right to change all or any part of the information
            contained within this website without notice.
          </p>
        </div>

      </div>
    </div>
    <!-- You write code for this content block in another file -->


    <!-- navigation.njk -->
    <header class="header nav-down">
      <div class="header__search-wrap">
        <!-- <input type="text" placeholder="Search this site" class="header_search-input"> -->
        <div class="header_search-input">
          <gcse:searchbox-only resultsurl="searchResult.html"></gcse:searchbox-only>
        </div>
      </div>
      <div class="header__inner">
        <div class="header__left">
          <img src="images/header/logo.png" alt="" class="header__logo" />
          <a class="btn btn--nav btn--rectange" id="menuButton">
            <div class="btn__menu" id="btnMenu">
              <span class="btn__menu__lines" aria-hidden="true"></span>
              <span class="btn__menu__lines" aria-hidden="true"></span>
              <span class="btn__menu__lines" aria-hidden="true"></span>
            </div>
            <span class="btn__menu__text"></span>
          </a>
        </div>
        <div class="header__right">
          <a href="tel:+441784455273" class="header__phone link link--phone">
            <span class="header__phone__text">Call Us Today
            </span><span class="header__phone__icon">01784 455273</span>
          </a>
          <nav class="nav" id="navElement">
            <ul class="nav__wrapper">
              <!-- HOME -->
              <li class="nav__main-item">
                <a class="nav__main-item-link" href="index.html"><img
                    class="nav__main-item__icon"
                    src="images/header/home_icon.png" alt="Home Button Icon" />
                  <span class="nav__main-item__home-btn">Home</span>
                </a>
              </li>
              <!-- ABOUT US -->
              <li class="nav__main-item">
                <a class="nav__main-item-link" href="about.html">About Us</a>
                <ul class='nav__mid-wrapper' id='aboutElement'>
                  <li class="nav__mid-item nav__mid-item--back"
                    id='back-about-btn'>
                    <a class="nav__mid-item-link nav__mid-item-link--back"
                      href="">Back</a>
                  </li>
                  <li class='nav__mid-item'>
                    <a class="nav__mid-item-link nav__mid-item-link--desktop"
                      href="about.html">About</a>
                    <a class="nav__mid-item-link nav__mid-item-link--useful
                      nav__mid-item-link--mobile" href="about.html">About</a>
                  </li>
                  <li class='nav__mid-item'>
                    <a class="nav__mid-item-link nav__mid-item-link--desktop"
                      href="history.html">Company History</a>
                    <a class="nav__mid-item-link nav__mid-item-link--useful
                      nav__mid-item-link--mobile" href="history.html">Company
                      History</a>
                  </li>
                </ul>
              </li>
              <!-- PRODUCTS -->
              <li class="nav__main-item">
                <a class="nav__main-item-link nav__main-item-link--products"
                  href="products.html">Products</a>
                <ul class="nav__mid-wrapper" id="productsElement">
                  <!-- STOCK RANGE -->
                  <li class="nav__mid-item nav__mid-item--back">
                    <a class="nav__mid-item-link nav__mid-item-link--back"
                      href="">Back</a>
                  </li>
                  <li class="nav__mid-item">
                    <a class="nav__mid-item-link nav__mid-item-link--desktop"
                      href="products.html">Stock Range</a>
                    <a class="nav__mid-item-link nav__mid-item-link--stock
                      nav__mid-item-link--mobile" href="products.html">Stock
                      Range</a>
                    <ul class="nav__inner-wrap nav__inner-wrap--first"
                      id="productInnerStockElement">
                      <li class="nav__inner-item nav__inner-item--back">
                        <a class="nav__inner-item-link
                          nav__inner-item-link--back
                          nav__inner-item-link--backStock" href="">Back</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_RoundsImperial.pdf"
                          target='blank'>Rounds - Imperial</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_RoundsMetric.pdf"
                          target='blank'>Rounds - Metric</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_Hexagon.pdf"
                          target='blank'>Hexagons</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_Flats_Imperial_EN32B.pdf"
                          target='blank'>Flats - Imperial</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_Flats_Metric_EN32B.pdf"
                          target='blank'>Flats - Metric</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_Squares.pdf"
                          target='blank'>Squares</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_Angles.pdf"
                          target='blank'>Angles</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_KeySteel.pdf"
                          target='blank'>Key steel</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_ToolSteel.pdf"
                          target='blank'>Tool steel</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link" href="enquire.html"
                          target='blank'>Tubes</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_StainlessSteel.pdf"
                          target='blank'>Stainless steel</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_Aluminium.pdf"
                          target='blank'>Aluminium</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_Brass.pdf"
                          target='blank'>Brass</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_BoxSection.pdf"
                          target='blank'>Box section</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="DataSheets/StockPDF/Acton_Sheet.pdf"
                          target='blank'>Sheet</a>
                      </li>
                    </ul>
                  </li>
                  <!-- TECHNICAL GUIDE -->
                  <li class="nav__mid-item">
                    <a class="nav__mid-item-link nav__mid-item-link--desktop"
                      href="techGuidesBLCS.html">Technical Guide</a>
                    <a class="nav__mid-item-link nav__mid-item-link--technical
                      nav__mid-item-link--mobile" href="techGuidesBLCS.html">Technical
                      Guide</a>
                    <ul class="nav__inner-wrap"
                      id="productInnerTechnicalElement">
                      <li class="nav__inner-item nav__inner-item--back">
                        <a class="nav__inner-item-link
                          nav__inner-item-link--back
                          nav__inner-item-link--backTechnical" href="">Back</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="techGuidesBLCS.html">Bright low carbon steels</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="techGuidesBMCS.html">Bright medium carbon steels</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="techGuidesDHS.html">Direct hardening steels</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="techGuidesCHS.html">Case hardening steels</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="techGuidesSS.html">Stainless steels</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="techGuidesTS.html">Tool steels</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="techGuidesAL.html">Aluminium</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="techGuidesBrass.html">Brass</a>
                      </li>

                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="techGuidesSheet.html">Sheet</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="techGuidesBS.html">Box Section</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link"
                          href="techGuidesTubes.html">Tubes</a>
                      </li>
                      <li class="nav__inner-item nav__inner-item-spare">
                        <a class="nav__inner-item-link" href="#"></a>
                      </li>
                    </ul>
                  </li>
                  <!-- USEFUL INFORMATION -->
                  <li class="nav__mid-item">
                    <a class="nav__mid-item-link nav__mid-item-link--desktop"
                      href="usefulInfo.html">Useful Information</a>
                    <a class="nav__mid-item-link nav__mid-item-link--useful
                      nav__mid-item-link--mobile" href="usefulInfo.html">Useful
                      Information</a>
                    <ul class="nav__inner-wrap" id="productInnerUsefulElement">
                      <li class="nav__inner-item nav__inner-item--back">
                        <a class="nav__inner-item-link
                          nav__inner-item-link--back
                          nav__inner-item-link--backUseful" href="">Back</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link" target='_blank'
                          href="DataSheets/Download/IntlSpecChart.pdf">International
                          specification chart</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link" target='_blank'
                          href="DataSheets/useful-info/BS-970-(1991)-Tolerances.pdf">BS
                          970 (1991) tolerances</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link" target='_blank'
                          href="DataSheets/useful-info/ISO-Tolerances.pdf">ISO
                          tolerances</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link" target='_blank'
                          href="DataSheets/useful-info/Conversion-of-Standard-Units.pdf">Conversion
                          Factors of Standard Units</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link" target='_blank'
                          href="DataSheets/useful-info/Formulae.pdf">WEIGHT
                          FORMULAE</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link" target='_blank'
                          href="DataSheets/useful-info/Hardness-comparison-table.pdf">Hardness
                          Comparison table</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link" target='_blank'
                          href="DataSheets/useful-info/Gauges-for-Tubes-Sheets(SWG).pdf">Gauges
                          for tubes &amp; sheets (SWG)</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link" target='_blank'
                          href="DataSheets/useful-info/SurfaceQuality.pdf">Surface
                          quality</a>
                      </li>
                      <li class="nav__inner-item">
                        <a class="nav__inner-item-link" target='_blank'
                          href="DataSheets/useful-info/BSEN_TestCert.pdf">BS EN
                          10204 Certificate Types</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>

              <!-- SERVICES -->
              <li class="nav__main-item">
                <a class="nav__main-item-link" href="cutting.html">Services</a>
                <ul class='nav__mid-wrapper' id='servicesElement'>
                  <li class="nav__mid-item nav__mid-item--back"
                    id='back-services-btn'>
                    <a class="nav__mid-item-link nav__mid-item-link--back"
                      href="">Back</a>
                  </li>
                  <li class='nav__mid-item'>
                    <a class="nav__mid-item-link nav__mid-item-link--desktop"
                      href="cutting.html">Cutting</a>
                    <a class="nav__mid-item-link nav__mid-item-link--useful
                      nav__mid-item-link--mobile" href="cutting.html">Cutting</a>
                  </li>
                  <li class='nav__mid-item'>
                    <a class="nav__mid-item-link nav__mid-item-link--desktop"
                      href="chamfering.html">Chamfering</a>
                    <a class="nav__mid-item-link nav__mid-item-link--useful
                      nav__mid-item-link--mobile" href="chamfering.html">Chamfering</a>
                  </li>
                  <li class='nav__mid-item'>
                    <a class="nav__mid-item-link nav__mid-item-link--desktop"
                      href="certification.html">Certification</a>
                    <a class="nav__mid-item-link nav__mid-item-link--useful
                      nav__mid-item-link--mobile" href="certification.html">Certification</a>
                  </li>
                  <li class='nav__mid-item'>
                    <a class="nav__mid-item-link nav__mid-item-link--desktop"
                      href="techSpec.html">Technical / Specials</a>
                    <a class="nav__mid-item-link nav__mid-item-link--useful
                      nav__mid-item-link--mobile" href="techSpec.html">Technical
                      / Specials</a>
                  </li>
                </ul>
              </li>

              <!-- FAQS -->
              <li class="nav__main-item">
                <a class="nav__main-item-link" href="faqs.html">FAQs</a>
              </li>

              <!-- DOWNLOADS -->
              <li class="nav__main-item">
                <a class="nav__main-item-link" href="downloads.html">Downloads</a>
              </li>

              <!-- OFFERS -->
              <li class="nav__main-item">
                <a class="nav__main-item-link" href="offers.html">Special Offers</a>
              </li>

              <!-- CONTACT US -->
              <li class="nav__main-item
                nav__main-item--active">
                <a class="nav__main-item-link
                  nav__main-item-link--active" href="contact.html">Contact Us</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <main role="main" class="main">
      <div class="hero hero--small hero--contact"></div>
      <div id='map' style='height:440px;width:100%;'></div>
      <script>
      var map;
      function initMap() {
        var markerIcon = {
          url: 'https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678111-map-marker-512.png',
          scaledSize: new google
            .maps
            .Size(45, 45),
          origin: new google
            .maps
            .Point(0, 0),
          labelOrigin: new google
            .maps
            .Point(75, 55)
        };
        var myLatLng = {
          lat: 51.433630,
          lng: -0.531070
        }
        map = new google
          .maps
          .Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 13
          });
        var infoWindow = new google
          .maps
          .InfoWindow();
        var service = new google
          .maps
          .places
          .PlacesService(map);

        var marker = new google
          .maps
          .Marker({
            position: myLatLng,
            map: map,
            animation: google.maps.Animation.DROP,
            icon: markerIcon,
            label: {
              text: 'Acton Bright Steel Ltd',
              color: "red",

              fontSize: "16px",
              fontWeight: "bold"
            }
          });
        var request = {
          placeId: 'ChIJU9VCkM1wdkgR1Iagxm-Byes',
          fields: [
            'name',
            'formatted_address',
            'place_id',
            'geometry',
            'formatted_phone_number',
            'opening_hours',
            'website'
          ]
        };
        service.getDetails(request, function (place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {

            var today = new Date().getDay();
            if (today == 0) {
              today = 6
            } else {
              --today
            }

            google
              .maps
              .event
              .addListener(marker, 'click', function () {
                infoWindow.setContent('<div><span style="font-weight:bold;">' + place.name + '</span><br>' + place.formatted_address + '<br/>' + place.formatted_phone_number + '<br/>Open Time:' + place.opening_hours.weekday_text[today] + '</div>');
                infoWindow.open(map, this);
              })
          }
        })

      }
    </script>
      <script async="async" defer="defer"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUgMSzmXxqQVMg3ifyGXi7xeASymldtqw&libraries=places&callback=initMap"></script>
      <div class='background--blue-gradient'>
        <div class="contact-location">

          <div class="location">
            <h3 class="title title--medium title--white">Our head office</h3>
            <address class="location__address">
              Acton Bright Steel Limited<br>
              Gordon Road<br>
              The Causeway<br>
              Staines, Surrey<br>
              TW18 3BG
            </address>

            <h4 class="location__heading title title--regular title--white">Telephone</h4>
            <div class="location__numbers">
              <div>
                <p class="location__title">Sales &amp; General</p>
                <a href="tel:+441784455273" class="location__link">01784 455273</a>
              </div>

              <div>
                <p class="location__title">Accounts</p>
                <a href="tel:+441784463595" class="location__link">01784 463595</a>
              </div>
            </div>

            <h4 class="location__heading title title--regular title--white">Email</h4>
            <p class="location__title">Sales</p>
            <a href="mailto:sales@actonbrightsteel.co.uk"
              class="location__link">sales@actonbrightsteel.co.uk</a>

            <p class="location__title">Accounts</p>
            <a href="mailto:sales@actonbrightsteel.co.uk"
              class="location__link">accounts@actonbrightsteel.co.uk</a>
          </div>
          <!--method="POST"
            action="contactUs"  -->

            <h3 class="contact__heading title title--medium title--white">Thank you for sending your message.</h3>
        </div>
      </div>

    </main>
    <!-- footer.njk -->
    <footer class="footer" id="footer">
      <div class='footer-wrap'>
        <div class="footer__header">
          <img src="images/footer/Logo_small.png" alt="" class="footer__logo">
          <h3 class="footer__title">Steel stockholders of carbon, alloy,
            stainless and tool steel, aluminium, brass, tube, box section and
            sheet</h3>
        </div>
        <div class="footer__content">
          <nav class="footer__item footer__nav">
            <ul>
              <li class="footer__nav__item"><a href="about.html"
                  class="footer__nav__link">About us</a></li>
              <li class="footer__nav__item"><a href="products.html"
                  class="footer__nav__link">Products</a></li>
              <li class="footer__nav__item"><a href="faqs.html"
                  class="footer__nav__link">FAQs</a></li>
              <li class="footer__nav__item"><a href="contact.html"
                  class="footer__nav__link">Contact us</a></li>
              <li class="footer__nav__item"><a href="offers.html"
                  class="footer__nav__link">Offers</a></li>
            </ul>
          </nav>

          <nav class="footer__item footer__nav">
            <ul>
              <li class="footer__nav__item"><a
                  href="../../DataSheets/Download/Conditions_of_trading.pdf"
                  target='_blank' class="footer__nav__link">Terms &amp;
                  Conditions</a></li>
              <li class="footer__nav__item"><a
                  href="../../DataSheets/Download/quality_policy_document.pdf"
                  target='_blank' class="footer__nav__link">Quality Policy</a></li>
              <li class="footer__nav__item"><a
                  href="../../DataSheets/Download/environmental_policy.pdf"
                  target='_blank' class="footer__nav__link">Environmental Policy</a></li>
              <li class="footer__nav__item"><a
                  href="../../DataSheets/Download/Privacy_policy.pdf"
                  target='_blank' class="footer__nav__link">Privacy Policy</a></li>
            </ul>
          </nav>

          <div class="footer__item footer__address">
            Acton Bright Steel Limited<br/>
              Gordon Road <br/>
                The Causeway <br/>
                  Staines, Surrey <br/>
                    TW18 3BG

                    <div class="footer__address__bottom">
                      <a href="tel:00441784455273"
                        class="footer__address__link">
                        <span class="footer__address__link--bold">Tel:</span>
                        01784 455273
                      </a>
                      <a href="mailto:sales@actonbrightsteel.co.uk"
                        class="footer__address__link">
                        <span class="footer__address__link--bold">Email:</span>
                        sales@actonbrightsteel.co.uk
                      </a>
                    </div>
                  </div>

                  <div class="footer__item footer__ask-expert">
                    <p class="footer__ask-expert__text">If you can’t find the
                      specification you want, why not ask one of our experts and
                      see how we can help you.</p>

                    <a href="askexpert.html" class="btn btn--rectange">Ask Our
                      Experts</a>
                  </div>
                </div>
                <div class="footer__site-info">
                  <div class="footer__site-info__inner">
                    <p class="footer__site-info__text">&copy; Copyright 2020
                      Acton Bright Steel Limited</p>
                    <a class="footer__site-info__text
                      footer__site-info__text--disclaimer">Disclaimer</a>
                    <a href="https://www.arthaus.co.uk/"
                      class="footer__site-info__text" target="_blank">Design by
                      Arthaus</a>
                  </div>
                </div>
              </div>

            </footer>
            <script src="js/wow.js"></script>
            <script>
      new WOW().init();
    </script>
            <script src="js/main.js"></script>
            <script>
      (function() {
        var cx = "006150598466530813465:sjiqj-iv2ws";
        var gcse = document.createElement("script");
        gcse.type = "text/javascript";
        gcse.async = true;
        gcse.src = "https://cse.google.com/cse.js?cx=" + cx;
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(gcse, s);
      })();
      window.onload = function() {
        document.getElementById("gsc-i-id1").placeholder = "Search this site";
      };
    </script>
          </body>

        <!-- <script>
  (function() {
    var cx = '006150598466530813465:sjiqj-iv2ws';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchbox></gcse:searchbox> -->

 

<?php
 
}
?>