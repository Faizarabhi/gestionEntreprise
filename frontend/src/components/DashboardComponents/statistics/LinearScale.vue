<template>
    <div>
        <Bar :chart-options="chartOptions" :chart-data="chartData" :chart-id="chartId" :dataset-id-key="datasetIdKey"
            :plugins="plugins" :css-classes="cssClasses" :styles="styles" :width="width" :height="height" />
    </div>
</template>

<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: 'BarChart',
    components: { Bar },
    props: {
        chartId: {

            default: 'bar-chart'
        },
        datasetIdKey: {

            default: 'label'
        },
        width: {

            default: 400
        },
        height: {

            default: 400
        },
        cssClasses: {
            default: '',
        },
        styles: {

            default: () => { }
        },
        plugins: {

            default: () => { }
        }
    },
    data() {
        return {
            chartData: {
                labels: ['January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December'],
                datasets: [

                    { label: 'Product ', backgroundColor: '#001E6C', data: [38, 20, 12, 20, 30, 20, 12, 20, 12, 20, 12, 12] }]
            },
            chartOptions: {
                responsive: true
            }

        }
    }
}
</script>