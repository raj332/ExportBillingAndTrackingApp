<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>SR-Exports</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/index.css">
  <style>
        html,
        body {
            margin: 0px;
            padding: 0px;
            font-family: Geneva, Tahoma, sans-serif
  }

    </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light m-0 p-0" style="font-weight:bold; overflow:hidden">
    <div class="container-fluid p-0">
      <h1> <a class="navbar-brand  bg-dark m-0" href="#" style=" font-size:1.8rem; color:white;padding:1rem">S<font color="#dc3545">R</font> EXPORTS</a></h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse m-0 " id="navbarSupportedContent" style="box-shadow:0px 0px 3px black;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Rate & Ship</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Support</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>
        </ul>
        <div class="d-flex">
          <a href="./login.php"> <button class="btn btn-danger mx-3  p-3 px-4 "style=" border-radius:0;font-weight:bold;">Login</button></a>
        </div>
      </div>
    </div>
  </nav>




  <!-----------------------------------------------Tracking ----------------------------------------->
  <div class="d-flex justify-content-center mt-5 bg-danger">
    <form class="d-flex " style="width:22rem; margin:1rem;">
      <input class="form-control m-0" type="search" style="width:15rem;border-radius:0;border:3px solid #dc3545" placeholder="Tracking No" id="search" aria-label="Search">
      <button class="btn btn-danger p-3 m-0" data-bs-toggle="modal" data-bs-target="#myModal" type="button" onclick="trackit()" style=" border-radius:0;font-weight:bold;">Track It!</button>
    </form>
  </div>

  <div class="py-3 px-3 m-5 bg-light" id="errorbox" style="position:relative; height:15rem">
  </div>

  <div class="py-3 ml-2 mr-2 mt-5 bg-light" id="trackingbox" style="position:relative">
    <div>
      <h5 class="text-center justify-self-center p-5 m-3 " >Tracking No <span id="tno" class="text-danger"></span> </h5>
    </div>


    <div>
      <div class="d-flex flex-nowrap justify-content-center mt-5 ">
        <div id="pb1" class="w-25  " style="height:0.8rem; background:black;border-right :0.4rem solid white;">
          <div id="pb11" class="bg-danger w-100 h-100"></div>
        </div>
        <div id="pb2" class="w-25" style="height:0.8rem;background:black;border-left :0.4rem solid white;border-right:0.4rem solid white""><div id=" pb11" class="bg-danger w-100 h-100"></div>
      </div>
      <div id="pb3" class="w-25 " style="height:0.8rem;background:black;border-left :0.5rem solid white;">
        <div id="pb11" class="bg-danger w-100 h-100"></div>
      </div>

    </div>
    <table class="mb-5 mt-2 " style="width:100%">
      <tr>
        <td class=" h5 text-center w-50"> From</td>
        <td class="text-center h5 w-50"> To</td>
      </tr>
      <tr>
        <td class="pb-1 text-center w-50">
          <br>
          <h3 id="source" class="text-danger "></h3>
        </td>
        <td class="pb-1 text-center w-50">
          <br>
          <h3 id="dest" class="text-danger "></h3>
        </td>
      </tr>
    </table>


  </div>
  <h3 class=" m-3 mt-5 text-center" id="status"></h3>
  <h5 class="mt-5 text-center" id="timestamp"></h5>
  <div class="text-center m-3">
    <button class="btn btn-danger" type="button" id="detailbtn">Detail Tracking </button>
</div>
      <div class="d-flex justify-content-center mt-5">

        <div class="wrapper" id="wrapper">
          <!-- <div class="center-line"></div>
    <div class="row row-1">
      <section>
        <i class="icon"></i>
       
        <div class="details">
          <span class="date"></span>
        </div>
        <p class="location">
        </p>

      </section>
    </div>
    <div class="row row-2">
      <section>
      <i class="icon"></i>
      
        <div class="details">
          <span class="date">22 jan 2021</span>
        </div>
        <p class="location">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos, temporibus reprehenderit. Nemo laudantium aspernatur eveniet incidunt nesciunt quod recusandae accusamus, earum nostrum? Voluptate quaerat aperiam dicta, molestiae sapiente ab nulla.
        </p>

      </section>
    </div> -->
        </div>

      </div>
    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="./js/jquery.min.js"></script>


<script>
  var token = "";
  $("#detailbtn").click(function() {
    $("#wrapper").css("display", "block");
  })

  function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  const checkauth = async () => {
    token = getCookie("token");
    if (token == "") {
      let headersList = {
        "Content-Type": "application/x-www-form-urlencoded"
      }

      let bodyContent = "grant_type=client_credentials&client_id=l7621deee255a14b188e358458e1a5c5c7&client_secret=e474e2ecde9a447ab62aa1ce443e192c";
      let response = await fetch("https://apis-sandbox.fedex.com/oauth/token", {
        method: "POST",
        body: bodyContent,
        headers: headersList
      })
      data = await response.json();
      token = data.access_token;
      document.cookie = 'token=' + token + '; max-age=3600; path=/';
    }
  }

  $(document).ready(function() {
    $("#trackingbox").css("display", "none");
    $("#errorbox").css("display", "none");
    $("#wrapper").css("display", "none");
    checkauth();

  })
  $("#closebtn").click(function() {
    $("#wrapper").css("display", "none");
    $("#trackingbox").css("display", "none");
  })
  const trackit = async () => {

    $("#wrapper").css("display", "none");
    $("#trackingbox").css("display", "none");
    $("#errorbox").css("display", "none");
    let status;
    let source;
    let timestemp;
    let dest;
    let details = "";
    let service;
    let tno = $("#search").val();
    if (tno % 10 == 1) {
      service = 'FEDEX'
    } else if (tno % 10 == 2) {
      service = 'UPS'
    } else if (tno % 10 == 3) {
      service = 'DHL'
    }
    $('#tno').text(tno)
    tno = tno / 10;
    tno = parseInt(tno)
    tno = tno / 2;
    var data = "";

    switch (service) {
      case "FEDEX": {
        checkauth();
        let headersList = {

          "Content-Type": "application/json",
          "Authorization": "Bearer " + token,
        }

        let bodyContent = JSON.stringify({
          "trackingInfo": [{
            "trackingNumberInfo": {
              "trackingNumber": tno
            }
          }],
          "includeDetailedScans": true
        });

        let response = await fetch("https://apis-sandbox.fedex.com/track/v1/trackingnumbers", {
          method: "POST",
          body: bodyContent,

          headers: headersList
        });

        data = await response.json();
        path = data.output.completeTrackResults[0].trackResults[0];
        console.log(data.output);

        // if (path.error.code == 'TRACKING.TRACKINGNUMBER.NOTFOUND') {
        //   $('#errorbox').html("<h1 class='text-danger text-center m-5'>No shipment with given tracking number found.</h1>");
        //   $("#errorbox").css("display", "block");
        //   break;
        // }


        source = path.originLocation.locationContactAndAddress.address.city + ' , ' + path.originLocation.locationContactAndAddress.address.countryName;
        dest = path.destinationLocation.locationContactAndAddress.address.city + ' , ' + path.destinationLocation.locationContactAndAddress.address.countryName;
        status = path.latestStatusDetail.description + ' at ' + path.latestStatusDetail.scanLocation.city + " , " + path.latestStatusDetail.scanLocation.countryName;

        if (path.latestStatusDetail.code == 'DL') {
          timestamp = path.scanEvents[0].date;

          timestamp = changetstamp(timestamp);
        } else {
          timestamp = path.scanEvents[0].date;
          timestamp = changetstamp(timestamp);
          timestamp = timestamp + ' <br> Estimated Delivery on ' + changetstamp(path.dateAndTimes[0].dateTime);
        }
        details = "<div class='center-line'></div>";
        let len = path.scanEvents.length;
        let j=1;
        for (i = len - 1; i >= 0; i--) {

          if (path.scanEvents[i].eventType != 'IT' && path.scanEvents[i].eventType != 'OC') {
            details = details + " <div class='row row-" + j + "'> <section><i class='icon'></i><div class='details'><span class='date'>" + changetstamp(path.scanEvents[i].date) + "</span></div><p class='location'>" + path.scanEvents[i].eventDescription + "  " + path.scanEvents[i].scanLocation.city + " , " + path.scanEvents[i].scanLocation.countryCode + "</p></section></div>";
          if (j == 1) {
            j = 2;
          } else {
            j = 1;
          }
          }
        }
        $('#source').html(source);
        $('#dest').html(dest);
        $('#status').html(status);
        $('#timestamp').html(timestamp);
        $("#wrapper").html(details);
        $("#trackingbox").css("display", "block");


      }
      break;
    case "UPS": {

    }
    break;
    case "DHL": {

      let url = "https://api-eu.dhl.com/track/shipments?trackingNumber=" + tno;
      let response = await fetch(url, {
        method: 'GET',
        headers: {
          'DHL-API-Key': 'luNyrmraEjGdRprHrVY9cNDv5GlG0vtn'
        }
      });
      data = await response.json();
      console.log(data);
      details = "<div class='center-line'></div>";
      if (!data.status) {
        if (data.shipments[0].status.status != 'delivered') {
          status = data.shipments[0].status.description;
          timestamp = changetstamp(data.shipments[0].status.timestamp) + ' <br> Estimated Delivery on ' + changetstamp(data.shipments[0].estimatedTimeOfDelivery);
        } else {
          status = data.shipments[0].status.description;
          timestamp = changetstamp(data.shipments[0].status.timestamp);
        }
        source = data.shipments[0].origin.address.addressLocality
        dest = data.shipments[0].destination.address.addressLocality

        let len = data.shipments[0].events.length;
        let j = 1;
        for (i = len - 1; i >= 0; i--) {

          details = details + " <div class='row row-" + j + "'> <section><i class='icon'></i><div class='details'><span class='date'>" + changetstamp(data.shipments[0].events[i].timestamp) + "</span></div><p class='location'>" + data.shipments[0].events[i].description + "</p></section></div>";
          if (j == 1) {
            j = 2;
          } else {
            j = 1;
          }
        }
        
        $('#source').html(source);
        $('#dest').html(dest);
        $('#status').html(status);
        $('#timestamp').html(timestamp);
        $(".wrapper").html(details);
        $("#trackingbox").css("display", "block");
      } else {

        $('#errorbox').html("<h1 class='text-danger text-center'>No shipment with given tracking number found.</h1>");
        $("#errorbox").css("display", "block");
      }
    }
    break;
    }

  }
  const changetstamp = (stamp) => {
    let date = new Date(stamp);
    let date1 = date.toLocaleString();


    return date1;
  }

  //7763265646
  //  3435142572
</script>

</html>