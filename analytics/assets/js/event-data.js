function EventData() 
{	
	this.event_names = [];
	this.events = new HashTable();
	this.clients = new HashTable();	  
	  
	this.updateEventTables = function(d, event_name)
	{
		var evnt = this.events.get(event_name);
		if(evnt == undefined) 
		{
			 evnt = new event(event_name, "$50", "$500");
			this.events.put(d["Event Name"], evnt);								
			//Ideally would want to break from this for loop once comparison succeeds
			//ToDo Find a way to break the inner for loop.
			this.event_names.push(event_name);			
		}
		evnt.total++;
		if(d[event_name].toUpperCase() == "ATTENDED")
		{
			evnt.addVisitor(d["Email Address"]);		
		}
				
	}
	this.updateClientTables = function(d, i)
	{
		var clnt = this.clients.get(d["Email Address"]);
		clnt.eventsTotal++;
		if(d[i].toUpperCase() == "ATTENDED")
		{
			var evn = this.events.get(i);
			clnt.addEvent(evn, true);
		} else {
			var evn = this.events.get(i);
			clnt.addEvent(evn, false);
		}
		clnt.ratio = clnt.eventsAttended/clnt.eventsTotal;
	}

	this.process = [];
	this.prepare_data = function()
	{
		//Using event cost analysis sheet to create an object of type event along with cost
		  d3.csv("csv/event_cost_analysis.csv", function(data) {
					data.forEach(function(d) { 					
								if(d["Event Name"] != undefined)		
								{
									var evnt = new event(d["Event Name"], d["Cost Per Head"], d["Total Cost"]);
									this.events.put(d["Event Name"], evnt);								
									//Ideally would want to break from this for loop once comparison succeeds
									//ToDo Find a way to break the inner for loop.
									this.event_names.push(d["Event Name"]);
								}						
				}.bind(this));
				this.event_names.sort();
				d3.csv("csv/EscalaPartners-Clients.csv", function(data) {
					/*
					 * create a new client and update clients HashTable and corresponding eventTables
					 */
					data.forEach(function(d) { 					
						if(d["Email Address"] != undefined)		
						{
							var clnt = new client(d);
							this.clients.put(d["Email Address"], clnt);		
							this.event_names.forEach( function (i) {			
								if(d[i] != undefined && d[i] != "")
								{
									this.updateEventTables(d, i);	
									this.updateClientTables(d, i);
								}
							}.bind(this));
						}
					}.bind(this));
					
					//Prepare the cost of each event
					this.event_names.forEach( function (d) {
							if( this.events.get(d).visited )
							{
								this.events.get(d).costPerClient = (this.events.get(d).eventTotalCost/ this.events.get(d).visited).toFixed(2);	
								
							}
							else 
								 this.events.get(d).costPerClient = 0;	
					}.bind(this));
					
					
					//Preparing the cost of each client
					this.clients.forEach( function (hash_obj_pair) { 
					
						hash_obj_pair.value.events.forEach( function (ev){ 
								
								hash_obj_pair.value.costSpent += parseFloat(ev.costPerClient) ;
								
							
						});
					
					}.bind(this));					
					
					
					
					this.process.forEach(function (pcs) {pcs();});
				}.bind(this));
		  }.bind(this));
	}
	return this;
}
