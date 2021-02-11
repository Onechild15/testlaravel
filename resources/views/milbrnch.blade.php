<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chartisan example</title>
  </head>
  <body>
    <!-- Chart's container -->
    <div id="chart" style="height: 300px;"></div>
	<div id="chart2" style="height: 400px;"></div>
	<div id="chart3" style="height: 300px;"></div>
	<div id="chart4" style="height: 300px;"></div>
	<div id="chart5" style="height: 300px;"></div>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
      const chart = new Chartisan({
        el: '#chart',
        url: "@chart('milbrnch_chart')",
		hooks: new ChartisanHooks()
		.datasets('bar')
		.colors()
		.axis(true)
		.tooltip()
		.legend()
		.title('Total Military Branches By Year'),
      });
    </script>
	<script>
      const chart2 = new Chartisan({
        el: '#chart2',
        url: "@chart('sample_chart')",
		hooks: new ChartisanHooks()
		.datasets('pie')
		.colors()
		.axis(false)
		.tooltip()
		.legend()
		.title('Sample Chart'),
      });
    </script>
	<script>
      const chart3 = new Chartisan({
        el: '#chart3',
        url: "@chart('religion_chart')",
		hooks: new ChartisanHooks()
		.datasets(['line', 'bar'])
		.colors()
		.axis(true)
		.tooltip()
		.legend()
		.title('Total Religion By Year'),
      });
    </script>
	<script>
      const chart4 = new Chartisan({
        el: '#chart4',
        url: "@chart('rank_chart')",
		hooks: new ChartisanHooks()
		.datasets([{ type: 'line', fill: false }, 'bar'])
		.colors()
		.axis(true)
		.tooltip()
		.legend()
		.title('Total Rank By Year'),
      });
    </script>
	<script>
      const chart5 = new Chartisan({
        el: '#chart5',
        url: "@chart('location_chart')",
		hooks: new ChartisanHooks()
		.datasets([{ type: 'line', fill: false }, 'bar'])
		.colors()
		.axis(true)
		.tooltip()
		.legend()
		.title('Total Camp Name By Year'),
      });
    </script>
  </body>
</html>