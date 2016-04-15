class Counter
{
	count = 0;
	constructor(){
		setInterval(function(){
			this.tick();
		}.bind(this),1000);
	}
}

tick()
{
	this.count++
	console.log(this.count);
}