<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Analytics</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
 
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
	    <!-- DATATABLES STYLES-->
	<link href="assets/js/dataTables.bootstrap.css" rel="stylesheet" />
	<link href="assets/css/bootstrap-dialog.css" rel="stylesheet" />
		
	
   <style>

		 .axis path,
		 .axis line {
		   fill: none;
		   stroke-width: 2px;
		   stroke:black;

		   shape-rendering: crispEdges;
		 }
		 
		
		td.details-control {
			background: url('resources/details_open.png') no-repeat center center;
			cursor: pointer;
		}
		tr.shown td.details-control {
			background: url('resources/details_close.png') no-repeat center center;
		}
	#event-graph-id 
	{
		font-size: .6vw;
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
                        <a class="active-menu"  href="events.php"><i class="fa fa-bolt fa-3x"></i> Events</a>
                    </li>
                    <li>
                        <a class="menu"  href="clients.php"><i class="fa fa-male fa-3x"></i> Clients</a>
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
								<div class="panel panel-default" id="panel_1" style="min-height: 480;">
									<div class="panel-heading">
										Events Table
										<div class="btn-group pull-right">
											<a href="#"><i class="fa fa-info-circle fa-1x" style="font-size:1.3em" ptype="panel1"></i></a>
										</div>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table id="event-summary-table-id" class="table table-striped">
												<thead>
													<tr>
														<th>Event Name</th>
														<th>Date</th>
														<th>Cost Per Client</th>
														<th>Ratio Invited/Attended</th>
														<th>Clients Attended</th>
														<th>Total Invitees</th>
														<th>Total Cost</th>						
														
<!--														<th>Invited</th>
														<th>Attended</th>-->
													</tr>
												</thead>
												<tbody id="event-summary-tableBody-id"> 
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<!--    Striped Rows Table  -->
								<div class="panel panel-default"  id="panel_2" style="min-height: 480;">
									<div class="panel-heading">
										Clients Details for the Event
										<div class="btn-group pull-right">
											<a href="#"><i class="fa fa-info-circle fa-1x" style="font-size:1.3em" ptype="panel2"></i></a>
										</div>										
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table id="clientSummary-table-id" class="table table-striped" class="td.details-control">
												<thead>
													<tr>
														<!-- The first column is for icon for details-->
														<th></th>													
														<th>Client Name</th>
														<th>Client E-Mail</th>
														<th>Cost Per Client</th>
														<th>Events Missed</th>
														<th>Events Attended</th>
														<th>Total</th>
													</tr>
												</thead>
												
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
										Events Graphs
										<div class="btn-group pull-right">
											<a href="#"><i class="fa fa-info-circle fa-1x" style="font-size:1.3em"  ptype="panel3"></i></a>
										</div>
									</div>
									<div class="panel-body" id="panel-body_3">
										<div class="table-responsive">
											<div id="event-graph-id" >
										
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
										</div>										
									</div>
									<div class="panel-body" id="panel-body_4">
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
	<script src="assets/js/escala.js"></script>
	<script src="assets/js/bootstrap-dialog.js"></script>
    
	<script>
		function rowDetails(d)
		{
			var str ;
			if(d[0] == undefined)
			{
				str = "<p>Client is not Active Online <br> </p>"
				return str;
			}
				
			str = '<strong> Full name: </strong>' ;	
			if(d[0]["User Name"] != "" )
				str +=  d[0]["User Name"] + '<br>';
			if(d[0]["UserID"] != "")
				str += "<strong>UserId: </strong>" + d[0]["UserID"] + '<br>';
			if(d[0]["IP Address"] != undefined )
				str += '<strong>IP Address: </strong>'+d[0]["IP Address"]+'<br>' ;
			
			d.forEach(function (k) {
				if(k['Article URL'] != "")
				str += '<strong>Article Url: </strong>' + k['Article URL'] + '<br>';
				if(k['Article Name'] != "")
					str += '<strong> Article Name: </strong>' + k['Article Name'] ;
				if(k["StartDate"] != "" && k["EndDate"] != "") 
				{
					var startTime = new Date(k["StartDate"]);
					var endTime = new Date(k["EndDate"]);
					str += "<strong> Time Spent: </strong>" +  (endTime.getTime()  - startTime.getTime())/1000 + '<br>'	;
				}
					
				
				
			});
			return str;
		}				
		
		function format ( d, row ) {
/*			return 'Full name: '+d.first_name+' '+d.last_name+'<br>'+
				'Salary: '+d.salary+'<br>'+
				'The child row can contain any data you wish, including links, images, inner tables etc.';
*/
			var clnt = d["email"];
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
						evData.clients.get(clnt).events.forEach( function (d) {
									event_names.push(d.name);			
						}); 
						
						evData.clients.get(clnt).eventsSkipped.forEach( function (d) {
									missed_events.push(d.name);			
						}); 
						
						createEventGraph(event_names, missed_events, undefined, undefined, clnt);
						
						
					//Add child rows 
					/*
						BootstrapDialog.show({
							title: 'Information',
							message: getToolTip(row_details)
						});
						*/
						var str = rowDetails(row_details) ;

						row.child( str).show();
						return ;
					//	tooltip.style("visibility", "visible").html(getToolTip(row_details));
						
			  } 
			});					
	
		}		
		function createClientTable(evnt)
		{				
			if(evnt.visitors == undefined)
				return;
			var clnts_category = evnt.visitors;
			var detailRows = [];
			
			
			
			var mydata = [];
			clnts_category.forEach( function (k,i) { 					
					var tmp = new Object();
	
					tmp.name = evData.clients.get(k).name ;
					tmp.email =  evData.clients.get(k).email ;
					tmp.costSpent = evData.clients.get(k).costSpent.toFixed(2) ;
					tmp.invited = evData.clients.get(k).invited ;
					tmp.eventsAttended = evData.clients.get(k).eventsAttended ;
					tmp.eventsTotal = evData.clients.get(k).eventsTotal;
						
					mydata.push(tmp);			
			});
			

			$('#clientSummary-table-id').DataTable( 
			{
					"data" : mydata,
					"columns": [
					           {
									"className":      'details-control',
									"orderable":      false,
									"data":           null,
									"defaultContent": ''
								},
					
								{ "data": "name"}, 
								{ "data": "email"}, 
								{ "data": "costSpent"}, 
								{ "data": "invited"}, 
								{ "data": "eventsAttended"}, 							
								{ "data": "eventsTotal"}	

								
							],
				
					
					"pagingType": "full",
					"bDestroy": true,
					"pageLength": 5,
					"responsive":true,
					"aLengthMenu": [5, 10]
			} );	
/*			
			$('#clientSummary-table-id').dataTable( {
								  "columns": [
									{ className: "details-control" },
									null,
									null,
									null,
									null
								  ]
			} );
*/
			var dt = $( '#clientSummary-table-id' ).DataTable();			
			
			$('#clientSummary-table-id tbody').on( 'click', 'tr', function () {
					var tr = $(this).closest('tr');
					var row = dt.row( tr );
					var idx = $.inArray( tr.attr('id'), detailRows );
			 
					if ( row.child.isShown() ) {
						tr.removeClass( 'shown' );
						row.child.hide();	
			 
						// Remove from the 'open' array
						detailRows.splice( idx, 1 );
					}
					else {
						tr.addClass( 'shown' );
						 format( row.data(), row );
						
			 
						// Add to the 'open' array
						if ( idx === -1 ) {
							detailRows.push( tr.attr('id') );
						}
					}
				} );
			 
				// On each draw, loop over the `detailRows` array and show any child rows
				dt.on( 'draw', function () {
					$.each( detailRows, function ( i, id ) {
						$('#'+id+' td.details-control').trigger( 'click' );
					} );
				} );
			} 
			
		onClientClick = function ()
		{
		
			
			
			
		}
		
		
		onEventClick = function ()
		{
			var name = $('td', this).eq(0).text();
			var evnt = evData.events.get(name);
			var event_names = [];
			default_evnt = evData.event_names.indexOf(name);
			console.log(default_evnt);
			createClientTable(evnt);
			var clients = [];
			evnt.visitors.forEach(function (d) {
					clients.push( evData.clients.get(d));
			});
			
			
			
			createClientGraph(clients, evnt );
			createEventGraph(event_names, undefined, clients, evnt, undefined);
		}			
		defaultClientTable = function ()
		{
			var event_names = [];
			var evnt = evData.events.get(evData.event_names[default_evnt]);
			createClientTable(evnt);
			var clients = [];
			evnt.visitors.forEach(function (d) {
					clients.push( evData.clients.get(d));
			});		
			
			createClientGraph(clients, evnt);
			createEventGraph(event_names, undefined, clients, evnt, undefined);
		}	
		
		function processTable()
		{
			//alert(this.evData.event_names.length)
			var color = d3.scale.category20();
			var index = 0;
			//Preparing the cost in each event per Client
			this.evData.event_names.forEach( function (d) { 
			/*
					if( this.evData.events.get(d).visited )
					{
						this.evData.events.get(d).costPerClient = (this.evData.events.get(d).eventTotalCost/ this.evData.events.get(d).visited).toFixed(2);	
						
					}
					else 
						 this.evData.events.get(d).costPerClient = 0;
			*/
					var str = '<tr>';
		//				str += '<td>' + this.evData.events.get(d).date + '</td>';
					this.evData.events.get(d).color = color(index);
					str += '<td style="background-color:' + color(index)+ '">' + this.evData.events.get(d).name + '</td>';
					index++;
					str += '<td>' +  this.evData.events.get(d).date +' </td>';				
					str += '<td>' +  this.evData.events.get(d).costPerClient +' </td>';
					str += '<td>' +  this.evData.events.get(d).ratio.toFixed(2) +'% </td>';
					str += '<td>' + this.evData.events.get(d).visited + ' </td>';
					
					str += '<td>' + this.evData.events.get(d).total + ' </td>';
					str += '<td>$' + this.evData.events.get(d).eventTotalCost + ' </td>';
					
		//				str += '<td>' + this.evData.events.get(d).total + ' </td>';
		//				str += '<td>' + this.evData.events.get(d).visited + ' </td>';
						
					str += ' </tr>';
					$("#event-summary-tableBody-id").append(str);
		    });

			
			defaultClientTable();
			$('#event-summary-table-id').ready(function() {
				$('#event-summary-table-id').dataTable().fnDestroy();
				$('#event-summary-table-id').dataTable( {
					"pagingType": "full",
					"bDestroy": true,
					"pageLength": 5,
					"responsive":true,
					"aLengthMenu": [5,10]
				} );
				$('#event-summary-table-id tbody').on('click', 'tr', onEventClick );
			
			} );
		}
		
				
		function processClientTable()
		{
	
		}
		
		function createEventGraph(event_names, missed_events, clients, ev, clnt)
		{
			
			var width = $("#event-graph-id").width()
			var height = $("#event-graph-id").height();
			height = 450;
			var count = [];
			$("#event-graph-id").empty();
			//Lets show some graphs based on the data in events hashTable 
			var margin = {top: 60, right: 20, bottom: 30, left: 70},
							width = width - margin.left - margin.right,
							height = height - margin.top - margin.bottom;
			/* 
			 * If clients array is defined its used only in the context when event table has been clicked.
			 * In such a scenario prepare event_names and count variable. missed_events does not have a play here
			 * clients is an array of client who attended this event.
			 */
			if(clients != undefined)				
			{
					clients.forEach(function (d) {
						
						d.events.forEach(function (ev) {
							if( event_names.indexOf(ev.name) == -1 )
							{
								event_names.push(ev.name)
								count[ev.name] = 1;
							} else {
								count[ev.name] += 1;
							}
							
						});						
					});
				
				
			}							
			/* 
			 * If missed_events is defined its used only in the context when client table has been clicked.
			 * In such a scenario prepare event_names and missed_events variable need to be merged. missed_events does not have a play here
			 */							
			if(missed_events != undefined)
				missed_events.forEach(function (d) { event_names.push(d); });		
			var x = d3.scale.ordinal()
						.rangeRoundBands([0, width], .5);

			var y = d3.scale.linear()
							.rangeRound([height, 0]);
		   
			x.domain(event_names);
			
			y.domain([0, 120]);
			
		//	var color = d3.scale.category20();

			
			var xAxis = d3.svg.axis()
							  .scale(x)							
							  .orient("bottom");

			var yAxis = d3.svg.axis()
							.scale(y)
							.orient("left")
							.ticks(5)
							.tickFormat(d3.format("1s"));	
							
			//Trying to make Responsive svg
			var svg = d3.select("#event-graph-id").append("svg")
						.attr("width", width + margin.top + margin.bottom)
						.attr("height", height + margin.top + margin.bottom)
					//	.attr("viewBox", "0 0 450 450")
						.append("g")
						.attr("transform", "translate(" + margin.left + "," + margin.top + ")")
						.classed("svg-container", true) //container class to make it responsive
						.attr("preserveAspectRatio", "none")
						.classed("svg-content-responsive", true); 
				
					 
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
				  .attr("x", -0.3 * height)	
				  .attr("dy", ".71em")
				  .style("text-anchor", "end")			  
				  .text("Client");

			/* Working bars creation */
		   // Create bars for histogram to contain rectangles and freq labels.


			//Work on ToolTips for the BarChart (events)
			var tooltip = d3.select("body")
				.append("div")
				.style("position", "absolute")
				.style("z-index", "1000")
				.style("visibility", "hidden")
				.html("");
			function getToolTip(evt)
			{
				var tipstr = '<div style="width:200px; border:2px solid #5C5D5E;border-radius: 2px;background-color:#E1E1E3;padding:10px;padding-left:20px;">';
				tipstr += '<div style="text-align:left;font-weight:bold;">' + evt.name + '<br> Invited: ' + evt.total + '<br>Attended: ' +  evt.visited +'<br>Total Cost: $' + evt.eventTotalCost + '</div>';
				tipstr += '</div>';
				return tipstr;
			}			
			

		   
			var bars = svg.selectAll(".bar")
						  .data(event_names).enter()
						  .append("g").attr("class", "bar");
						  
			var barColor = 'steelblue';		

			
		
	
			
			/* create the rectangles.
			 * Known issue when the y attr func return a zero we get a NaN in case when we want to plot
			 * based on invited field
			*/
			var tmpEvents = this.evData.events;
			bars.append("rect")
				.attr("x", function(d) { 
							return x(d);
						})
				.attr("y", function(d) {
											
											return y(tmpEvents.get(d).ratio);
										})
				.attr("width", "30")
				.attr("height", function(d) {
												
												return height - y(tmpEvents.get(d).ratio);
											})
				.attr('fill', function(d, i){ 
							 
							return tmpEvents.get(d).color;
			
					})
				.on("mouseover", function(d){return tooltip.style("visibility", "visible").html(getToolTip(tmpEvents.get(d)));})
				.on("mousemove", function(d){return tooltip.style("top", ($("#event-graph-id").offset().top+10) + "px").style("left",$("#event-graph-id").offset().left + "px");})
				.on("mouseout", function(d){return tooltip.style("visibility", "hidden");});					
	//			.on("click", onEventClick);// mouseover is defined below.
		//		.on("mouseout",mouseout);// mouseout is defined below.
				
			 /*
			  * Create the frequency labels above the rectangles. Note the change in text when clients is defined and when its not.
			  * clnt is a specific client whose data needs to be shown
			  */
			 if(clients != undefined)
			 {
			
				bars.append("text").text(function(d){
														
														return count[d];
													})
					.style("fill", function (d) { 
													if(missed_events != undefined)
														if(missed_events.indexOf(d) == -1) 
															return "#00ff00";
														else return "#ff0000";
													else "#ff0000";
														
												})
												.attr("x", function(d) { return x( d); } )
					.attr("y", function(d,i) {  return  y(tmpEvents.get(d).ratio) - 10;  })
					.attr("text-anchor", "start");
				
				svg.append("text")
						.attr("x", width * .3)
						.attr("y", height + 15)											
						.text("Events Visited by Client who Attented the event " + ev.name);

			 } else {
					bars.append("text").text(function(d){ return tmpEvents.get(d).ratio.toFixed(1) + "%";})
						.style("fill", function (d) { 
														if(missed_events != undefined)
															if(missed_events.indexOf(d) == -1) 
																return "#00ff00";
															else return "#ff0000";
														else "#ff0000";
															
													})
													.attr("x", function(d) { return x( d); } )
						.attr("y", function(d,i) {  return  y(tmpEvents.get(d).ratio) - 10;  })
						.attr("text-anchor", "start");

					svg.append("text")
						.attr("x", width * .3)
						.attr("y", height + 15)					
						.attr("font-weight", "bold")
						.text("Events Visited by Client " + clnt);
				 
			 }
							
		}			
		
		function createClientGraph(clients, event)
		{
			var i = 0;
			var j = 0; //Keep columns 
			
			var client_categories = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
	
			var client_set = [];
			maxIndex = 0;
			var clntLength = [];
			
			clients.forEach(function (d) { 
											var index = Math.ceil(d.ratio*10);
											
											
											if(client_set[index] != undefined)
												client_set[index].push(d);
											else 
											{
													client_set[index] = [];
													client_set[index].push(d);
											
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
			var width  = $("#panel-body_4").width();
			var height = 500;
			var margin = {top: 20, right: 10, bottom: 30, left: 70},
						width = width - margin.left - margin.right,
						height = height - margin.top - margin.bottom;	
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
						.attr("width", width)
						.attr("height", height + margin.top + margin.bottom)
						.append("g")					
						.attr("transform", "translate(" + margin.left + "," + margin.top + ")");			

			/* 
			 * Manage  Stroke-width and stroke using css function axis path and line. Using attr/style such params from here causing relevant text to also 						
			 * inherit the property. Caveat did not try call through another svg append call using id (tagged approach)
			 */ 
				 svg.append("svg:g")
						.attr("class", "x axis")
						.append("line")
						.attr("y1", y(0))
						.attr("y2", y(0))
						.attr("x1", width +  margin.left)												
						.call(xAxis);
				
				svg.append("svg:g")
					  .attr("class", "y axis")		
					  .call(yAxis)
					  .append("text")
					  .attr("transform", "rotate(-90)")
					  .attr("y", -60)			
					  .attr("x", -0.3 * height)	
				  
					  .attr("dy", ".71em")					  
					  .style("text-anchor", "end")			  
					  .text("Total Number of Clients with % Attendance");

					  
					  
			var bars = svg.selectAll(".bar")
							  .data(client_categories).enter()
							  .append("g").attr("class", "bar");
				var padding = 50; 
				bars.append("rect")
					.attr("x", function(d, i) {						
								return x(d) - padding;
							})
					.attr("y", function(d, i) { 
												
												return y(clntLength[i].length); 
												
											  })
					.attr("width", "30")
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
								.attr("x", function(d) { return x( d) - padding; } )
								.attr("y", function(d,i) {  
															
															return y(clntLength[i].length) - 10;  
															
														 })
								
								.attr("text-anchor", "start");	

			svg.append("text")
				.attr("x", width/2)
				.attr("y", height/8)
	
				.text("Event  " + event.name)
				.style("text-anchor", "middle")
				.style("font-weight", "700");		
			
			svg.append("text")
				.attr("x", width/2)
				.attr("y", height + 15)	
				.text("Attendance Distribution for Clients who visited Event " + event.name)
				.style("text-anchor", "middle");
					
		}
		
		fontsize = function () {
			var fontSize = $("#event-graph-id").width() * 0.10; // 10% of container width
			$("#event-graph-id").css('font-size', fontSize);
		};
		
		
		function stopLoading()
		{
			$("#loader").css("display","none");
			
			var h = $("#panel_1").height();
            $("#panel_2").css('min-height', h);
			var h = $("#panel_4").height();
            $("#panel_3").css('min-height', h);
			
		}

		/*
		 * Execution starts here main()
		 */
		 evData = new EventData();
		$(".fa-info-circle").on("click", function(event){
			var str; 
			if($(this).attr("ptype") == "panel1")
			{
				str = "Events are Alphabetically ordered in this panel. Click on any event, the Event Graph the Client Graph and the Client Details for the Event reflect data relating to the event clicked.";
			}
			
			else if($(this).attr("ptype") == "panel2")
			{
				str = "The Table lists All clients who attended the event clicked. Click on any client to know details if he is actively engaged online reading the Articles. Clicking on a specific client also changes the Event Graphs, the graph on a click will now represent all the events that the Client attended";
			}
			else if($(this).attr("ptype") == "panel3")
			{
				str = "Each Event is color coded showing the Percentage of Invited Clients to Attended Clients for that Event. The Event Graphs ";
			}
			else if($(this).attr("ptype") == "panel4")
			{
				str = "The Panel displays client's priorities. The bar's height a measure of the number of clients whose invite to attend ratio is less than the ceil mention on the bar";
			}
			BootstrapDialog.show({
				title: 'Information',
				message: str
			});
		return false;
		});

		var default_evnt = 0;
		
		evData.process.push(processTable);
		evData.process.push(processClientTable);
		evData.process.push(stopLoading);
		$("#loader").css("display","block");
		evData.prepare_data();
		$( window ).resize(function() {
			

			processTable();
			processClientTable();
		});
		
	</script>
</body>
</html>
