<template>
    <div>
        <Doughnut :chartData="chartData" :chartOptions="chartOptions" :chartId="chartId" :width="width" :height="height"
            :cssClasses="cssClasses" :styles="styles" />
    </div>
</template>

<script>
import { defineComponent, h, reactive } from 'vue'
import { onMounted, ref } from 'vue';
import { Doughnut } from 'vue-chartjs'
import axios from 'axios'
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
            // width: {

            //     default: 400
            // },
            // height: {

            //     default: 400
            // },
            cssClasses: {
                default: '',

            },
            styles: {

                default: () => { }
            },

            

        },
    setup(props) {
        let data = reactive([])
        let dataQ = reactive([])
        let dataprdt = reactive([])
    
        const chartData = {
            labels:dataprdt,
            datasets: [
                {
                    backgroundColor: ['#41C003', '#E46651', '#E0D8FF', '#D16','#4EEE83','#EEE223',,'#0AEB83','#1EEE03', '#E41', '#8FF', '#D16','#41B'],
                    data: [40, 20, 80, 10, 40, 20, 80, 10, 80, 10, 80 ]
                    // data: dataQ.forEach(e=>{data.push(e);})
                }
            ]
        }
        
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false
        }
        const getProduct = () => {
            axios.get("http://localhost/filrouge/backend/FactureController/getProduct").then(res => {
                data = res.data
                console.log("hadi hya");
                console.log(data);
                

            data.forEach(e=>{
                dataQ.push(parseInt(e.quantity))
                dataprdt.push(e.ref_prdt)
                
            })
                // console.log(dataQ/.values);
                dataQ.forEach(e=>{console.log(e);})
                console.log(dataprdt);
                
                
            })
        }
        
        onMounted(() => {
            getProduct()  
            
        })
        return () =>
        
            h(Doughnut, {
                data,
                dataQ,
                dataprdt,
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