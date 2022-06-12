<template>
    <div>
        <Doughnut :chartData="chartData"  :chartOptions = "chartOptions"
:chartId ="chartId"
:width ="width"
:height ="height"
:cssClasses ="cssClasses"
:styles ="styles"
/>
    </div>
</template>

<script>
import { defineComponent, h } from 'vue'

import { Doughnut } from 'vue-chartjs'
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    ArcElement,
    CategoryScale,
    
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale)

export default defineComponent({
    name: 'DoughnutChart',
    components: {
        Doughnut
    },
    props: {
        chartId: {
            
            default: 'doughnut-chart'
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
        
    },
    setup(props) {
        const chartData = {
            labels: ['VueJs', 'EmberJs', 'ReactJs', 'AngularJs'],
            datasets: [
                {
                    backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16'],
                    data: [40, 20, 80, 10]
                }
            ]
        }

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false
        }

        return () =>
            h(Doughnut, {
                chartData,
                chartOptions,
                chartId: props.chartId,
                width: props.width,
                height: props.height,
                cssClasses: props.cssClasses,
                styles: props.styles,
                
            })
    }
})

</script>