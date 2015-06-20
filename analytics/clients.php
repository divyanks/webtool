<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Events Analytics</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
	    <!-- DATATABLES STYLES-->
	<link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />
	<link href="assets/css/bootstrap-dialog.css" rel="stylesheet" />
	
  
   <style>

		 .axis path,
		 .axis line {
		   fill: none;
		   stroke-width: 2px;
		   stroke:black;		   
		   shape-rendering: crispEdges;
		 }
		 		.my_class2 {
			text-align:center;
		}
	 
		.my_class {
			text-align:left;
		}
		#client-graph-id
		{
			font-size: .6vw;
		}
		 
		#event-graph-id 
		{
			font-size: .6vw;
		}
		
		.panel > .panel-heading
		{
				background-image: none;
				background-color: #4D4D4D;
				color: white;
				

		}		
		.panel {
			
			overflow-y: auto;
			overflow-x: hidden;
			
		}
		.panel-default 
		{
			border-color: #4D4D4D;
		}
		.fa 
		{
		  color: #e5e5e5; 
		  text-decoration: none;
		}
		.tooltip {
			  position: absolute;
			  width: 200px;
			  height: 28px;
			  pointer-events: none;
			}

   </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Analytics</a> 
            </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center" style="visibility:hidden;height:50px">
					</li>
                    <li>
                        <a class="menu"  href="index.php"><i class="fa fa-bar-chart-o fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="menu"  href="events.php"><i class="fa fa-bolt fa-3x"></i> Events</a>
                    </li>
                    <li>
                        <a class="active-menu"  href="clients.php"><i class="fa fa-male fa-3x"></i> Clients</a>
                    </li>
<!--					                   
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                        </ul>
                      </li>  
-->
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <!--
				<div class="row">
                    <div class="col-md-12">
                     <h2>Analytics Dashboard</h2>   
                    </div>
                </div>              
                  <hr />
                  /. ROW  -->
				  
                 <!-- For graphs which will act like filter  -->
				<!-- Loader -->
				<div id="loader" style="display:none;position:absolute;top:50%;left:40%;z-index:999">
					<img src='assets/img/loading_spinner.gif' alt='Loading...'></img>
				</div>
                <div class="row">
                    <div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<!--    Striped Rows Table  -->
								<div class="panel panel-default" id="panel_1">
									<div class="panel-heading">
										Client Summary Table
										<div class="btn-group pull-right">
											<a href="#"><i class="fa fa-info-circle fa-1x" style="font-size:1.3em"  ptype="panel1"></i></a>
											<a href="#"><i class="fa fa-expand fa-1x" style="font-size:1.3em;margin-left:10px"  ptype="panel1"></i></a>
										</div>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table id="clientSummary-table-id" class=" row-border table table-striped row-border">
												<thead>
													<tr>													
														<th style = "text-align: left">Client Name</th>
														<th >Cost Per Client</th>
														<th >Events Missed</th>
														<th>Events Attended</th>
														<th >Total</th>
													</tr>
												</thead>
												<tbody id="clientSummary-tableBody-id">
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!--    Striped Rows Table  -->
								<div class="panel panel-default"  id="panel_2">
										<div class="panel-heading">
										Events Table
										<div class="btn-group pull-right">
											<a href="#"><i class="fa fa-info-circle fa-1x" style="font-size:1.3em" ptype="panel2"></i></a>
											<a href="#"><i class="fa fa-expand fa-1x" style="font-size:1.3em;margin-left:10px"  ptype="panel2"></i></a>
										</div>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table id="event-summary-table-id" class="table table-striped">
												<thead>
													<tr>
<!--														<th>Date</th>-->
														<th style = "text-align: left">Event Name</th>
														<th>Cost Per Client</th>
														<th >Total Cost </th>
														<th>Invited</th>
														<th>Attended</th>
													</tr>
												</thead>
												<tbody id="event-summary-tableBody-id"> 
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>              
                <div class="row">
                    <div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<!--    Striped Rows Table  -->
								<div class="panel panel-default" id="panel_3">
									<div class="panel-heading">
										Cost Graphs
										<div class="btn-group pull-right">
											<a href="#"><i class="fa fa-info-circle fa-1x" style="font-size:1.3em"  ptype="panel3"></i></a>
											<a href="#"><i class="fa fa-expand fa-1x" style="font-size:1.3em;margin-left:10px"  ptype="panel3"></i></a>
										</div>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<div id="cost-graph-id" style="overflow: auto">
										
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!--    Striped Rows Table  -->
								<div class="panel panel-default"  id="panel_4">
									<div class="panel-heading">
										Client Graphs
										<div class="btn-group pull-right">
											<a href="#"><i class="fa fa-info-circle fa-1x" style="font-size:1.3em" ptype="panel4"></i></a>
											<a href="#"><i class="fa fa-expand fa-1x" style="font-size:1.3em;margin-left:10px"  ptype="panel4"></i></a>
										</div>
									</div>
									<div class="panel-body">
										<div id="client-graph-id" class="table-responsive">	</div>
									</div>
								</div>
							</div>
                    </div>
                </div>              

                 <!-- /. ROW  -->
                  <hr />
			</div>
             <!-- /. PAGE INNER  -->
        </div>
		<!-- /. PAGE WRAPPER  -->
	</div>
	
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/d3.min.js"></script>    
	<script src="assets/js/hashTable.js"></script>
	<script src="assets/js/event.js"></script>    
	<script src="assets/js/event-data.js"></script>	
	<script src="assets/js/jquery.dataTables.js"></script>	
	<script src="assets/js/dataTables.bootstrap.js"></script>	
	<script src="assets/js/bootstrap-dialog.js"></script>	
	<script src="assets/js/escala.js"></script>
    <script src="assets/js/jquery.fullscreen-min.js"></script>
	<script>
		evData = new EventData();

		function processEventTable()
		{
			//alert(this.evData.event_names.length)
			var color = d3.scale.category20();
			var index = 0;
					this.evData.event_names.forEach( function (d) {
 					
							var str = '<tr>';
							evData.events.get(d).color = color(index);
							index++;
			//				str += '<td>' + this.evData.events.get(d).date + '</td>';
							str += '<td >' + this.evData.events.get(d).name + '</td>';
							str += '<td>$' +  this.evData.events.get(d).costPerClient +' </td>';
							str += '<td>$' + this.evData.events.get(d).eventTotalCost + ' </td>';
							str += '<td>' + this.evData.events.get(d).total + ' </td>';
							str += '<td>' + this.evData.events.get(d).visited + ' </td>';
								
							str += ' </tr>';
							$("#event-summary-tableBody-id").append(str);
			});
			$('#event-summary-table-id').ready(function () {
				$('#event-summary-table-id').dataTable().fnDestroy();
				$('#event-summary-table-id').dataTable( {
					"pagingType": "full",
					"bDestroy": true,
					"pageLength": 5,
					"responsive":true,
					"aLengthMenu": [5,10],
					"columnDefs": [ { className: "dt-body-left", "targets": [ 0 ] }, { className: "my_class2", "targets": [ 1] }, { className: "my_class2", "targets": [ 2 ] }, { className: "my_class2", "targets": [ 3 ] },
					{ className: "my_class2", "targets": [ 4 ] }
								  ]
				} );
//				$('#event-summary-table-id tbody').on('click', 'tr', onEventClick );
				
			
			} );
		}
		
				
		function processClientTable()
		{
			//alert(this.evData.event_names.length)
			
			this.evData.clients.forEach( function (d) { 					
					var str = '<tr >';
	//				str += '<td>' + this.evData.events.get(d).date + '</td>';
					str += '<td>' + d.value.name + '</td>';
					
					str += '<td>$' +  d.value.costSpent.toFixed(2) +' </td>';
					str += '<td>' + d.value.invited + ' </td>';
					str += '<td>' + d.value.eventsAttended + ' </td>';
					str += '<td>' + d.value.eventsTotal + ' </td>';
						
					str += ' </tr>';
					$("#clientSummary-tableBody-id").append(str);
				});
			$('#clientSummary-table-id').ready(function() {
				$('#clientSummary-table-id').dataTable().fnDestroy();
				$('#clientSummary-table-id').dataTable( {
					"columnDefs": [ { className: "dt-body-left", "targets": [ 0 ] }, { className: "my_class2", "targets": [ 1] }, { className: "my_class2", "targets": [ 2 ] }, { className: "my_class2", "targets": [ 3 ] },
					{ className: "my_class2", "targets": [ 4 ] }],
					"pagingType": "full",
					"bDestroy": true,
					"pageLength": 5,
					"responsive":true,
					"aLengthMenu": [5, 10]
				} );
				
			
			} );
		}
		
		function xyAxis(margin, width, height)
		{

			 return svg;
		}

		
		function getDetails (d)
		{
			var clnt = d.value;
			$.ajax({ 
				  type: 'POST', 
				  url: "test.php?f=fetchClient&p="+clnt, 
					   // call php function , phpFunction=function Name , x= parameter  
				  data: {}, 
				  success: function(data1){ 
						var row_details = [];
						row_details = JSON.parse(data1);
							
						var event_names = [];
						var missed_events = [];
						evData.clients.get(clnt).details = row_details;

						tooltip.style("visibility", "visible").html("Hellow World");
						
			  } 
			});								
			
			
			
			
			
			
			
		}


		
		function createClientGraph(clientArray)
		{	

			var width = $("#cost-graph-id").width()
			var height = $("#cost-graph-id").height();
			height = 300;

			var dum = $("#cost-graph-id").empty();
			//Lets show some graphs based on the data in events hashTable 
			var margin = {top: 60, right: 20, bottom: 30, left: 70},
							width = width - margin.left - margin.right,
							height = height - margin.top - margin.bottom;	  
		
		
					
			var x = d3.scale.linear()
						.range([0, width])
						.domain([0, 2000]);

			var y = d3.scale.linear()
							.rangeRound([height,0 ])
							.domain([0, 100]);

			var colorScale = d3.scale.linear()								
							.domain([0, 100])
							.range([ "#009900",  "#990000"]);
									
			
			var color = d3.scale.category20();

			
			var xAxis = d3.svg.axis()
							  .scale(x)							
							  .orient("bottom");

			var yAxis = d3.svg.axis()
							.scale(y)
							.orient("left")
							.ticks(5)
							.tickFormat(d3.format("1s"));	
							
			//Trying to make Responsive svg
			var svg = d3.select("#cost-graph-id").append("svg")
						.attr("width", width + margin.top + margin.bottom)
						.attr("height", height + margin.top + margin.bottom)
					//	.attr("viewBox", "0 0 450 450")
						.append("g")
						.attr("transform", "translate(" + margin.left + "," + margin.top + ")")
						.classed("svg-container", true) //container class to make it responsive
						.attr("preserveAspectRatio", "none")
						.classed("svg-content-responsive", true)
						.call(d3.behavior.zoom().scaleExtent([0.1, 8]).on("zoom", zoom)); 
				
					 
			svg.append("svg:g")
					.attr("class", "x axis")
					.append("line")					
					.attr("y1", y(0))
					.attr("y2", y(0))
					.attr("x1", width)					
					.call(xAxis);
			
			svg.append("svg:g")
				  .attr("class", "y axis")
				  .call(yAxis)
				  .append("text")
				  .attr("transform", "rotate(-90)")
				  .attr("y", -55)				  
				  .attr("x", 0)				  
				  .attr("dy", ".71em")
				  .style("text-anchor", "end")			  
				  .text("Invite to Attendance Percentage");

			/* Working bars creation */
		   // Create bars for histogram to contain rectangles and freq labels.
		   
	
			svg.append("text")
				.attr("x", width*0.35)
				.attr("y", height+20)
				.style("text-anchor", "middle", "font-weight:bold")
				.attr("font-weight", "normal")
				.text(" Cost Per Client ");
			
			/*
			 * create the Scatter plots.
			 * y position is the Client's Attend/Invite Percentage
			 * x position is the Cost incurred on that client
			 * Radius is the number of events.
			 * Currently color scale reflects the same Attend to Invite Percentage
			 * Future: Color scale could be the cost incurred/investment made Percentage.
			*/
			
			// add the tooltip area to the webpage
			var tooltip = d3.select("body")
				.append("div")
				.style("position", "absolute")
				.style("z-index", "1000")
				.style("visibility", "hidden")
				.html("");
			function getToolTip(clnt)
			{
				var tipstr = '<div style="width:220px; border:2px solid #5C5D5E;border-radius: 2px;background-color:#E1E1E3;padding:10px;padding-left:20px;">';
				tipstr += '<div style="text-align:left;font-weight:bold;">' + clnt.name + '<br> Invite to Attendance: ' + (clnt.ratio*100).toFixed(2) + '%<br>Cost: $' +  clnt.costSpent.toFixed(2) +'<br>Total Events Attended: ' + clnt.eventsAttended + '</div>';
				tipstr += '</div>';
				
				return tipstr;
			}					
			  
			  // draw dots
			  
			  svg.selectAll(".dot")
				  .data(clientArray)
				.enter().append("circle")
				  .attr("class", "dot")
				  .attr("r", function (d) {
								var clnt = d.value;
							/*	
								if(clnt.eventsAttended != 0)
									return clnt.eventsAttended*4+ 3.5;
								else 
							*/		
									return 3.5;
								
				  })
				  .attr("cx", function (d) { 
										return x(d.value.costSpent);
										})
				  .attr("cy", function (d) {
										return y(d.value.ratio*100);
										})
				  .style("fill", function(d,i ) { return colorScale(d.value.ratio*100);}) 
				.on("mouseover", function(d){return  tooltip.style("visibility", "visible").html(getToolTip(d.value));})
//				.on("mouseover", function(d){return getDetails(d);})
				.on("mousemove", function(d){return tooltip.style("top", ($("#cost-graph-id").offset().top+10) + "px").style("left",$("#cost-graph-id").offset().left + "px");})
				.on("mouseout", function(d){return tooltip.style("visibility", "hidden");});
		//		.attr("transform", function(d) { return "translate(" + d.value + ")"; });;					

	
			function zoom() {
			  svg.attr("transform", "translate(" + d3.event.translate + ")scale(" + d3.event.scale + ")");
			}
		
		}			
		
		function createClientDistribution()
		{
			var i = 0;
			var j = 0; //Keep columns 
			
			var client_categories = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
	//		console.log(type, d, i);
			var client_set = [];
			maxIndex = 0;
			var clntLength = [];
			
			this.evData.clients.forEach(function (d) { 
											var index = Math.ceil(d.value.ratio*10);
											
											
											if(client_set[index] != undefined)
												client_set[index].push(d.value);
											else 
											{
													client_set[index] = [];
													client_set[index].push(d.value);
											
											}
											if(maxIndex < index)
												maxIndex = index;
					
										});
										
			for(var i = 0; i <= maxIndex ; i++)
			{
				var rect = new Object();
				
				if(client_set[i] != undefined)
				{
					rect.clients = client_set[i];	
					rect.length = client_set[i].length;
				}
				else 
				{
					rect.clients = [];
					rect.length = 0;
				}	
					
				clntLength.push(rect);
			}
			var width  = $("#client-graph-id").width();
			var height = 300;
			var margin = {top: 20, right: 10, bottom: 30, left: 70},
						width = width - margin.left - margin.right,
						height = height - margin.top - margin.bottom;	
		
			var dum = $("#client-graph-id").find("div");
			if(dum != undefined)
			{
				dum.remove();
				
			}
		

			var x = d3.scale.ordinal()
						.rangeRoundBands([0, width], .5);

			var y = d3.scale.sqrt()
							.rangeRound([height, 0]);
		   
		
		   
			x.domain(client_categories);
			
			y.domain([0, d3.max(client_categories, function (d,i) {
									return clntLength[i].length + 100;
									} )]);
				
			var color = d3.scale.category10();		
			
			
			var xAxis = d3.svg.axis()
							  .scale(x)						  					  
							  .orient("bottom");
							  

			var yAxis = d3.svg.axis()
							.scale(y)
							.orient("left");
				//			.tickFormat(d3.format("1s"));		


			var svg = d3.select("#client-graph-id").append("div").append("svg")
						.attr("width", width + margin.top + margin.bottom)
						.attr("height", height + margin.top + margin.bottom)
						.append("g")					
						.attr("transform", "translate(" + margin.left + "," + margin.top + ")");			
				 
				svg.append("svg:g")
						.attr("class", "x axis")
						.append("line")	
						.attr("y1", y(0))
						.attr("y2", y(0))
						.attr("x1", width)									
						.call(xAxis);
				
				svg.append("svg:g")
					  .attr("class", "y axis")
	
					  .call(yAxis)
					  .append("text")
					  .attr("transform", "rotate(-90)")
					  .attr("y", -55)				  
					  .attr("x", -1.1 * height)				  
					  .attr("dy", ".71em")
					  .text("Total Number of Clients with % Attendance");

					  
					  
				var bars = svg.selectAll(".bar")
							  .data(client_categories).enter()
							  .append("g").attr("class", "bar");
				  
				bars.append("rect")
					.attr("x", function(d) {						
								return x(d);
							})
					.attr("y", function(d, i) { 
												
												return y(clntLength[i].length); 
												
											  })
					.attr("width", x.rangeBand())
					.attr("height", function(d, i ) { 
													
													return height - y(clntLength[i].length);
												})
		//			.on("click", createTable)
					.attr('fill', function(d, i){ 

													return color(0);
												});
				
				
			 //Create the frequency labels above the rectangles.
			bars.append("text").text(function(d, i){
													
														return client_categories[i] + "%";
													
												})
								.attr("x", function(d) { return x( d); } )
								.attr("y", function(d, i) {  
															
															return y(clntLength[i].length) - 10;  
															
														 })
								.attr("text-anchor", "start");	

			svg.append("text")
				.attr("x", width*0.3)
				.attr("y", height+20)
				.style("text-anchor", "middle", "font-weight:bold")
				.attr("font-weight", "normal")
				.text("CLIENT DISTRIBUTION")
				
			var eventArray = [];	
			this.evData.clients.forEach(function (d) {
					eventArray.push(d);
			})	;
			createClientGraph(eventArray)	;
		}
		
		
	
		function stopLoading()
		{
			$("#loader").css("display","none");
			
			var h = $("#panel_2").height();
            $("#panel_1").css('min-height', h);
			var h = $("#panel_4").height();
            $("#panel_3").css('min-height', h);
			
		}
		
		$(".fa-info-circle").on("click", function(event){
			var str = "Events are Alphabetically ordered in this panel";
			if($(this).attr("ptype") == "panel2")
			{
				str = "This panel contains all the clients";
			}
			else if($(this).attr("ptype") == "panel3")
			{
				str = " Radius depends is the number of events clients attended. Currently, color scale reflects Attend to Invite Percentage Future: Color scale could be the cost incurred/investment made Percentage.";
			}
			else if($(this).attr("ptype") == "panel4")
			{
				str = "The Panel displays client's priorities. The bar's height a measure of the number of clients whose invite to attend ratio is less than the ceil mentioned on the bar";
			}
			bdialog = BootstrapDialog.show({
				title: 'Information',
				message: str
			});
			bdialog.getModalHeader().css('background-color', '#4D4D4D');
			bdialog.setSize(BootstrapDialog.SIZE_LARGE);
			return false;
		});
		$(".fa-expand").on("click", function(event){
			if($(this).attr("ptype") == "panel1")
			{
				$("#panel_1").fullscreen();
			}
			else if($(this).attr("ptype") == "panel2")
			{
				$("#panel_2").fullscreen();
			}
			else if($(this).attr("ptype") == "panel3")
			{
				$("#panel_3").fullscreen();
			}
			else if($(this).attr("ptype") == "panel4")
			{
				$("#panel_4").fullscreen();
			}
			return false;
		});
		
		evData.process.push(processEventTable);
		evData.process.push(processClientTable);
		
		evData.process.push(createClientDistribution);
		evData.process.push(stopLoading);
		$("#loader").css("display","block");
		evData.prepare_data();
		$( window ).resize(function() {
			
			createClientDistribution();
		});
	</script>
</body>
</html>
