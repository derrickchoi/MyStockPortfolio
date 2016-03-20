function Graph() {
  this.lineColors = [
    'red',
    'yellow',
    'blue',
    'orange'
  ];

  // Date format of input files 
  // Spacing around the graph
  this.margin = {top: 20, right: 20, bottom: 30, left: 40},
      this.width = 650 - this.margin.left - this.margin.right,
      this.height = 500 - this.margin.top - this.margin.bottom;
   
  // Scales for the graph
  this.x = d3.time.scale()
      .range([0, this.width]); 
  this.y = d3.scale.linear()
      .range([this.height, 0]);
   
  // Graph axes
  this.xAxis = d3.svg.axis()
      .scale(this.x)
      .orient("bottom");  
  this.yAxis = d3.svg.axis()
      .scale(this.y)
      .orient("left");
   
  var x = this.x;
  var y = this.y;
  // Necessary to draw all lines
  this.line = d3.svg.line()
    .x(function(d) { return x(d.date); })
    .y(function(d) { return y(d.close); });
   
  // Add zoom functionality
  this.zoom = d3.behavior.zoom()
      .on("zoom", this.zoomed.bind(this));
   
  // Stores data of all lines currently plotted
  this.allData = [];
   
  this.allTickers = [];
  this.allLines = [];

  // Main graph component
  this.svg = d3.select(".graph-widget").append("svg")
    .call(this.zoom)
      .attr("width", this.width + this.margin.left + this.margin.right)
      .attr("height", this.height + this.margin.top + this.margin.bottom)
    .append("g")
      .attr("transform", "translate(" + this.margin.left + "," + this.margin.top + ")")
      .call(this.zoom);

  // Add x axis and axis label
  this.svg.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + this.height + ")")
      .call(this.xAxis)
  .append("text")
      .attr("class", "axis-label")
      .attr("y", -10)
      .attr("x", this.width)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("Time");

  // Add y axis and axis label
  this.svg.append("g")
      .attr("class", "axis axis--y")
      .call(this.yAxis)
  .append("text")
      .attr("class", "axis-label")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("Price ($)");
   
  // Add anchor for lines
  this.svg.append("clipPath")
      .attr("id", "clip")
      .append("rect")
      .attr("class", "graph-rect")
      .attr("width", this.width)
      .attr("height", this.height);

  var curr = new Date();
  var past = new Date();
  past.setMonth(past.getMonth()-6);
  this.x.domain([past, curr]);
  this.y.domain([0, 500]);
  this.svg.call(this.zoom.x(this.x).y(this.y));
  this.svg.select(".axis--x").call(this.xAxis);
  this.svg.select(".axis--y").call(this.yAxis);
  this.svg.selectAll("path.line").attr("d", this.line);

  // Connect buttons to functions
  d3.select(".button-1").on("click", this.oneDay.bind(this));
  d3.select(".button-2").on("click", this.fiveDays.bind(this));
  d3.select(".button-3").on("click", this.oneMonth.bind(this));
  d3.select(".button-4").on("click", this.threeMonths.bind(this));
  d3.select(".button-5").on("click", this.sixMonths.bind(this));
  d3.select(".button-6").on("click", this.allTime.bind(this));

  this.display(["graph/y_goog.csv", "graph/y_aapl.csv", "graph/y_msft.csv"]);
};
 
// Called when user zooms or pans
Graph.prototype.zoomed = function() {
  this.svg.select(".axis--x").call(this.xAxis);
  this.svg.select(".axis--y").call(this.yAxis);
	this.svg.selectAll("path.line").attr("d", this.line);
};
 
// Used to parse CSVs
Graph.prototype.type = function(d) {
  var parseTime = d3.time.format("%Y/%m/%d").parse;
  d.date = parseTime(d.date);
  d.close = +d.close;
  return d;
};
 
//TODO max y in selected period not all time
// Set x axis domain to one day
Graph.prototype.oneDay = function() {
  // Get dates
  var curr = new Date();
  var past = new Date();
  past.setDate(past.getDate()-1);
 
  // Set domain
  this.x.domain([past, curr]);
 
  // Update graph
	this.svg.call(this.zoom.x(this.x).y(this.y));
  this.svg.select(".axis--x").call(this.xAxis);
  this.svg.select(".axis--y").call(this.yAxis);
	this.svg.selectAll("path.line").attr("d", this.line);
};
 
// Set x axis domain to five days
Graph.prototype.fiveDays = function() {
  var curr = new Date();
  var past = new Date();
  past.setDate(past.getDate()-5);  
  this.x.domain([past, curr]);
	this.svg.call(this.zoom.x(this.x).y(this.y));
  this.svg.select(".axis--x").call(this.xAxis);
  this.svg.select(".axis--y").call(this.yAxis);
	this.svg.selectAll("path.line").attr("d", this.line);
};
 
// Set x axis domain to one month
Graph.prototype.oneMonth = function() {
  var curr = new Date();
  var past = new Date();
  past.setMonth(past.getMonth()-1);
  this.x.domain([past, curr]);
	this.svg.call(this.zoom.x(this.x).y(this.y));
  this.svg.select(".axis--x").call(this.xAxis);
  this.svg.select(".axis--y").call(this.yAxis);
	this.svg.selectAll("path.line").attr("d", this.line);
};
 
// Set x axis domain to three months
Graph.prototype.threeMonths = function() {
  var curr = new Date();
  var past = new Date();
  past.setMonth(past.getMonth()-3);  
  this.x.domain([past, curr]);
	this.svg.call(this.zoom.x(this.x).y(this.y));
  this.svg.select(".axis--x").call(this.xAxis);
  this.svg.select(".axis--y").call(this.yAxis);
	this.svg.selectAll("path.line").attr("d", this.line);
};
 
// Set x axis domain to six months
Graph.prototype.sixMonths = function() {
  var curr = new Date();
  var past = new Date();
  past.setMonth(past.getMonth()-6);
  this.x.domain([past, curr]);
	this.svg.call(this.zoom.x(this.x).y(this.y));
  this.svg.select(".axis--x").call(this.xAxis);
  this.svg.select(".axis--y").call(this.yAxis);
	this.svg.selectAll("path.line").attr("d", this.line);
};
 
// Set x axis domain to all time
Graph.prototype.allTime = function() {
  if (this.allData.length == 0) return;
  var curr = new Date();
  var minTime = d3.min(this.allData[0], function(d) { return d.date; });
  var maxPrice = d3.max(this.allData[0], function(d) { return d.close; });
  var allData = this.allData;
  this.allData.forEach(function (value, index, array) {
    var min = d3.min(allData[index], function(d) { return d.date; });
    if (min < minTime) minTime = min;
    var max = d3.max(allData[index], function(d) { return d.close; });
    if (max > maxPrice) maxPrice = max;
  });
  this.x.domain([minTime, curr]);
  this.y.domain([0, maxPrice]);
	this.svg.call(this.zoom.x(this.x).y(this.y));
  this.svg.select(".axis--x").call(this.xAxis);
  this.svg.select(".axis--y").call(this.yAxis);
	this.svg.selectAll("path.line").attr("d", this.line);  
};

Graph.prototype.displayTicker = function(tickerName) {
  if (this.allTickers.findIndex(function(element, index, array) { element === tickerName; }) !== -1) {
    return;
  } else {
    d3.csv("graph/" + tickerName.toLowerCase() + ".csv", this.type, function(error, data) {
      if (error) throw error;

      // Add to our data array
      this.allData.push(data);
      this.allTickers.push(tickerName.toLowerCase());

      // Set domain to cover max price
      var maxPrice = d3.max(this.allData[0], function(d) { return d.close; });
      this.allData.forEach(function (value, index, array) {
        var max = d3.max(this.allData[index], function(d) { return d.close; });
        if (max > maxPrice) maxPrice = max;
      });
      this.y.domain([0, maxPrice]);
      this.svg.call(this.zoom.x(this.x).y(this.y));
      this.svg.select(".axis--x").call(this.xAxis);
      this.svg.select(".axis--y").call(this.yAxis);
      this.svg.selectAll("path.line").attr("d", this.line);

      // Draw line
      var newLine = svg.append("path")
        .datum(data)
        .attr("class", "line")
        .attr("clip-path", "url(#clip)")
        .attr("stroke", lineColors[(this.allData.length-1)%4])
        .attr("d", this.line);
        
      this.allLines.push(newLine);
      
      d3.select("#legend").append("tr")
        .text(tickerName.toUpperCase())
        .attr("class", "graph-tr")
        .style("color", newLine.style("stroke"))
        .on("click", function() {
          getDetails(tickerName);
        });
        
      newLine.on("click", function() {
          getDetails(tickerName);
      });
    });
  }
};

Graph.prototype.removeTicker = function(tickerName) {
  var index = this.allTickers.findIndex(function(element, index, array) { return element === tickerName.toLowerCase(); });
  if (index === -1) return;
  else {
    var line = this.allLines[index];
    line.style("opacity", 0);
    this.allLines.splice(index, 1);
    this.allTickers.splice(index, 1);
    this.allData.splice(index, 1);
    document.getElementById("legend").deleteRow(index);
  }
};
 
// Display line graphs
Graph.prototype.display = function(arr) {
  this.allData = [];
  this.svg.selectAll("path.line").remove();
  d3.selectAll(".graph-tr").remove();
 
  // Iterate through array of CSV names
  var graph = this;
  arr.forEach(function cb(value, index, array) {
    // Parse CSV
    d3.csv(value, graph.type, function(error, data) {
      if (error) throw error;

      // Add to our data array
      graph.allData.push(data);

      // Set domain to cover max price
      var maxPrice = d3.max(graph.allData[0], function(d) { return d.close; });
      graph.allData.forEach(function (value, index, array) {
        var max = d3.max(graph.allData[index], function(d) { return d.close; });
        if (max > maxPrice) maxPrice = max;
      });
      graph.y.domain([0, maxPrice]);
      graph.svg.call(graph.zoom.x(graph.x).y(graph.y));
      graph.svg.select(".axis--x").call(graph.xAxis);
      graph.svg.select(".axis--y").call(graph.yAxis);
      graph.svg.selectAll("path.line").attr("d", graph.line);

      // Draw line
      var newLine = graph.svg.append("path")
        .datum(data)
        .attr("class", "line")
        .attr("clip-path", "url(#clip)")
        .attr("stroke", graph.lineColors[index%4])
        .attr("d", graph.line);

      d3.select("#legend").append("tr")
        .text(value.substring(8, value.length-4).toUpperCase())
        .attr("class", "graph-tr")
        .style("color", newLine.style("stroke"))
        .on("click", function() {
          // var newOpacity = newLine.style("opacity") != 0 ? 0 : 1;
          // newLine.style("opacity", newOpacity);
          getDetails(value.substring(8, value.length-4));
        });

      newLine.on("click", function() {
          getDetails(value.substring(8, value.length-4));
      });
    });
  });
};
 
Graph.prototype.getDetails = function(ticker) {
  console.log(ticker);
};