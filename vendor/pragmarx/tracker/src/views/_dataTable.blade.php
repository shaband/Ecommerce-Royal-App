 

<script type='text/javascript'>
	 

	jQuery.ajax({
		type: "GET",
		url: "{{  url('dashboard/stats/api/visits')  }}",
		data: { }
	})
	.done(function( data ) {
		drawTable(data);
	});

	function drawTable(data)
	{
		var tableData = new google.visualization.DataTable();

		var cssClassNames = {
			'headerCell': 'not-one',
		};

		for (var i=0; i<data.columns.length; i++)
		{
			tableData.addColumn(data.columns[i].type, data.columns[i].label);
		}

		for (var x=0; x<data.data.length; x++)
		{
			for (var i=0; i<data.columns.length; i++)
			{
				if (data.columns[i].type == 'datetime')
				{
					data.data[x][i] = new Date(data.data[x][i]);
				}
			}
		}

		tableData.addRows(data.data);

		var table = new google.visualization.Table(document.getElementById('table_div'));

		table.draw(tableData, {
			showRowNumber: false,
			page: 'enable',
			allowHtml: true,
			pageSize: 15,
			'cssClassNames': cssClassNames
		});
	}
</script>
