<div>
    <div id="real-estate-count-chart"></div>
    <div id="average-rating-chart"></div>
    <div id="engagement-chart"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('livewire:load', function () {
        renderCharts();
    });

    function renderCharts() {
        // Make sure data exists before rendering
        if (!document.getElementById('real-estate-count-chart')) return;

        var countOptions = {
            series: [{
                name: 'Count',
                data: [{{ $landsCount }}, {{ $buildingsCount }}, {{ $apartmentsCount }}]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            xaxis: {
                categories: ['Lands', 'Buildings', 'Apartments']
            }
        };

        var countChart = new ApexCharts(document.querySelector("#real-estate-count-chart"), countOptions);
        countChart.render();

        // Repeat similarly for the other charts (average rating and engagement)
    }
</script>
