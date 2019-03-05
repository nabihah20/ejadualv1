<?php include "head.php"; ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.print.css" rel="stylesheet">


<link href='./fullcalendar-3.10.0/fullcalendar.min.css' rel='stylesheet' />
<link href='./fullcalendar-3.10.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='./fullcalendar-3.10.0/lib/moment.min.js'></script>
<script src='./fullcalendar-3.10.0/lib/jquery.min.js'></script>
<script src='./fullcalendar-3.10.0/fullcalendar.min.js'></script>
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      defaultDate: '2019-01-12',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2019-01-01'
        },
        {
          title: 'Long Event',
          start: '2019-01-07',
          end: '2019-01-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-01-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-01-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2019-01-11',
          end: '2019-01-13'
        },
        {
          title: 'Meeting',
          start: '2019-01-12T10:30:00',
          end: '2019-01-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2019-01-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2019-01-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2019-01-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2019-01-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-01-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-01-28'
        }
      ]
    });

  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
		<body>

		<header id="header" id="home" >
			<div class="container">
				<div class="row align-items-center justify-content-between d-flex">
				  <div id="logo">
					<a href="index.php"><img src="img/logoeJ.png" style="width: 131px; height:20px" alt="" title="eJadual" /></a>
				  </div>
				  <nav id="nav-menu-container">
					<ul class="nav-menu">
					  <li class="menu-has-children"><a href="#">Jadual</a>
						<ul>
						  <li><a href="jadualsu.php">Setiausaha Bandaran</a></li>
						  <li><a href="jadualmesy.php">Mesyuarat</a></li>
						</ul>
					  </li>
					</ul>
				  </nav><!-- #nav-menu-container -->		    		
				</div>
			</div>
		  </header><!-- #header -->	

			<section class="generic-banner"  style="background-color: #00bfff;">	

			</section>		
			<!-- End banner Area -->
				<!-- Start protfolio Area -->
				<section class="protfolio-area section-gap" id="project">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
						<div class="title text-center">
                                <h1 class="mb-10">Jadual Mesyuarat</h1>
                                <h1 class="mb-10">Setiausaha Bandaran</h1>
							</div>
						</div>
					</div>						
					<div class="row">
						<div id='calendar'>

						</div>
					</div>
				</div>	
			</section>
			<!-- End protfolio Area -->		
			
<?php include "footer.php"; ?>