function client(row) 
{	
	this.email = row["Email Address"];
	this.name = row["Name"];
	this.costSpent = 0;
	this.eventsAttended = 0;
	this.eventsInvited = 0;
	this.eventsDeclined = 0;
	this.eventsTotal = 0;
	this.events = [];
	this.ratio = 0;	
	this.invited = 0;
	this.eventsSkipped = [];
	this.details = [];
}

client.prototype.addEvent = function (evnt, attended) 
{
	if(attended)
	{
		this.events.push(evnt);
		this.eventsAttended++;	
	} else {
		this.eventsSkipped.push(evnt);
		
	}
	
	this.invited = this.eventsTotal - this.eventsAttended;
	
}

function event(eventName, eventCost, eventTotalCost) 
{
	
	this.name = eventName;
	this.cost = 0 ;
	this.color = 0;
	this.visited = 0;
	this.total = 0;
	this.visitors = [];
	this.ratio = 0;
	this.invited = 0;
	eventCost = eventCost.trim();
    var tmp = eventCost.substring(1, eventCost.length);
	
	this.costPerClient = parseFloat(tmp);
	
	eventTotalCost = eventTotalCost.trim();
	tmp = eventTotalCost.substring(1,eventTotalCost.length );
	this.eventTotalCost = parseFloat(tmp);
	
	var re = /\d+\/\d+\/\d+/;
	
	this.date = re.exec(this.name);

}

event.prototype.addVisitor = function (email) 
{
	this.visitors.push(email);
	this.visited++;
	this.invited = this.total - this.visited;
	this.ratio = 100 * this.visited/this.total;
	
//	this.costPerClient = parseInt(this.cost)/this.visited;
}
